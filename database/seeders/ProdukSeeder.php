<?php

namespace Database\Seeders;

use App\Models\Produk;
use Illuminate\Database\Seeder;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            Produk::create([
                'nama_produk' => 'Produk ' . $i,
                'deskripsi' => 'Deskripsi produk ' . $i,
                'harga' => 10000 + ($i * 1000),
                'stok' => 10 + $i,
                'gambar_produk' => 'GantunganBrio.png',
                'kategori_id' => 1, // Sesuaikan dengan ID kategori yang ada
                'variasi_id' => 1, // Sesuaikan dengan ID variasi yang ada
            ]);
        }
        // Produk::create([
        //     'nama_produk' => 'GANTUNGAN KUNCI MOBIL GESPER ANYAM KEYCHAIN LOGO MEREK MOBIL',
        //     'deskripsi_produk' => 'sffsfs',
        //     'kategori_id' => 1,
        //     'varian_id' => 4,
        // ]);

        // Produk::create([
        //     'nama_produk' => 'GANTUNGAN KUNCI MOTOR LOGO HONDA YAMAHA KAWASAKI SUZUKI',
        //     'deskripsi_produk' => 'fsfsf',
        //     'kategori_id' => 1,
        //     'varian_id' => 3,
        // ]);

        // Produk::create([
        //     'nama_produk' => 'Gantungan kunci sarung remote cover silikon mobil honda mobilio brio hrv lama model anyam',
        //     'deskripsi_produk' => 'fsfsf',
        //     'kategori_id' => 1,
        //     'varian_id' => 2,
        // ]);

        // Produk::create([
        //     'nama_produk' => 'Gantungan kunci sarung keyless cover casing MOBIL DAIHATSU SIGRA XENIA AYLA TERIOS model anyam',
        //     'deskripsi_produk' => 'fsfsf',
        //     'kategori_id' => 1,
        //     'varian_id' => 1,
        // ]);

        // Produk::create([
        //     'nama_produk' => 'GANTUNGAN KUNCI MOBIL LOGO HONDA BRIO',
        //     'deskripsi_produk' => 'fsfsf',
        //     'kategori_id' => 1,
        //     'varian_id' => 1,
        // ]);

        // Produk::create([
        //     'nama_produk' => 'gantungan kunci case cover sarung remote keyless motor honda all new scoopy 2023 up',
        //     'deskripsi_produk' => 'fsfsf',
        //     'kategori_id' => 1,
        //     'varian_id' => 1,
        // ]);

        // Produk::create([
        //     'nama_produk' => 'Gantungan kunci remote mobil Honda HRV eksklusif',
        //     'deskripsi_produk' => 'fsfsf',
        //     'kategori_id' => 1,
        //     'varian_id' => 1,
        // ]);

        // Produk::create([
        //     'nama_produk' => 'gantungan kunci sarung cover casing remote keyless mobil honda freed model anyam',
        //     'deskripsi_produk' => 'fsfsf',
        //     'kategori_id' => 1,
        //     'varian_id' => 1,
        // ]);

        // Produk::create([
        //     'nama_produk' => 'Gantungan kunci sarung case casing cover remote keyless motor honda vario 160 logo premium AHM',
        //     'deskripsi_produk' => 'fsfsf',
        //     'kategori_id' => 1,
        //     'varian_id' => 1,
        // ]);

        // Produk::create([
        //     'nama_produk' => 'Gantungan kunci keyless cover casing MOBIL TOYOTA GRAND AVANZA AGYA CALYA model anyam',
        //     'deskripsi_produk' => 'fsfsf',
        //     'kategori_id' => 1,
        //     'varian_id' => 1,
        // ]);
        // Produk::create([
        //     'nama_produk' => 'GANTUNGAN KUNCI COVER SARUNG KULIT REMOTE KEYLESS MOBIL TERIOS TOYOTA RUSH ALL NEW VELOZ 2019 2 TOMBOL AGYA',
        //     'deskripsi_produk' => 'fsfsf',
        //     'kategori_id' => 1,
        //     'varian_id' => 1,
        // ]);
        // Produk::create([
        //     'nama_produk' => 'Sarung silikon remote motor Honda PCX 150 ADV 150 FORZA',
        //     'deskripsi_produk' => 'fsfsf',
        //     'kategori_id' => 1,
        //     'varian_id' => 1,
        // ]);
        // Produk::create([
        //     'nama_produk' => 'GANTUNGAN KUNCI SARUNG COVER REMOTE MOBIL TOYOTA ERIOS VALCO AVANZA VELOZ 2012 2015 MODEL ANYAM',
        //     'deskripsi_produk' => 'fsfsf',
        //     'kategori_id' => 1,
        //     'varian_id' => 1,
        // ]);
        // Produk::create([
        //     'nama_produk' => 'SILIKON COVER KUNCI REMOTE KEYLESS YAMAHA XMAX AEROX LEXI ALL NEW NMAX FAZZIO',
        //     'deskripsi_produk' => 'fsfsf',
        //     'kategori_id' => 1,
        //     'varian_id' => 3,
        // ]);
        // Produk::create([
        //     'nama_produk' => 'Gantungan kunci casing cover remote keyless motor honda all pcx 160 up',
        //     'deskripsi_produk' => 'fsfsf',
        //     'kategori_id' => 1,
        //     'varian_id' => 2,
        // ]);
    }
}
