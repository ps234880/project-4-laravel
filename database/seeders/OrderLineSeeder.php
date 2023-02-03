<?php

namespace Database\Seeders;

use App\Models\OrderLine;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderLineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OrderLine::create(['order_id' => 1, 'pizza_id' => 1, 'size_id' => 2, 'amount' => 5]);
        OrderLine::create(['order_id' => 1, 'pizza_id' => 2, 'size_id' => 1, 'amount' => 1]);
        OrderLine::create(['order_id' => 1, 'pizza_id' => 3, 'size_id' => 3, 'amount' => 2]);


        OrderLine::create(['order_id' => 2, 'pizza_id' => 3, 'size_id' => 3, 'amount' => 2]);

    }
}
