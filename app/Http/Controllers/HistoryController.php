<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    public function index()
    {
        $userId = Auth::user()->id;
        $data = Keranjang::select('tb_keranjang.id as id', 'tb_produk.nama_produk as nama_produk', 'tb_keranjang.qty as qty', 'tb_produk.harga as harga', 'tb_produk.gambar_produk as gambar_produk', 'tb_varian.nama_variasi as nama_variasi')
            ->join('users', 'tb_keranjang.user_id', '=', 'users.id')
            ->join('tb_produk', 'tb_keranjang.product_id', '=', 'tb_produk.id')
            ->join('tb_varian', 'tb_produk.variasi_id', '=', 'tb_varian.id')
            ->where('users.id', $userId)
            ->get();
        // dd($data);
        return view('history', compact('data'));
    }
}
