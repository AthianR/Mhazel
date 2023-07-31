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
            'user_id' => '1',
            'product_id' => '1',
            'qty' => '1',
        ]);

        Keranjang::create([
            'user_id' => '1',
            'product_id' => '1',
            'qty' => '1',
        ]);

        Keranjang::create([
            'user_id' => '1',
            'product_id' => '1',
            'qty' => '1',
        ]);

        Keranjang::create([
            'user_id' => '1',
            'product_id' => '1',
            'qty' => '1',
        ]);

        Keranjang::create([
            'user_id' => '1',
            'product_id' => '1',
            'qty' => '1',
        ]);

        Keranjang::create([
            'user_id' => '1',
            'product_id' => '1',
            'qty' => '1',
        ]);
    }
}
