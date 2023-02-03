<?php

namespace Tests\Unit;

use App\Http\Controllers\IngredientController;
use App\Http\Controllers\PizzaController;
use App\Http\Controllers\UnitController;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Tests\TestCase; // make sure to add this

class CrudTest extends TestCase
{
    use RefreshDatabase;
    public function test_store_method_ingredient()
    {
        // maak een unit aan
        $unitController = new PizzaController();
        $unitController->store(new Request(['id' => 30], ['name' => 'kiwi']));

        $this->assertDatabaseHas('pizzas', ['id' => 30], ['name' => 'kiwi']);
    }

   

}
