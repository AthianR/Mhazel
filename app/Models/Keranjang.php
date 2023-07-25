<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    use HasFactory;
    protected $table = 'tb_keranjang';
    protected $fillable = ['total_harga', 'user_id'];

    public function user(){
        return $this->hasMany(User::class, 'user_id', 'id');
    }
}
