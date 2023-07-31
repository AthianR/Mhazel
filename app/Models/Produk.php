<?php

namespace App\Models;

use App\Models\Varian;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produk extends Model
{
    protected $table = 'tb_produk';
    protected $fillable = ['nama_produk', 'deskripsi', 'harga', 'stok', 'kategori_id', 'variasi_id'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function variasi()
    {
        return $this->belongsTo(Variasi::class, 'variasi_id');
    }

    public function keranjangs()
    {
        return $this->hasMany(Keranjang::class, 'produk_id'); // Ganti 'product_id' menjadi 'produk_id'
    }
}
