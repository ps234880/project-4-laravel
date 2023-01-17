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
            'naam' => "Hawaii",
        ]);

        DB::table('pizzas')->insert([
            'naam' => "Margherita",
        ]);

        DB::table('pizzas')->insert([
            'naam' => "Quattro formaggi",
        ]);

        DB::table('pizzas')->insert([
            'naam' => "Pepperoni",
        ]);

        DB::table('pizzas')->insert([
            'naam' => "Kiwinini",
        ]);
    }
}
