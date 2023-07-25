<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Varian extends Model
{
    use HasFactory;
    protected $table = 'tb_varian';
    protected $fillable = ['nama_varian', 'harga_produk', 'gambar_produk', 'stock'];

    public function produk()
    {
        return $this->belongsToMany(Produk::class, 'id', 'varian_id');
    }
}
