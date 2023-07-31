<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Buat pengguna baru
        $user = User::create([
            'nama_lengkap' => $validatedData['nama_lengkap'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        // Ambil role 'customer' dari tabel roles
        // $roleCustomer = Role::where('role_id', '2')->first();
        // dd($roleCustomer);

        // Hubungkan role 'customer' dengan pengguna yang baru dibuat
        // $user->roles()->attach($roleCustomer);

        // Berhasil membuat pengguna, arahkan ke halaman beranda atau halaman lain yang sesuai
        return redirect('/login')->with('success', 'Registration successful. You can now log in.');
    }
}
