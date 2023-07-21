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

    public function store(Request $request){
        DB::beginTransaction();

        try {
            // Insert data into users table
            $produk = Produk::create([
                'nama_produk' => $request->nama_produk,
                'gambar_produk' => $request->gambar_produk,
                'deskripsi_produk' => $request->deskripsi_produk,
            ]);

            // Insert data into user_details table with foreign key user_id
            $produk->detail()->create([
                'kategori' => $request->kategori,
            ]);

            $produk->detail()->create([
                'nama_varian' => $request->varian,
                'harga_produk' => $request->varian,
                'stock' => $request->varian,
            ]);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Gagal menyimpan data.');
        }

        return redirect()->back()->with('success', 'Data berhasil disimpan.');

    }
}
