<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IngredientPizzaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ingredient_pizza')->insert([
            'ingredient_id' => 3,
            'pizza_id' => 1,
        ]);
        DB::table('ingredient_pizza')->insert([
            'ingredient_id' => 6,
            'pizza_id' => 1,
        ]);
        DB::table('ingredient_pizza')->insert([
            'ingredient_id' => 3,
            'pizza_id' => 2,
        ]);
        DB::table('ingredient_pizza')->insert([
            'ingredient_id' => 6,
            'pizza_id' => 2,
        ]);
        DB::table('ingredient_pizza')->insert([
            'ingredient_id' => 3,
            'pizza_id' => 3,
        ]);
        DB::table('ingredient_pizza')->insert([
            'ingredient_id' => 6,
            'pizza_id' => 3,
        ]);

        DB::table('ingredient_pizza')->insert([
            'ingredient_id' => 3,
            'pizza_id' => 4,
        ]);
        DB::table('ingredient_pizza')->insert([
            'ingredient_id' => 6,
            'pizza_id' => 4,
        ]);
        DB::table('ingredient_pizza')->insert([
            'ingredient_id' => 3,
            'pizza_id' => 5,
        ]);
        DB::table('ingredient_pizza')->insert([
            'ingredient_id' => 6,
            'pizza_id' => 5,
        ]);
    }
}
