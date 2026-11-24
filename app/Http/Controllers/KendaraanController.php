<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;

class KendaraanController extends Controller
{
    public function index()
    {
        $kendaraans = DB::table('tb_kendaraan')->orderBy('id_kendaraan', 'desc')->get();

        return view('admin.kendaraan.index', compact('kendaraans'));
    }

    public function create()
    {
        return view('admin.kendaraan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'plat_nomor'      => 'required',
            'jenis_kendaraan' => 'required',
            'pemilik'         => 'required',
        ]);

        // Rapikan format plat nomor (huruf besar semua)
        $platNomor = strtoupper(trim($request->plat_nomor));

        // Cek apakah plat nomor sudah ada di tabel tb_kendaraan
        $kendaraanLama = DB::table('tb_kendaraan')
            ->whereRaw('REPLACE(UPPER(plat_nomor), " ", "") = ?', [str_replace(' ', '', $platNomor)])
            ->first();

        if ($kendaraanLama) {
            // Cek apakah kendaraan ini masih berada di dalam area parkir
            $sedangParkir = DB::table('tb_transaksi')
                ->where('id_kendaraan', $kendaraanLama->id_kendaraan)
                ->where('status', 'masuk')
                ->exists();

            if ($sedangParkir) {
                return redirect()
                    ->back()
                    ->withInput()
                    ->withErrors([
                        'plat_nomor' => 'Kendaraan dengan plat ' . $platNomor . ' masih berada di dalam area parkir (belum keluar)!'
                    ]);
            }

            // Jika sudah keluar, perbarui data jenis/pemiliknya dan gunakan ID yang sama
            DB::table('tb_kendaraan')
                ->where('id_kendaraan', $kendaraanLama->id_kendaraan)
                ->update([
                    'plat_nomor'      => $platNomor,
                    'jenis_kendaraan' => $request->jenis_kendaraan,
                    'pemilik'         => $request->pemilik,
                ]);

            $idKendaraan = (int) $kendaraanLama->id_kendaraan;
        } else {
            // Jika kendaraan benar-benar baru, simpan baris baru
            $idKendaraan = (int) DB::table('tb_kendaraan')->insertGetId([
                'plat_nomor'      => $platNomor,
                'jenis_kendaraan' => $request->jenis_kendaraan,
                'pemilik'         => $request->pemilik,
            ]);
        }

        // Otomatis masukkan ke antrean notifikasi Petugas
        $antrean = Cache::get('antrean_kendaraan_petugas', []);
        if (!in_array($idKendaraan, $antrean)) {
            $antrean[] = $idKendaraan;
            Cache::forever('antrean_kendaraan_petugas', $antrean);
        }

        // Catat log aktivitas jika ada session user
        if (session('id_user')) {
            DB::table('tb_log_aktivitas')->insert([
                'id_user'         => session('id_user'),
                'aktivitas'       => 'Mencatat kendaraan masuk gerbang (' . $platNomor . ')',
                'waktu_aktivitas' => Carbon::now(),
            ]);
        }

        return redirect()
            ->route('admin.kendaraan.index')
            ->with('success', 'Data kendaraan ' . $platNomor . ' berhasil dicatat dan notifikasi otomatis terkirim ke Petugas!');
    }

    public function edit($id)
    {
        $kendaraan = DB::table('tb_kendaraan')
            ->where('id_kendaraan', $id)
            ->first();

        return view('admin.kendaraan.edit', compact('kendaraan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'plat_nomor'      => 'required',
            'jenis_kendaraan' => 'required',
            'pemilik'         => 'required',
        ]);

        DB::table('tb_kendaraan')
            ->where('id_kendaraan', $id)
            ->update([
                'plat_nomor'      => strtoupper(trim($request->plat_nomor)),
                'jenis_kendaraan' => $request->jenis_kendaraan,
                'pemilik'         => $request->pemilik,
            ]);

        return redirect()
            ->route('admin.kendaraan.index')
            ->with('success', 'Kendaraan berhasil diupdate!');
    }

    public function destroy($id)
    {
        $adaTransaksi = DB::table('tb_transaksi')
            ->where('id_kendaraan', $id)
            ->exists();

        if ($adaTransaksi) {
            return redirect()
                ->route('admin.kendaraan.index')
                ->with('error', 'Kendaraan tidak bisa dihapus karena sudah memiliki riwayat transaksi!');
        }

        $antrean = Cache::get('antrean_kendaraan_petugas', []);
        $antrean = array_values(array_diff($antrean, [(int) $id]));
        Cache::forever('antrean_kendaraan_petugas', $antrean);

        DB::table('tb_kendaraan')
            ->where('id_kendaraan', $id)
            ->delete();

        return redirect()
            ->route('admin.kendaraan.index')
            ->with('success', 'Kendaraan berhasil dihapus!');
    }
}