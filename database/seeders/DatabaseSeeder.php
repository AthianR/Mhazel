<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        
        $this->call(UserSeeder::class);
        $this->call(KategoriSeeder::class);
        $this->call(VarianSeeder::class);
        $this->call(ProdukSeeder::class);
        $this->call(ProfileSeeder::class);
        $this->call(KeranjangSeeder::class);
        $this->call(OrderSeeder::class);
        $this->call(PembayaranSeeder::class);
        
        
        
    }
}
