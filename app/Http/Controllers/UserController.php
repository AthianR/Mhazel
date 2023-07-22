<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function deleteUsers(Request $request)
{
    $selectedUsers = $request->input('selectedUsers', []);
    User::whereIn('id', $selectedUsers)->delete();

    // Redirect atau tampilkan pesan sukses sesuai kebutuhan
    return redirect()->back()->with('success', 'Users berhasil dihapus.');
}
}
