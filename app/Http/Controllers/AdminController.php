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
        $user = 2;
        $data = User::select(
            'users.id as user_id', 
            'tb_role.nama_role as nama_role',
            'users.email as email',
            // 'tb_profile.status as status_user',
            'users.nama_lengkap as nama_lengkap')
            ->join('tb_role', 'users.role_id', '=', 'tb_role.id')
            // ->join('tb_profile', 'users.id' ,'=', 'tb_profile.user_id')
            ->where('users.role_id', $user)
            ->paginate(10);
        
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
