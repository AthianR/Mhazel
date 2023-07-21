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
            'nama_produk' => 'GANTUNGAN KUNCI MOBIL GESPER ANYAM KEYCHAIN LOGO MEREK MOBIL',
            'qty' => '2',
            'harga_produk' => '342342',
            'user_id' => 1,
        ]);

        Keranjang::create([
            'nama_produk' => 'GANTUNGAN KUNCI MOTOR LOGO HONDA YAMAHA KAWASAKI SUZUKI',
            'qty' => '2',
            'harga_produk' => '1321321',
            'user_id' => 1,
        ]);
    }
}
