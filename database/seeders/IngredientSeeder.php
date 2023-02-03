<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ingredients')->insert([
            'name' => "Cheese",
            'price' => 1.00,
            'unit_id' => 1,
        ]);
        DB::table('ingredients')->insert([
            'name' => "Basil",
            'price' => 0.20,
            'unit_id' => 1,
        ]);
        DB::table('ingredients')->insert([
            'name' => "Tomato sauce",
            'price' => 1.50,
            'unit_id' => 1,
        ]);
        DB::table('ingredients')->insert([
            'name' => "Ham",
            'price' => 1.00,
            'unit_id' => 2,
        ]);
        DB::table('ingredients')->insert([
            'name' => "Egg",
            'price' => 0.50,
            'unit_id' => 3,
        ]);
        DB::table('ingredients')->insert([
            'name' => "Pizza dough",
            'price' => 2.00,
            'unit_id' => 1,
        ]);
        DB::table('ingredients')->insert([
            'name' => "Mushrooms",
            'price' => 0.50,
            'unit_id' => 2,
        ]);
        DB::table('ingredients')->insert([
            'name' => "Chicken",
            'price' => 1.00,
            'unit_id' => 1,
        ]);
        DB::table('ingredients')->insert([
            'name' => "Pineapple",
            'price' => 0.50,
            'unit_id' => 1,
        ]);
    }
}
