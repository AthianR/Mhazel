<?php

namespace Database\Seeders;

use App\Models\Varian;
use Illuminate\Database\Seeder;

class VarianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Varian::create([
            'nama_varian' => 'Hitam + Merah',
            'harga_produk' => '54352',
            'gambar_produk' => 'GantunganPcx.png',
            'stock' => '234',
        ]);
        Varian::create([
            'nama_varian' => 'Putih',
            'harga_produk' => '39732',
            'gambar_produk' => 'GantunganPcx.png',
            'stock' => '345',
        ]);
        Varian::create([
            'nama_varian' => 'Hitam',
            'harga_produk' => '31345',
            'gambar_produk' => 'GantunganPcx.png',
            'stock' => '987',
        ]);
        Varian::create([
            'nama_varian' => 'Silikon',
            'harga_produk' => '33465',
            'gambar_produk' => 'GantunganPcx.png',
            'stock' => '654',
        ]);
        Varian::create([
            'nama_varian' => 'Putih + Biru',
            'harga_produk' => '38346',
            'gambar_produk' => 'GantunganPcx.png',
            'stock' => '132',
        ]);
        Varian::create([
            'nama_varian' => 'Merah + Putih',
            'harga_produk' => '36857',
            'gambar_produk' => 'GantunganPcx.png',
            'stock' => '213',
        ]);
    }
}
