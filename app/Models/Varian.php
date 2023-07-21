<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Varian extends Model
{
    use HasFactory;
    protected $table = 'tb_varian';
    protected $fillable = ['nama_varian', 'harga_produk', 'stock'];

    public function kategori()
    {
        return $this->hasMany(Produk::class, 'varian_id', 'id');
    }
}
