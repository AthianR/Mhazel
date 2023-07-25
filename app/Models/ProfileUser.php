<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileUser extends Model
{
    use HasFactory;
    protected $table = 'tb_profile_pelanggan';
    protected $fillable = ['foto_profile','alamat', 'tanggal_lahir', 'id_user'];

    public function user(){
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
