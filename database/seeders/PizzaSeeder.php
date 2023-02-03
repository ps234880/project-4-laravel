<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pizza;

class PizzaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pizza::create([
            'name' => "Hawaii",
        ]);

        Pizza::create([
            'name' => "Margherita",
        ]);

        Pizza::create([
            'name' => "Quattro formaggi",
        ]);

        Pizza::create([
            'name' => "Pepperoni",
        ]);

        Pizza::create([
            'name' => "Kiwinini",
        ]);
    }
}
