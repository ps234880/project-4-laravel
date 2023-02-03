<?php

namespace Tests\Unit;

use App\Http\Controllers\IngredientController;
use App\Http\Controllers\PizzaController;
use App\Http\Controllers\UnitController;
use App\Models\Ingredient;
use App\Models\Pizza;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Tests\TestCase; // make sure to add this

class CrudTest extends TestCase
{
    public function test_store_method_pizza()
    {
        $request = new Request(['name' => 'kiwi']);
        Pizza::create($request->only(['name']));
        $this->assertDatabaseHas('pizzas', ['name' => 'kiwi']);
    }

    public function test_store_method_ingredient()
    {
        $request = new Request(['name' => 'egg', 'price' => 0.5, 'unit_id' => 1]);
        Ingredient::create($request->only(['name', 'price', 'unit_id']));
        $this->assertDatabaseHas('ingredients', ['name' => 'egg', 'price' => 0.5]);
    }
}
