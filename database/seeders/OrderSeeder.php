<?php

namespace Database\Seeders;

use App\Models\OrderUser;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        OrderUser::create([
            'tanggal_pesanan' => Carbon::now(),
            'total' => '207872',
            'user_id' => '2',
        ]);
        OrderUser::create([
            'tanggal_pesanan' => Carbon::now(),
            'total' => '207872',
            'user_id' => '2',
        ]);
        OrderUser::create([
            'tanggal_pesanan' => Carbon::now(),
            'total' => '207872',
            'user_id' => '3',
        ]);
        OrderUser::create([
            'tanggal_pesanan' => Carbon::now(),
            'total' => '207872',
            'user_id' => '3',
        ]);
    }
}
