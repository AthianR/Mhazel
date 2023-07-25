<?php

namespace Database\Seeders;

use App\Models\PembayaranPelanggan;
use Illuminate\Database\Seeder;

class PembayaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PembayaranPelanggan::create([
            'jumlah_pembayaran' => '256119',
            'metode_pembayaran' => 'Tranfer',
            'id_order' => '3',
        ]);
        PembayaranPelanggan::create([
            'jumlah_pembayaran' => '256119',
            'metode_pembayaran' => 'Tranfer',
            'id_order' => '2',
        ]);
        PembayaranPelanggan::create([
            'jumlah_pembayaran' => '256119',
            'metode_pembayaran' => 'Tranfer',
            'id_order' => '3',
        ]);
        PembayaranPelanggan::create([
            'jumlah_pembayaran' => '256119',
            'metode_pembayaran' => 'Tranfer',
            'id_order' => '2',
        ]);
    }
}
