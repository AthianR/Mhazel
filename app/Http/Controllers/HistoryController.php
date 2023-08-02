<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    public function index()
    {
        $userId = Auth::user()->id;
        $data = User::select(
            'tb_transaksi.id as id', 
            'tb_transaksi.total_harga as total_harga', 
            'tb_transaksi.created_at as tanggal_transaksi', 
            'tb_produk.nama_produk as nama_produk', 
            'tb_keranjang.qty as qty', 
            'tb_transaksi.status_pembayaran as status_pembayaran', 
            'tb_transaksi.status_pengiriman as status_pengiriman')
        ->join('tb_keranjang', 'users.id', '=', 'tb_keranjang.user_id')
        ->join('tb_transaksi', 'users.id', '=', 'tb_transaksi.user_id')
        ->join('tb_produk', 'tb_keranjang.produk_id', '=', 'tb_produk.id')
        ->where('tb_transaksi.status_pembayaran', '=', 'Dipending')
        ->orWhere('users.id', $userId)
        ->orderBy('tb_transaksi.created_at', 'desc') // Menyortir berdasarkan kolom created_at terbaru
        ->paginate(1);
        // dd($data);

        $riwayat = User::select('tb_transaksi.id as id', 'tb_transaksi.total_harga as total_harga', 'tb_transaksi.created_at as tanggal_transaksi', 'tb_produk.nama_produk as nama_produk', 'tb_keranjang.qty as qty', 'tb_transaksi.status_pembayaran as status_pembayaran', 'tb_transaksi.status_pengiriman as status_pengiriman')
        ->join('tb_keranjang', 'users.id', '=', 'tb_keranjang.user_id')
        ->join('tb_transaksi', 'users.id', '=', 'tb_transaksi.user_id')
        ->join('tb_produk', 'tb_keranjang.produk_id', '=', 'tb_produk.id')
        ->where('tb_transaksi.status_pembayaran', '=', 'Dibayar')
        ->Where('users.id', $userId)
        ->orderBy('tb_transaksi.created_at', 'desc') // Menyortir berdasarkan kolom created_at terbaru
        ->paginate(5);
        // dd($riwayat);

        $produk = User::select('tb_transaksi.id as id', 'tb_transaksi.total_harga as total_harga', 'tb_transaksi.created_at as tanggal_transaksi', 'tb_produk.nama_produk as nama_produk', 'tb_keranjang.qty as qty', 'tb_transaksi.status_pembayaran as status_pembayaran', 'tb_transaksi.status_pengiriman as status_pengiriman')
        ->join('tb_keranjang', 'users.id', '=', 'tb_keranjang.user_id')
        ->join('tb_transaksi', 'users.id', '=', 'tb_transaksi.user_id')
        ->join('tb_produk', 'tb_keranjang.produk_id', '=', 'tb_produk.id')
        ->where('users.id', $userId)
        ->orderBy('tb_transaksi.created_at', 'desc') // Menyortir berdasarkan kolom created_at terbaru
        ->paginate(5);
        // dd($data);
        return view('history', compact('data', 'produk', 'riwayat'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer',
            'total_harga' => 'required|numeric',
            'status_pembayaran' => 'required|string',
            'status_pengiriman' => 'required|string',
            'alamat_pengiriman' => 'required|string',
            'nama_produk' => 'required|string',
            'qty' => 'required|numeric',
        ]);

        // Hapus isi keranjang sesuai dengan id pengguna

        // Simpan data transaksi ke dalam tabel transaksi
        $transaksi = Transaksi::create([
            'user_id' => $request->user_id,
            'total_harga' => $request->total_harga,
            'status_pembayaran' => $request->status_pembayaran,
            'status_pengiriman' => $request->status_pengiriman,
            'alamat_pengiriman' => $request->alamat_pengiriman,
            'nama_produk' => $request->nama_produk,
            'qty' => $request->qty,
        ]);

        $transaksi->save();
        // Tambahkan logika tambahan sesuai kebutuhan Anda, misalnya notifikasi atau proses lain
        // Redirect ke halaman atau rute yang sesuai setelah berhasil menyimpan data
        return redirect()
            ->route('history.user')
            ->with('success', 'Transaksi berhasil disimpan.');
    }
}
