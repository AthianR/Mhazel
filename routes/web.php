<?php

use App\Events\Massagecreate;
use App\Http\Livewire\SearchBar;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\LoginAdminController;

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

// Route::middleware('admin')->group(function () {
    Route::get('/dashboard/admin', [AdminController::class, 'index'])->name('dashboard.admin');
    Route::get('/user', [AdminController::class, 'user'])->name('admin.showuser');
    Route::get('/produk', [ProductController::class, 'all'])->name('produk.admin');
    Route::get('/add-produk', [ProductController::class, 'form'])->name('add.produk');
    Route::get('/add-produk', [ProductController::class, 'ambilkategori'])->name('add.produk');
    Route::post('/add', [ProductController::class, 'storedata'])->name('add.data');
    Route::get('/formkategori', [ProductController::class, 'formKategori'])->name('add.kategori');
    Route::get('/formvariasi', [ProductController::class, 'formVariasi'])->name('add.variasi');
    Route::post('/addkategori', [ProductController::class, 'tambahKategori'])->name('add.dataKategori');
    Route::post('/addvariasi', [ProductController::class, 'tambahVariasi'])->name('add.dataVariasi');
    Route::delete('/delete-users', [UserController::class, 'deleteUsers'])->name('delete.users');
    Route::post('/delete/kategori/{id}', [ProductController::class, 'destroyKategori'])->name('hapus.kategori');

    Route::get('/search', [SearchBar::class, 'render'])->name('search');
// });

// Route::middleware('customer')->group(function () {
    Route::get('/dashboard', [ProductController::class, 'index'])->name('dashboard.user')->middleware('auth');
    Route::get('/cart', [KeranjangController::class, 'index'])->name('cart');
    Route::post('/add-to-cart', [KeranjangController::class, 'addToCart'])->name('add.to.cart');
    Route::delete('/delete/cart/{id}', [KeranjangController::class, 'deleteCart'])->name('delete.cart');
    Route::get('/keychain', [ProductController::class, 'keychain'])->name('keychain');
    Route::get('/history', [HistoryController::class, 'index'])->name('history.user');
    Route::post('/cartadd', [KeranjangController::class, 'store'])->name('add.qty');
    Route::post('/cartmin', [KeranjangController::class, 'destroy'])->name('min.qty');
    Route::post('/addtransaksi', [HistoryController::class, 'store'])->name('add.transaksi');
    Route::get('/checkout', [KeranjangController::class, 'checkout'])->name('checkout');
    Route::get('/profile/user', [UserController::class, 'profile'])->name('profile.user');
    Route::post('/update/profile', [UserController::class, 'update'])->name('update.user');
    Route::get('/rekomendasi', [UserController::class, 'rekomendasi'])->name('rekomendasi.user');
    Route::put('/pembayaran/{id}', [UserController::class, 'pembayaran'])->name('pembayaran.user');
    Route::get('/detail/profile/user', [UserController::class, 'detailProfile'])->name('detail.profile.user');
// });

Route::get('/', [ProductController::class, 'index'])->name('dashboard');
Route::get('/register', [RegisterController::class, 'index'])->name('registeruser');
Route::post('/register', [RegisterController::class, 'store'])->name('register');


Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/loginuser', [LoginController::class, 'login'])->name('loginuser');

Route::get('/loginadmin', [LoginAdminController::class, 'index'])->name('loginadmin');
Route::post('/login/admin', [LoginAdminController::class, 'loginadmin'])->name('adminlogin');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


