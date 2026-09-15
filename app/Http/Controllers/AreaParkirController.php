<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AreaParkirController extends Controller
{
    // MENAMPILKAN DATA AREA PARKIR
    public function index()
    {
        $areas = DB::table('tb_area_parkir')->get();

        return view('admin.area_parkir.index', compact('areas'));
    }


    // HALAMAN TAMBAH AREA PARKIR
    public function create()
    {
        return view('admin.area_parkir.create');
    }


    // SIMPAN AREA PARKIR
    public function store(Request $request)
    {
        $request->validate([
            'nama_area' => 'required',
            'kapasitas' => 'required|numeric|min:1',
            'terisi' => 'required|numeric|min:0',
        ]);

        DB::table('tb_area_parkir')->insert([
            'nama_area' => $request->nama_area,
            'kapasitas' => $request->kapasitas,
            'terisi' => $request->terisi,
        ]);

        return redirect()
            ->route('admin.area.index')
            ->with('success', 'Area parkir berhasil ditambahkan!');
    }


    // HALAMAN EDIT AREA PARKIR
    public function edit($id)
    {
        $area = DB::table('tb_area_parkir')
            ->where('id_area', $id)
            ->first();

        return view('admin.area_parkir.edit', compact('area'));
    }


    // UPDATE AREA PARKIR
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_area' => 'required',
            'kapasitas' => 'required|numeric|min:1',
            'terisi' => 'required|numeric|min:0',
        ]);

        // TERISI TIDAK BOLEH LEBIH BESAR DARI KAPASITAS
        if ($request->terisi > $request->kapasitas) {
            return back()
                ->withInput()
                ->with('error', 'Jumlah terisi tidak boleh melebihi kapasitas!');
        }

        DB::table('tb_area_parkir')
            ->where('id_area', $id)
            ->update([
                'nama_area' => $request->nama_area,
                'kapasitas' => $request->kapasitas,
                'terisi' => $request->terisi,
            ]);

        return redirect()
            ->route('admin.area.index')
            ->with('success', 'Area parkir berhasil diupdate!');
    }


    // HAPUS AREA PARKIR
    public function destroy($id)
    {
        // CEK APAKAH AREA SUDAH DIPAKAI DI TRANSAKSI
        $adaTransaksi = DB::table('tb_transaksi')
            ->where('id_area', $id)
            ->exists();

        // JIKA SUDAH ADA TRANSAKSI
        if ($adaTransaksi) {
            return redirect()
                ->route('admin.area.index')
                ->with(
                    'error',
                    'Area parkir tidak bisa dihapus karena sudah memiliki riwayat transaksi!'
                );
        }

        // JIKA BELUM ADA TRANSAKSI, BARU BOLEH DIHAPUS
        DB::table('tb_area_parkir')
            ->where('id_area', $id)
            ->delete();

        return redirect()
            ->route('admin.area.index')
            ->with('success', 'Area parkir berhasil dihapus!');
    }
}