@extends('pizzas.layout')

@section('content')
    <!-- NAVIGATION -->
    <header>
        <a class="active-link" href="#">Stonks-pizza</a>
        <a href="javascript:order();"><img id="cart" src="img/shopping-cart-icon.png"></a>
    </header>

    <!-- MESSAGE IF DATABASE CONNECTION SUCCESSFULL -->
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <body>
        <div class="max-w-4xl mx-auto mt-5">
            <div class="px-4 sm:px-6 lg:px-8">
                {{-- Create form --}}
                <form action="{{ route('ingredients.store') }}" method="POST">
                    @csrf

                    {{-- Ingredient name --}}
                    <div class="mb-6">
                        <label for="name" class="block mb-2 text-sm font-medium text-slate-600">Ingredient
                            name</label>
                        <input type="text"
                            class="text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-gray-500 focus:border-gray-500"
                            placeholder="Pineapple" name="name">
                        @error('name')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Price --}}
                    <div class="mb-6">
                        <label for="name" class="block mb-2 text-sm font-medium text-slate-600">Price</label>
                        <input type="text"
                            class="text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-gray-500 focus:border-gray-500"
                            placeholder="0.50" name="price">
                        @error('price')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Back and create --}}
                    <div class="flex items-center justify-start space-x-4">
                        <a href="/ingredients" class="text-slate-600 text-sm">Back</a>
                        <button type="submit"
                            class="text-white rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center bg-gray-700 border-gray-600 hover:bg-gray-900">
                            Create
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </body>

    </html>
