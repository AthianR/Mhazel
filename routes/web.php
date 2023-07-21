<?php

use App\Events\Massagecreate;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard.admin');
    // Route::post('/admin', [AdminController::class, 'login'])->name('admin.login.submit');
    Route::get('/user', [AdminController::class, 'user'])->name('admin.showuser');
    Route::post('/delete-users', [UserController::class, 'deleteSelectedUsers'])->name('delete.users');
    Route::get('/produk', [ProductController::class, 'all'])->name('produk.admin');
    Route::get('/add-produk', [ProductController::class, 'form'])->name('add.produk');
});

Route::middleware('custom')->group(function () {
    Route::get('/dashboard', [ProductController::class, 'index'])->name('dashboard.user');
    Route::get('/cart', [KeranjangController::class, 'index'])->name('cart');
    Route::post('/addToCart/{id}', [KeranjangController::class, 'addToCart'])->name('addToCart');
    Route::get('/keychain', [ProductController::class, 'keychain'])->name('keychain');
});

Route::get('/', [ProductController::class, 'index'])->name('dashboard');
Route::get('/register', [RegisterController::class, 'index'])->name('registeruser');
Route::post('/register', [RegisterController::class, 'store'])->name('register');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/loginuser', [LoginController::class, 'login'])->name('loginuser');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

