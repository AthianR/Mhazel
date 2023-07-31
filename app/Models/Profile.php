<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $table = 'tb_profile';
    protected $fillable = ['gambar_user', 'alamat_user','user_id','phone','status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
