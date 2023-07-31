<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kategori::create([
            'nama_kategori' => 'Keychain',
        ]);

        Kategori::create([
            'nama_kategori' => 'Cleaner',
        ]);

        Kategori::create([
            'nama_kategori' => 'Equipment',
        ]);

        Kategori::create([
            'nama_kategori' => 'Other Accessories',
        ]);
    }
}
