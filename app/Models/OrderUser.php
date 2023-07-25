<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderUser extends Model
{
    use HasFactory;
    protected $table = 'tb_order';
    protected $fillable = ['tanggal_pesanan','total', 'user_id'];

    public function user(){
        return $this->hasMany(Users::class, 'user_id', 'id');
    }
}
