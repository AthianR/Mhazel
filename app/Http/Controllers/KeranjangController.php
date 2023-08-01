<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Produk;
use App\Models\Keranjang;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class KeranjangController extends Controller
{
    public function updateQty($id, Request $request)
    {
        $keranjang = Keranjang::find($id);
        if (!$keranjang) {
            return response()->json(['error' => 'Keranjang tidak ditemukan.'], 404);
        }

        $newQty = $request->input('qty');
        $keranjang->qty = $newQty;
        $keranjang->save();

        // Mengembalikan data harga ke client agar dapat diupdate di frontend
        return response()->json(['harga' => $keranjang->product->harga]);
    }

    public function index()
    {
        $nilaiDefaultQty = 1;
        $userId = Auth::user()->id;
        // dd($userId);
        $user = User::join('tb_profile', 'tb_profile.user_id', '=', 'users.id')
            ->where('users.id', $userId)
            ->select('users.nama_lengkap as nama_lengkap', 'tb_profile.alamat_user as alamat_user', 'tb_profile.phone as phone', 'tb_profile.alamat_user as alamat_pengiriman')
            ->get();
        // dd($user);

        $data = Keranjang::select('tb_produk.id as produk_id', 'tb_keranjang.id as id', 'tb_produk.nama_produk as nama_produk', 'tb_keranjang.qty as qty', 'tb_produk.harga as harga', 'tb_produk.gambar_produk as gambar_produk', 'tb_varian.nama_variasi as nama_variasi')
            ->join('users', 'tb_keranjang.user_id', '=', 'users.id')
            ->join('tb_produk', 'tb_keranjang.produk_id', '=', 'tb_produk.id')
            ->join('tb_varian', 'tb_produk.variasi_id', '=', 'tb_varian.id')
            ->where('users.id', $userId)
            ->get();
        // dd($data);
        return view('cart', compact('data', 'nilaiDefaultQty', 'user'));
    }

    public function store(Request $request)
    {
        $keranjang_id = $request->input('id');
        $produk_id = $request->input('produk_id');

        // $request->validate([
        //     'produk_id' => 'required|string',
        //     'qty' => 'required|integer',
        // ]);

        $produk = Keranjang::find($keranjang_id);
        // dd($keranjang_id,$produk_id,$produk);

        if (!$produk) {
            // Jika produk tidak ditemukan, tampilkan pesan error atau arahkan kembali ke halaman sebelumnya
            return back()->withErrors(['message' => 'Keranjang tidak ditemukan.']);
        }

        $id_user = Auth::user()->id;

        $cart = Keranjang::where('user_id', $id_user)
            ->where('produk_id', $produk_id)
            ->where('id', $keranjang_id)
            ->first();

        // dd($cart);

        if ($cart) {
            // Jika produk sudah ada di dalam keranjang, tingkatkan jumlahnya
            $cart->qty++;
            $cart->save();
        }

        return redirect('/cart')->with('success', 'Jumlah berhasil ditambahkan!');
    }

    public function destroy(Request $request)
    {
        $keranjang_id = $request->input('id');
        $produk_id = $request->input('produk_id');

        // $request->validate([
        //     'produk_id' => 'required|string',
        //     'qty' => 'required|integer',
        // ]);

        $produk = Keranjang::find($keranjang_id);
        // dd($keranjang_id,$produk_id,$produk);

        if (!$produk) {
            // Jika produk tidak ditemukan, tampilkan pesan error atau arahkan kembali ke halaman sebelumnya
            return back()->withErrors(['message' => 'Keranjang tidak ditemukan.']);
        }

        $id_user = Auth::user()->id;

        $cart = Keranjang::where('user_id', $id_user)
            ->where('produk_id', $produk_id)
            ->where('id', $keranjang_id)
            ->first();

        // dd($cart);

        if ($cart) {
            // Jika produk sudah ada di dalam keranjang, tingkatkan jumlahnya
            if ($cart->qty > 1) {
                $cart->qty--;
                $cart->save();
            } else {
                // Add an alert here for the quantity being 1
                return redirect('/cart')->with('warning', 'Jumlah produk di dalam keranjang sudah 1, Anda tidak dapat mengurangi lagi.');
            }
        }

        // if ($cart) {
        //     // Jika produk sudah ada di dalam keranjang, tingkatkan jumlahnya
        //     $cart->qty--;
        //     $cart->save();
        // }

        return redirect('/cart')->with('success', 'Jumlah berhasil kurangi!');
    }

    public function addToCart(Request $request)
    {
        // Ambil nilai ID produk dari input tersembunyi
        $produk_id = $request->input('id');
        // dd($product_id);

        // Cari produk berdasarkan ID
        $produk = Produk::find($produk_id);

        if (!$produk) {
            // Jika produk tidak ditemukan, tampilkan pesan error atau arahkan kembali ke halaman sebelumnya
            return back()->withErrors(['message' => 'Produk tidak ditemukan.']);
        }

        // Jika produk ditemukan, tambahkan produk ke keranjang belanja pengguna saat ini
        $user = Auth::user();

        // Periksa apakah produk sudah ada di dalam keranjang pengguna
        $cart = Keranjang::where('user_id', $user->id)
            ->where('produk_id', $produk_id)
            ->first();

        if ($cart) {
            // Jika produk sudah ada di dalam keranjang, tingkatkan jumlahnya
            $cart->qty++;
        } else {
            // Jika produk belum ada di dalam keranjang, tambahkan sebagai item baru
            $cart = new Keranjang([
                'user_id' => $user->id,
                'produk_id' => $produk_id,
                'qty' => 1,
            ]);
        }

        $cart->save();

        return redirect()
            ->route('cart')
            ->with('success', 'Produk berhasil ditambahkan ke keranjang.');
    }

    public function deleteCart($id)
    {
        $keranjang = Keranjang::find($id);
        if (!$keranjang) {
            // Jika keranjang tidak ditemukan, tampilkan pesan error atau arahkan kembali ke halaman sebelumnya
            return back()->withErrors(['message' => 'Produk dalam keranjang tidak ditemukan.']);
        }

        // Hapus produk dari keranjang
        $keranjang->delete();

        return redirect()
            ->route('cart')
            ->with('success', 'Produk berhasil dihapus dari keranjang.');
    }
}
