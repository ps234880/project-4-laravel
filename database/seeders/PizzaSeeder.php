<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PizzaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pizzas')->insert([
            'name' => "Hawaii",
        ]);

        DB::table('pizzas')->insert([
            'name' => "Margherita",
        ]);

        DB::table('pizzas')->insert([
            'name' => "Quattro formaggi",
        ]);

        DB::table('pizzas')->insert([
            'name' => "Pepperoni",
        ]);

        DB::table('pizzas')->insert([
            'name' => "Kiwinini",
        ]);
    }
}
