<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function deleteUsers(Request $request)
    {
        $selectedUsers = $request->input('selectedUsers', []);
        User::whereIn('id', $selectedUsers)->delete();

        // Redirect atau tampilkan pesan sukses sesuai kebutuhan
        return redirect()
            ->back()
            ->with('success', 'Users berhasil dihapus.');
    }
    public function __construct()
    {
        $this->middleware('admin')->only(['deleteUsers']);
    }

    public function profile(){
        return view('profile');
    }

    public function update(Request $request){
        $user = Auth::user()->id;
        $validatedData = $request->validate([
            'nohp' => 'required|numeric|digits_between:10,15',
            'alamat_user' => 'required|string|max:555',
        ],[
            'phone_number.required' => 'Nomor HP harus diisi.',
            'phone_number.numeric' => 'Nomor HP harus berupa angka.',
            'phone_number.digits_between' => 'Nomor HP harus terdiri dari 10 hingga 15 digit.',
        ]);

        // Buat pengguna baru
        $user = Profile::create([
            'user_id' => $user,
            'alamat_user' => $validatedData['alamat_user'],
            'gambar_user' => 'user.png',
            'phone' => $validatedData['nohp'],
            'status' => 'active',
        ]);

        return redirect()->route('cart')->with('success', 'Data berhasil disimpan.');
    }
}
