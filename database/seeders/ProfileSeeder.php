<?php

namespace Database\Seeders;

use App\Models\ProfileUser;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tanggal_lahir = '22-12-2000';
        $tanggal_lahir_formatted = Carbon::createFromFormat('d-m-Y', $tanggal_lahir)->format('Y-m-d');
        ProfileUser::create([
            'foto_profile' => 'hsagdhas.png',
            'alamat' => 'Jl. Tubagus Ismail',
            'tanggal_lahir' => $tanggal_lahir_formatted,
            'id_user' => '2',
        ]);
        ProfileUser::create([
            'foto_profile' => 'hsagdhas.png',
            'alamat' => 'Jl. Tubagus Ismail',
            'tanggal_lahir' => $tanggal_lahir_formatted,
            'id_user' => '3',
        ]);
    }
}
