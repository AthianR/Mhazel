<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TbTransaksi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_transaksi', function (Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->decimal('total_harga', 10, 2);
            $table->string('status_pembayaran');
            $table->string('status_pengiriman');
            $table->integer('qty');
            $table->string('nama_produk');
            $table->text('alamat_pengiriman');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_transaksi');
    }
}
