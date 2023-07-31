<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nama_lengkap' => 'Athian Rizki',
            'email' => 'Kathiany75@gmail.com',
            'password' => Hash::make('12345678'),
            'role_id' => 2,
        ]);
        User::create([
            'nama_lengkap' => 'Admin Mhazel',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
            'role_id' => 1,
        ]);

        $faker = Faker::create();
        for ($i = 0; $i < 10; $i++) {
            User::create([
                'nama_lengkap' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('12345678'),
                'role_id' => 2,
            ]);
        }
    }
}
