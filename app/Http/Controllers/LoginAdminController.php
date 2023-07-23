<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginAdminController extends Controller
{
    public function index()
    {
        return view('admin.login-admin');
    }

    public function loginadmin(Request $request)
    {
        // Validasi input email dan password terlebih dahulu
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // Cek apakah otentikasi berhasil dengan email dan password yang diberikan
        if (Auth::attempt($credentials)) {
            // Jika otentikasi berhasil, cek apakah pengguna memiliki peran 'admin'
            if ($request->user()->role === 'admin') {
                // Jika pengguna adalah admin, arahkan ke halaman dashboard admin
                return redirect()
                    ->route('dashboard.admin')
                    ->with('success', 'Login successful as admin.');
            } else {
                // Jika pengguna bukan admin, logout dan kembali ke halaman login dengan pesan error
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                return back()->withErrors([
                    'email' => 'You are not allowed to login as admin!',
                ]);
            }
        } else {
            // Jika otentikasi gagal, kembali ke halaman login dengan pesan error
            return back()->withErrors([
                'email' => 'Invalid email or password.',
            ]);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/loginadmin')->with('success', 'Logout successful.');
    }
}
