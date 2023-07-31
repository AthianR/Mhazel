<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Varian extends Model
{
    use HasFactory;
    protected $table = 'tb_varian';
    protected $fillable = ['nama_variasi'];

    public function produks()
    {
        return $this->hasMany(Produk::class, 'variasi_id');
    }
}
