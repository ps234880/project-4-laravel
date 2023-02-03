<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        Order::create(['user_id' => 1, 'orderstatus_id' => 4]);

        Order::create(['user_id' => 2, 'orderstatus_id' => 2]);

        Order::create(['user_id' => 3, 'orderstatus_id' => 1]);
    }
}
