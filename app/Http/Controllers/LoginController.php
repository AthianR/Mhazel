<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials) && Auth::user()->role_id === 2) {
            // Jika user berhasil login dan memiliki role_id = 1 (misalnya role customer)
            return redirect()
                ->route('dashboard.user')
                ->with('success', 'Berhasil Login');
        }
        if (Auth::attempt($credentials) && Auth::user()->role_id === 1) {
            Auth::logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();
    
            return redirect('/login')->with('error', 'Gagal Login.');
        } else {
            // Jika login gagal atau user tidak memiliki role tertentu, kembali ke halaman login dengan pesan error
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

        return redirect('/')->with('success', 'Logout successful.');
    }
}
