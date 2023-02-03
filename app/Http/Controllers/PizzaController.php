<?php

namespace App\Http\Controllers;

use App\Models\Pizza;
use App\Models\Ingredient;
use App\Models\Size;
use Illuminate\Http\Request;

class PizzaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('role:admin|employee');
    }

    public function index()
    {
        $pizzas = Pizza::orderBy('name')->paginate(10);
        $ingredients = Ingredient::all();

        return view('pizzas.index', compact('pizzas', 'ingredients'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pizzas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:20',
        ]);
        Pizza::create($request->only(['name']));
        return redirect('pizzas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pizza = Pizza::find($id);
        $ingredients = Ingredient::all();
        $sizes = Size::all();

        $sum = 0;
        foreach ($pizza->ingredients as $ingredient) {
            $sum += $ingredient->price;
        }

        // Testing
        $totalSum = 0;
        foreach ($pizza->ingredients as $ingredient) {
            $totalSum += $ingredient->price;
        }

        return view('pizzas.show', compact('pizza', 'ingredients', 'sizes', 'sum', 'totalSum'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pizza = Pizza::find($id);
        $ingredients = Ingredient::all();
        return view('pizzas.edit', compact('pizza', 'ingredients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:20',
        ]);
        Pizza::find($id)->update($request->only(['name']));
        return redirect('pizzas')->with('success', 'Pizza updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pizza::destroy($id);
        return redirect('pizzas')->with('success', 'Pizza deleted.');
    }
}
