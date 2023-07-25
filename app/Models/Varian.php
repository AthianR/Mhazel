<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Varian extends Model
{
    use HasFactory;
    protected $table = 'tb_varian';
    protected $fillable = ['nama_varian', 'harga_produk', 'gambar_produk', 'stock', 'id_produk'];

    public function kategori()
    {
        return $this->hasMany(Produk::class, 'id_produk', 'id');
    }
}
