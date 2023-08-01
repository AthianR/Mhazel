<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard-admin');
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

    public function __construct()
    {
        $this->middleware('admin')->only(['index', 'user', 'deleteSelectedUsers']);
    }
}
