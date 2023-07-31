<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = ['Admin', 'Customer']; // Sesuaikan dengan role yang ada pada aplikasi Anda

        foreach ($roles as $role) {
            Role::create([
                'nama_role' => $role,
            ]);
        }
    }
}
