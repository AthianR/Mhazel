<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TbProfileUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_profile_pelanggan', function(Blueprint $table){
            $table->id();
            $table->string('foto_profile');
            $table->string('alamat');
            $table->date('tanggal_lahir');
            $table->foreignId('id_user')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_profile_pelanggan');
    }
}
