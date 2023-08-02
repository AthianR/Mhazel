<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Produk;
use App\Models\Profile;
use App\Models\Keranjang;
use App\Models\Transaksi;
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

    public function detailProfile(){
        $user = Auth::user();
        $profile = User::select('tb_profile.*', 'users.id as user_id')
            ->join('tb_profile', 'users.id', '=', 'tb_profile.user_id')
            ->where('tb_profile.user_id', $user->id)
            ->get();
        return view('detail_profile', compact('profile'));
    }

    public function profile()
    {
        // $user = Auth::user();
        // $profile = User::select('tb_profile.*', 'tb_keranjang.qty as qty')
        //     ->join('tb_produk', 'tb_keranjang.produk_id', '=', 'tb_produk.id')
        //     ->where('tb_keranjang.user_id', $user->id)
        //     ->orderBy('tb_keranjang.qty', 'desc')
        //     ->limit(5) // Batasi hanya 5 produk rekomendasi
        //     ->get();
        // return view('profile', compact('profile'));
        return view('profile');
    }

    public function update(Request $request)
    {
        $user = Auth::user()->id;
        $validatedData = $request->validate(
            [
                'nohp' => 'required|numeric|digits_between:10,15',
                'alamat_user' => 'required|string|max:555',
            ],
            [
                'phone_number.required' => 'Nomor HP harus diisi.',
                'phone_number.numeric' => 'Nomor HP harus berupa angka.',
                'phone_number.digits_between' => 'Nomor HP harus terdiri dari 10 hingga 15 digit.',
            ],
        );

        // Buat pengguna baru
        $user = Profile::create([
            'user_id' => $user,
            'alamat_user' => $validatedData['alamat_user'],
            'gambar_user' => 'user.png',
            'phone' => $validatedData['nohp'],
            'status' => 'active',
        ]);

        return redirect()
            ->route('cart')
            ->with('success', 'Data berhasil disimpan.');
    }

    public function rekomendasi()
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login');
        }

        // Menggunakan relasi antara tabel Keranjang dan User dengan whereHas
        $rekomendasi = Keranjang::select('tb_produk.*', 'tb_keranjang.qty as qty')
            ->join('tb_produk', 'tb_keranjang.produk_id', '=', 'tb_produk.id')
            ->where('tb_keranjang.user_id', $user->id)
            ->orderBy('tb_keranjang.qty', 'desc')
            ->limit(5) // Batasi hanya 5 produk rekomendasi
            ->get();
        $rekomen1 = Transaksi::all();
        dd($rekomendasi,$rekomen1);
        return view('rekomendasi', compact('rekomendasi'));
    }

    public function pembayaran(Request $request, $id)
    {
        // Ambil transaksi berdasarkan ID
        $transaksi = Transaksi::find($id);

        // Pastikan transaksi ditemukan
        if (!$transaksi) {
            return back()->with('error', 'Transaksi tidak ditemukan');
        }

        // Update nilai kolom 'status_pembayaran' dan 'status_pengiriman' pada transaksi
        $transaksi->update([
            'status_pembayaran' => 'Dibayar',
            'status_pengiriman' => 'Sedang Dikemas',
        ]);

        // Kembali ke halaman sebelumnya dengan pesan alert sukses
        return back()->with('success', 'Pembayaran berhasil diproses dan status pengiriman telah diubah menjadi "Sedang Dikemas"');
    }
}
