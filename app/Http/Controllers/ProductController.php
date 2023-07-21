<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Keranjang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function all(){
        $data = Produk::paginate(5);
        // dd($data);
        return view('admin.produk-admin', compact('data'));
    }

    public function index(Request $id)
    {
        $data = Produk::join('tb_kategori', 'tb_produk.kategori_id', '=', 'tb_kategori.id')
            // ->where('tb_kategori.kategori', '=', 'Keychain')
            // ->select('tb_produk.*', 'tb_kategori.harga_produk')
            ->get();
        // $data = Produk::all();
        $product = Produk::find($id);
        // dd($data);
        return view('dashboard', compact('data', 'id'));
    }

    public function keychain(Request $id)
    {
        // $data = DB::table('tb_produk')
        //     ->join('tb_kategori', 'tb_produk.kategori_id', '=', 'tb_kategori.id')
        //     ->join('tb_varian', 'tb_produk.id', '=', 'tb_varian.produk_id')
        //     ->where('tb_kategori.nama_kategori', '=', 'Nama Kategori Tertentu')
        //     ->where('tb_varian.nama_varian', '=', 'Nama Varian Tertentu')
        //     ->select('tb_produk.*', 'tb_kategori.nama_kategori', 'tb_varian.nama_varian')
        //     ->get();
        $data = DB::table('tb_varian')
            ->leftJoin('tb_produk', 'tb_varian.id', '=', 'tb_produk.varian_id')
            ->leftJoin('tb_kategori', 'tb_produk.kategori_id', '=', 'tb_kategori.id')
            ->where('tb_kategori.nama_kategori', '=', 'Keychain')
            // ->where('tb_varian.nama_varian', '=', 'Nama Varian Tertentu')
            ->select('tb_varian.*', 'tb_produk.nama_produk', 'tb_kategori.nama_kategori')
            ->get();
        dd($data);
        // return view('product.key', compact('data', 'id'));
    }

    public function form(){
        return view('admin.add-produk-admin');
    }
}
