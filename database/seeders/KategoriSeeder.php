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
            'kategori' => 'Keychain',
        ]);

        Kategori::create([
            'kategori' => 'Cleaner',
        ]);

        Kategori::create([
            'kategori' => 'Equipment',
        ]);

        Kategori::create([
            'kategori' => 'Other Accessories',
        ]);
    }
}
