<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    // HALAMAN LOGIN
    public function index()
    {
        return view('login');
    }

    // PROSES LOGIN
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = DB::table('tb_user')
            ->where('username', $request->username)
            ->where('status_aktif', 1)
            ->first();

        // Validasi keberadaan user dan pengecekan hash password
        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()
                ->withInput($request->only('username'))
                ->with('error', 'Username atau password salah!');
        }

       $request->session()->regenerate();

session([
    'id_user' => $user->id_user,
    'nama_lengkap' => $user->nama_lengkap,
    'username' => $user->username,
    'role' => $user->role,
    'user_role' => $user->role,
]);
        switch ($user->role) {
            case 'admin':
                return redirect()->route('admin.dashboard');

            case 'petugas':
                return redirect()->route('petugas.dashboard');

            case 'owner':
                return redirect()->route('owner.dashboard');

            default:
                $request->session()->flush();

                return redirect()
                    ->route('login')
                    ->with('error', 'Role user tidak dikenali!');
        }
    }

    // TAMPILKAN HALAMAN LUPA PASSWORD
    public function lupaPasswordView()
    {
        return view('lupa-password');
    }

    // PROSES UPDATE PASSWORD BARU
    public function resetPassword(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password_baru' => 'required',
        ]);

        $user = DB::table('tb_user')->where('username', $request->username)->first();

        if (!$user) {
            return back()->with('error', 'Username tidak ditemukan!');
        }

        DB::table('tb_user')
            ->where('username', $request->username)
            ->update([
                'password' => Hash::make($request->password_baru)
            ]);

        return redirect()->route('login')->with('success', 'Kata sandi berhasil diperbarui! Silakan login.');
    }

    // LOGOUT
    // LOGOUT
public function logout(Request $request)
{
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()
        ->route('login')
        ->with('success', 'Berhasil logout!');
}
}