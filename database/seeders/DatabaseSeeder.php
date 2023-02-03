<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Ingredient;
use App\Models\Orderstatus;
use App\Models\Size;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UnitSeeder::class,
            IngredientSeeder::class,
            PizzaSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            IngredientPizzaSeeder::class,
            SizeSeeder::class,
            OrderStatusSeeder::class,
            OrderSeeder::class,
            OrderLineSeeder::class
        ]);
    }
}
