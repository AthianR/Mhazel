<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        // $today = Carbon::today();
        // $todayFormatted = $today->format('yyyy-mm-dd');
        $dataPenjualanHariIni = Transaksi::select('id', 'total_harga', 'created_at', 'status_pembayaran', 'status_pengiriman')
        ->where('status_pembayaran', 'Dibayar')
        // ->whereDate('created_at', $today) // Mengambil data transaksi hanya pada hari ini
        ->orderBy('created_at', 'desc')
        ->get();
    
        $data = $dataPenjualanHariIni->sum('total_harga');
        // dd($data);
        return view('admin.dashboard-admin', compact('data'));
    }

    public function user(Request $id)
    {
        $user = 'customer';
        $data = User::where('role', $user)
            ->paginate(5)
            ->onEachSide(4);
        // dd($data);
        return view('admin.user-admin', compact('data'));
    }

    public function deleteSelectedUsers(Request $request)
    {
        // Ambil data dari checkbox yang dipilih
        $selectedUsers = $request->input('selectedUsers');

        // Hapus data yang dipilih dari database
        User::whereIn('id', $selectedUsers)->delete();

        // Redirect kembali ke halaman sebelumnya dengan pesan berhasil
        return back()->with('success', 'Data berhasil dihapus.');
    }
}
