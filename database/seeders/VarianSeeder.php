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
        for ($i = 1; $i <= 5; $i++) {
            Varian::create([
                'nama_variasi' => 'Variasi ' . $i,
            ]);
        }
    }
}
