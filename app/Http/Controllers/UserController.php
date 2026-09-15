<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    // =========================
    // TAMPILKAN DATA USER
    // =========================
    public function index()
    {
        $users = DB::table('tb_user')
            ->orderBy('id_user', 'desc')
            ->get();

        return view('admin.user.index', compact('users'));
    }

    // =========================
    // FORM TAMBAH USER
    // =========================
    public function create()
    {
        return view('admin.user.create');
    }

    // =========================
    // SIMPAN USER BARU
    // =========================
    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:100',
            'username' => 'required|string|max:50|unique:tb_user,username',
            'password' => 'required|string|min:6',
            'role' => 'required|in:admin,petugas,owner',
        ]);

        DB::table('tb_user')->insert([
            'nama_lengkap' => $request->nama_lengkap,
            'username' => $request->username,
            'password' => password_hash($request->password, PASSWORD_DEFAULT),
            'role' => $request->role,
            'status_aktif' => 1,
        ]);

        return redirect()
            ->route('admin.user.index')
            ->with('success', 'User berhasil ditambahkan!');
    }

    // =========================
    // FORM EDIT USER
    // =========================
    public function edit($id)
    {
        $user = DB::table('tb_user')
            ->where('id_user', $id)
            ->first();

        if (!$user) {
            return redirect()
                ->route('admin.user.index')
                ->with('error', 'User tidak ditemukan.');
        }

        return view('admin.user.edit', compact('user'));
    }

    // =========================
    // UPDATE USER
    // =========================
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:100',
            'username' => 'required|string|max:50|unique:tb_user,username,' . $id . ',id_user',
            'role' => 'required|in:admin,petugas,owner',
        ]);

        $data = [
            'nama_lengkap' => $request->nama_lengkap,
            'username' => $request->username,
            'role' => $request->role,
        ];

        if ($request->filled('password')) {
            $request->validate([
                'password' => 'string|min:6',
            ]);

            $data['password'] = password_hash(
                $request->password,
                PASSWORD_DEFAULT
            );
        }

        DB::table('tb_user')
            ->where('id_user', $id)
            ->update($data);

        return redirect()
            ->route('admin.user.index')
            ->with('success', 'User berhasil diperbarui!');
    }

    // =========================
    // HAPUS USER
    // =========================
    public function destroy($id)
    {
        $user = DB::table('tb_user')
            ->where('id_user', $id)
            ->first();

        if (!$user) {
            return redirect()
                ->route('admin.user.index')
                ->with('error', 'User tidak ditemukan.');
        }

        // Cek data kendaraan
        $jumlahKendaraan = DB::table('tb_kendaraan')
            ->where('id_user', $id)
            ->count();

        if ($jumlahKendaraan > 0) {
            return redirect()
                ->route('admin.user.index')
                ->with(
                    'error',
                    'User tidak dapat dihapus karena masih memiliki data kendaraan.'
                );
        }

        // Cek data log aktivitas
        $jumlahLogAktivitas = DB::table('tb_log_aktivitas')
            ->where('id_user', $id)
            ->count();

        if ($jumlahLogAktivitas > 0) {
            return redirect()
                ->route('admin.user.index')
                ->with(
                    'error',
                    'User tidak dapat dihapus karena masih memiliki log aktivitas.'
                );
        }

        // Hapus user jika tidak memiliki data terkait
        DB::table('tb_user')
            ->where('id_user', $id)
            ->delete();

        return redirect()
            ->route('admin.user.index')
            ->with('success', 'User berhasil dihapus!');
    }
}