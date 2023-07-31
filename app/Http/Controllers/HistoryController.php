<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    public function index()
    {
        $userId = Auth::user()->id;
        $data = Transaksi::select(
            'tb_transaksi.id as id', 
            'tb_transaksi.total_harga as total_harga')
            ->join('users', 'tb_transaksi.user_id', '=', 'users.id')
            ->where('users.id', $userId)
            ->get();
        // dd($data);
        return view('history', compact('data'));
    }

    public function store(Request $request){
        $request->validate([
            'user_id' => 'required|integer',
            'total_harga' => 'required|numeric',
            'status_pembayaran' => 'required|string',
            'status_pengiriman' => 'required|string',
            'alamat_pengiriman' => 'required|string',
        ]);

        // Simpan data transaksi ke dalam tabel transaksi
        $transaksi = Transaksi::create([
            'user_id' => $request->user_id,
            'total_harga' => $request->total_harga,
            'status_pembayaran' => $request->status_pembayaran,
            'status_pengiriman' => $request->status_pengiriman,
            'alamat_pengiriman' => $request->alamat_pengiriman,
        ]);

        $transaksi->save();

        // Tambahkan logika tambahan sesuai kebutuhan Anda, misalnya notifikasi atau proses lain

        // Redirect ke halaman atau rute yang sesuai setelah berhasil menyimpan data
        return redirect()->route('history.user')->with('success', 'Transaksi berhasil disimpan.');
    }
}
