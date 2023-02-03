<?php

namespace Database\Seeders;

use App\Models\Orderstatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Orderstatus::create(['name' => "Initial"]);

        Orderstatus::create(['name' => "Processing"]);

        Orderstatus::create(['name' => "On the way"]);

        Orderstatus::create(['name' => "Deliverd"]);
    }
}
