<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Keranjang;
use App\Models\Varian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function all()
    {
        $data = Produk::paginate(5);
        // dd($data);
        return view('admin.produk-admin', compact('data'));
    }

    public function ambilkategori()
    {
        $data = Kategori::all();
        // dd($data);
        return view('admin.add-produk-admin', compact('data'));
    }

    public function storedata(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'nama_produk' => 'required|string|max:255',
            'gambar_produk' => 'required',
            'deskripsi_produk' => 'required|string',
            'kategori_produk' => 'required|numeric',
            'nama_varian' => 'required|string|max:255',
        ]);

        // Handle the file upload
        // $gambar_produk = $request->file('gambar_produk');
        // $gambar_produk_path = $gambar_produk->store('uploads', 'public'); // Change 'public' to the disk you want to use (configured in config/filesystems.php)

        // Create the product with the file path
        $mhs = Produk::create([
            'nama_produk' => $validatedData['nama_produk'],
            'gambar_produk' => $validatedData['gambar_produk'],
            'deskripsi_produk' => $validatedData['deskripsi_produk'],
            'kategori_id' => $validatedData['kategori_produk'],
            'varian_id' => $validatedData['nama_varian'],
        ]);

        // Set flash data for success message with time
        $request->session()->flash('success', 'Berhasil Menambahkan Data pada ' . now()->toDateTimeString());

        return redirect()->route('produk.admin');
    }

    public function index(Request $id)
    {
        $data = DB::table('tb_produk')
            ->leftJoin('tb_varian', 'tb_produk.id', '=', 'tb_varian.id_produk')
            ->leftJoin('tb_kategori', 'tb_produk.kategori_id', '=', 'tb_kategori.id')
            ->get();
        // dd($data);
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

    public function form()
    {
        return view('admin.add-produk-admin');
    }
}
