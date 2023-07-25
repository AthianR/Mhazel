<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembayaranPelanggan extends Model
{
    use HasFactory;
    protected $table = 'tb_pembayaran';
    protected $fillable = ['jumlah_pembayaran','metode_pembayaran', 'id_order'];

    public function order(){
        return $this->hasMany(OrderUser::class, 'id_order', 'id');
    }
}
