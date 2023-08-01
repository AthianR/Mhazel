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
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials) && Auth::user()->role_id === 1) {
            // Jika user berhasil login dan memiliki role_id = 1 (misalnya role customer)
            return redirect()
                ->route('dashboard.admin')
                ->with('success', 'Berhasil Login');
        } if (Auth::attempt($credentials) && Auth::user()->role_id === 2) {
            Auth::logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();
    
            return redirect('/loginadmin')->with('error', 'Gagal Login.');
        } 
        else {
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

        return redirect('/loginadmin')->with('success', 'Logout successful.');
    }
}
