<?php

namespace App\Models;

use App\Models\Varian;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produk extends Model
{
    protected $table = 'tb_produk';
    protected $fillable = ['nama_produk', 'gambar_produk', 'deskripsi_produk', 'kategori_id'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id', 'id');
    }

    public function varian()
    {
        return $this->hasMany(Varian::class, 'produk_id', 'id');
    }
}
