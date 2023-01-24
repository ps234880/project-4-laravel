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
            'price' => 0.20,
        ]);
        DB::table('ingredients')->insert([
            'name' => "Basil",
            'price' => 0.25,
        ]);
        DB::table('ingredients')->insert([
            'name' => "Tomato sauce ",
            'price' => 0.80,
        ]);
        DB::table('ingredients')->insert([
            'name' => "Ham",
            'price' => 1.00,
        ]);
        DB::table('ingredients')->insert([
            'name' => "Egg",
            'price' => 0.60,
        ]);
    }
}
