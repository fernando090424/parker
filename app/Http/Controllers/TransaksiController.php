<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TransaksiController extends Controller
{
    // =====================================================
    // HALAMAN DAFTAR TRANSAKSI
    // =====================================================
    public function index()
    {
        $transaksi = DB::table('tb_transaksi')
            ->join(
                'tb_kendaraan',
                'tb_transaksi.id_kendaraan',
                '=',
                'tb_kendaraan.id_kendaraan'
            )
            ->join(
                'tb_area_parkir',
                'tb_transaksi.id_area',
                '=',
                'tb_area_parkir.id_area'
            )
            ->join(
                'tb_tarif',
                'tb_transaksi.id_tarif',
                '=',
                'tb_tarif.id_tarif'
            )
            ->select(
                'tb_transaksi.*',
                'tb_kendaraan.plat_nomor',
                'tb_kendaraan.jenis_kendaraan',
                'tb_kendaraan.pemilik',
                'tb_area_parkir.nama_area',
                'tb_tarif.tarif_per_jam'
            )
            ->orderBy('tb_transaksi.id_parkir', 'desc')
            ->get();

        return view('petugas.transaksi.index', compact('transaksi'));
    }


    // =====================================================
    // HALAMAN TAMBAH KENDARAAN MASUK
    // =====================================================
    public function create()
    {
        // DATA KENDARAAN (Hanya yang BELUM PERNAH masuk transaksi sama sekali)
        $kendaraans = DB::table('tb_kendaraan')
            ->whereNotIn('id_kendaraan', function ($query) {
                $query->select('id_kendaraan')
                      ->from('tb_transaksi');
            })
            ->orderBy('plat_nomor', 'asc')
            ->get();


        // DATA AREA PARKIR YANG MASIH TERSEDIA
        $areas = DB::table('tb_area_parkir')
            ->whereColumn('terisi', '<', 'kapasitas')
            ->get();


        // DATA TARIF
        $tarifs = DB::table('tb_tarif')
            ->get();


        // KIRIM DATA KE HALAMAN CREATE
        return view(
            'petugas.transaksi.create',
            compact(
                'kendaraans',
                'areas',
                'tarifs'
            )
        );
    }


    // =====================================================
    // SIMPAN KENDARAAN MASUK
    // =====================================================
    public function store(Request $request)
    {
        $request->validate([
            'id_kendaraan' => 'required',
            'id_area'      => 'required',
            'id_tarif'     => 'required',
        ]);


        // CEK APAKAH KENDARAAN SUDAH PERNAH DIPROSES TRANSAKSI
        $sudahTransaksi = DB::table('tb_transaksi')
            ->where('id_kendaraan', $request->id_kendaraan)
            ->exists();


        if ($sudahTransaksi) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors([
                    'id_kendaraan' => 'Kendaraan tersebut sudah pernah diproses transaksi parkir!'
                ]);
        }


        // CEK AREA PARKIR
        $area = DB::table('tb_area_parkir')
            ->where('id_area', $request->id_area)
            ->first();


        if (!$area) {
            return redirect()
                ->back()
                ->withErrors(['id_area' => 'Area parkir tidak ditemukan!']);
        }


        // CEK SLOT PENUH
        if ($area->terisi >= $area->kapasitas) {
            return redirect()
                ->back()
                ->withErrors(['id_area' => 'Area parkir sudah penuh!']);
        }


        // SIMPAN TRANSAKSI (Kolom 'terisi' otomatis bertambah lewat Database Trigger)
        DB::table('tb_transaksi')->insert([
            'id_kendaraan' => $request->id_kendaraan,
            'waktu_masuk'  => Carbon::now(),
            'waktu_keluar' => null,
            'id_tarif'     => $request->id_tarif,
            'durasi_jam'   => null,
            'biaya_total'  => null,
            'status'       => 'masuk',
            'id_user'      => session('id_user'),
            'id_area'      => $request->id_area,
        ]);


        // CATAT LOG
        if (session('id_user')) {
            DB::table('tb_log_aktivitas')->insert([
                'id_user'         => session('id_user'),
                'aktivitas'       => 'Menambahkan kendaraan masuk',
                'waktu_aktivitas' => Carbon::now(),
            ]);
        }


        return redirect()
            ->route('petugas.transaksi.index')
            ->with(
                'success',
                'Kendaraan berhasil masuk ke area parkir!'
            );
    }


    // =====================================================
    // PROSES KENDARAAN KELUAR
    // =====================================================
    public function keluar($id)
    {
        // AMBIL DATA TRANSAKSI DAN TARIF
        $transaksi = DB::table('tb_transaksi')
            ->join(
                'tb_tarif',
                'tb_transaksi.id_tarif',
                '=',
                'tb_tarif.id_tarif'
            )
            ->select(
                'tb_transaksi.*',
                'tb_tarif.tarif_per_jam'
            )
            ->where('tb_transaksi.id_parkir', $id)
            ->first();


        // CEK TRANSAKSI
        if (!$transaksi) {
            return redirect()
                ->back()
                ->with(
                    'error',
                    'Data transaksi tidak ditemukan!'
                );
        }


        // CEK STATUS
        if ($transaksi->status === 'keluar') {
            return redirect()
                ->back()
                ->with(
                    'error',
                    'Kendaraan sudah keluar!'
                );
        }


        // WAKTU KELUAR & MASUK
        $waktuKeluar = Carbon::now();
        $waktuMasuk = Carbon::parse($transaksi->waktu_masuk);


        // HITUNG DURASI DALAM MENIT & UBAH KE JAM (MINIMAL 1 JAM)
        $durasiMenit = $waktuMasuk->diffInMinutes($waktuKeluar);
        $durasiJam = ceil($durasiMenit / 60);

        if ($durasiJam < 1) {
            $durasiJam = 1;
        }


        // HITUNG BIAYA
        $biayaTotal = $durasiJam * $transaksi->tarif_per_jam;


        // UPDATE TRANSAKSI (Kolom 'terisi' otomatis berkurang lewat Database Trigger)
        DB::table('tb_transaksi')
            ->where('id_parkir', $id)
            ->update([
                'waktu_keluar' => $waktuKeluar,
                'durasi_jam'   => $durasiJam,
                'biaya_total'  => $biayaTotal,
                'status'       => 'keluar',
            ]);


        // CATAT LOG
        if (session('id_user')) {
            DB::table('tb_log_aktivitas')->insert([
                'id_user'         => session('id_user'),
                'aktivitas'       => 'Memproses kendaraan keluar',
                'waktu_aktivitas' => Carbon::now(),
            ]);
        }


        // KEMBALI KE HALAMAN TRANSAKSI
        return redirect()
            ->route('petugas.transaksi.index')
            ->with(
                'success',
                'Kendaraan berhasil keluar! Biaya parkir: Rp ' .
                number_format($biayaTotal, 0, ',', '.')
            );
    }


    // =====================================================
    // CEK DATA KENDARAAN BARU YANG DIINPUT ADMIN
    // =====================================================
    public function cekKendaraanBaru(Request $request)
    {
        // Cari kendaraan dari Admin yang belum pernah masuk transaksi parkir sama sekali
        $kendaraanBelumParkir = DB::table('tb_kendaraan')
            ->whereNotIn('id_kendaraan', function ($query) {
                $query->select('id_kendaraan')->from('tb_transaksi');
            })
            ->orderBy('id_kendaraan', 'desc')
            ->get();

        return response()->json([
            'jumlah'  => $kendaraanBelumParkir->count(),
            'terbaru' => $kendaraanBelumParkir->first(),
        ]);
    }
}