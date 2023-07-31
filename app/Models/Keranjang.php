<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    use HasFactory;
    protected $table = 'tb_keranjang';
    protected $fillable = ['user_id', 'produk_id', 'qty']; // Ganti 'product_id' menjadi 'produk_id'

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id'); // Ganti 'product_id' menjadi 'produk_id'
    }
}
