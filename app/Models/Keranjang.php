<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    use HasFactory;
    protected $table = 'tb_keranjang';
    protected $fillable = ['nama_produk', 'qty', 'harga_produk'];
}
