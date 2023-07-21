<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function login(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // Coba melakukan otentikasi
        if (Auth::attempt($credentials)) {
            // Autentikasi berhasil
            $user = Auth::user(); // Ambil informasi pengguna yang telah terautentikasi
    
            if ($user->role === 'admin') {
                // Jika pengguna memiliki peran 'admin', arahkan ke halaman admin
                return redirect()->route('dashboard.admin')->with('success', 'Login successful as Admin.');

            } elseif ($user->role === 'user') {
                // Jika pengguna memiliki peran 'user', arahkan ke halaman user
                return redirect()->route('dashboard.user')->with('success', 'Login successful as User.');
            }
        }
    
        // Jika otentikasi gagal, kembali ke halaman login dengan pesan error
        return back()->withErrors([
            'email' => 'Incorrect email or password, please try again!',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Logout successful.');
    }
}
