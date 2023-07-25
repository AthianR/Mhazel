<?php

namespace Database\Seeders;

use App\Models\Keranjang;
use Illuminate\Database\Seeder;

class KeranjangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Keranjang::create([
            'total_harga' => '235567',
            'user_id' => '2',
        ]);

        Keranjang::create([
            'total_harga' => '235567',
            'user_id' => '3',
        ]);

        Keranjang::create([
            'total_harga' => '235567',
            'user_id' => '2',
        ]);

        Keranjang::create([
            'total_harga' => '235567',
            'user_id' => '3',
        ]);

        Keranjang::create([
            'total_harga' => '235567',
            'user_id' => '3',
        ]);

        Keranjang::create([
            'total_harga' => '235567',
            'user_id' => '3',
        ]);
    }
}
