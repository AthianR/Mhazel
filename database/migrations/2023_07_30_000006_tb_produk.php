<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TbProduk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_produk', function (Blueprint $table) {
            $table->id();
            $table->string('nama_produk');
            $table->text('deskripsi');
            $table->decimal('harga', 10, 2);
            $table->string('gambar_produk');
            $table->integer('stok');
            $table->unsignedBigInteger('kategori_id');
            $table->unsignedBigInteger('variasi_id')->nullable();
            $table->timestamps();

            $table->foreign('kategori_id')->references('id')->on('tb_kategori')->onDelete('cascade');
            $table->foreign('variasi_id')->references('id')->on('tb_varian')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_produk');
    }
}
