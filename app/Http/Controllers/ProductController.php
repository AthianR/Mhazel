<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Produk;
use App\Models\Varian;
use App\Models\Kategori;
use App\Models\Keranjang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index(Request $id)
    {
        $data = Produk::select(
            'tb_produk.id as id', 
            'tb_produk.nama_produk as nama_produk', 
            'tb_kategori.nama_kategori as nama_kategori', 
            'tb_produk.stok as stok', 
            'tb_produk.deskripsi as deskripsi', 
            'tb_produk.harga as harga', 
            'tb_produk.gambar_produk as gambar_produk', 
            )
        ->join('tb_kategori', 'tb_produk.kategori_id', '=', 'tb_kategori.id')
        ->paginate(16);
        // dd($produk);

        // $data = Produk::all();
        $cart = Keranjang::select('*', DB::raw('(SELECT SUM(qty) FROM tb_keranjang WHERE tb_keranjang.produk_id = tb_produk.id) as produk_sum_qty'))
            ->join('tb_produk', 'tb_keranjang.produk_id', '=', 'tb_produk.id')
            ->orderByDesc('produk_sum_qty')
            ->limit(5)
            ->get();
        // dd($cart);
        // dd($data);
        return view('dashboard', compact('data', 'cart'));
    }

    // public function recommendProducts()
    // {
    //     $products = Produk::withCount('orders')->orderBy('orders_count', 'desc')->limit(5)->get();

    //     return view('recommendations', compact('products'));
    // }

    public $search;
    protected $queryString = ['search'];
    public $limitPerPage = 5;

    public function all()
    {
        $posts = Produk::paginate(5);
        // dd($posts);
        if ($this->search !== null) {
            $posts = Produk::where('nama_produk', 'like', '%' . $this->search . '%')
                ->latest()
                ->paginate($this->limitPerPage);
        }
        return view('admin.produk-admin', ['posts' => $posts]);
    }

    public function ambilkategori()
    {
        $data = Kategori::all();
        $varian = Varian::all();
        // dd($data);
        return view('admin.add-produk-admin', compact('data', 'varian'));
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

    public function keychain(Request $id)
    {
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

    public function formKategori()
    {
        $data = Kategori::all();
        // dd($data);
        return view('admin.form-kategori', compact('data'));
    }

    public function tambahKategori(Request $request)
    {
        
        $validatedData = $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);

        $kategori = Kategori::create([
            'nama_kategori' => $validatedData['nama_kategori'],
        ]);
        // Set flash data for success message with time
        $request->session()->flash('success', 'Berhasil Menambahkan Data Kategori pada ' . now()->toDateTimeString());

        return redirect()->route('add.kategori');
    }

    public function destroyKategori($id)
    {
        $kategori = Kategori::find($id);
        if (!$kategori) {
            // Jika keranjang tidak ditemukan, tampilkan pesan error atau arahkan kembali ke halaman sebelumnya
            return back()->withErrors(['message' => 'Kategori tidak ditemukan.']);
        }

        // Hapus produk dari keranjang
        $kategori->delete();

        return redirect()
            ->route('add.kategori')
            ->with('success', 'Kategori berhasil dihapus.');
    }

    public function formVariasi()
    {
        $data = DB::table('tb_varian')->get();
        // dd($data);
        return view('admin.form-variasi', compact('data'));
    }

    public function tambahVariasi(Request $request)
    {
        $validatedData = $request->validate([
            'nama_varian' => 'required|string|max:255',
            'harga_produk' => 'required|string|max:255',
            'gambar_produk' => 'required|string|max:255',
            'stok' => 'required|string|max:255',
        ]);

        $kategori = Varian::create([
            'nama_varian' => $validatedData['nama_varian'],
            'harga_produk' => $validatedData['harga_produk'],
            'gambar_produk' => $validatedData['gambar_produk'],
            'stock' => $validatedData['stok'],
        ]);

        // Set flash data for success message with time
        $request->session()->flash('success', 'Berhasil Menambahkan Data Variasi pada ' . now()->toDateTimeString());

        return redirect()->route('add.variasi');
    }

    // public function __construct()
    // {
    //     $this->middleware('admin')->only(['all', 'ambilkategori', 'storedata', 'form', 'formKategori', 'tambahKategori', 'formVariasi', 'tambahVariasi']);
    // }
}
