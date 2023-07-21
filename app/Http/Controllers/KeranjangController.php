<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Keranjang;
use Illuminate\Http\Request;

class KeranjangController extends Controller
{
    public function index(Request $id){
        $data = Keranjang::all();
        $product = Produk::find($id);
        // dd($product);
        return view ('cart', compact('data','product'));
    }
    
    public function addToCart(Produk $id)
    {
        
        // Dapatkan atau buat keranjang belanja untuk pengguna saat ini
        $cart = Keranjang::firstOrCreate(['user_id' => auth()->id()]);

        // Tambahkan produk ke dalam keranjang belanja
        $cart->products()->attach($id->id);
        // dd($cart);
        return redirect()
            ->back()
            ->with('success', 'Produk berhasil ditambahkan ke keranjang belanja.');
    }
}
