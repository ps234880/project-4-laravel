<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ingredient::create([
            'name' => "Cheese",
            'price' => 1.00,
            'unit_id' => 1
        ]);
        Ingredient::create([
            'name' => "Basil",
            'price' => 0.20,
            'unit_id' => 1
        ]);
        Ingredient::create([
            'name' => "Tomato sauce",
            'price' => 1.50,
            'unit_id' => 1
        ]);
        Ingredient::create([
            'name' => "Ham",
            'price' => 1.00,
            'unit_id' => 2
        ]);
        Ingredient::create([
            'name' => "Egg",
            'price' => 0.50,
            'unit_id' => 3
        ]);
        Ingredient::create([
            'name' => "Pizza dough",
            'price' => 2.00,
            'unit_id' => 1
        ]);
        Ingredient::create([
            'name' => "Mushrooms",
            'price' => 0.50,
            'unit_id' => 2
        ]);
        Ingredient::create([
            'name' => "Chicken",
            'price' => 1.00,
            'unit_id' => 1
        ]);
        Ingredient::create([
            'name' => "Pineapple",
            'price' => 0.50,
            'unit_id' => 1
        ]);
    }
}
