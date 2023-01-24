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
                {{-- Edit form --}}
                <form method="POST" action="{{ route('pizzas.update', $pizza->id) }}">
                    @method('PATCH')
                    @csrf

                    {{-- Pizza name --}}
                    <div class="mb-6">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Pizza name</label>
                        <input type="text"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            name="name" value="{{ $pizza->name }}">
                        @error('name')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Back and update --}}
                    <div class="flex items-center justify-start space-x-4">
                        <a href="/pizzas" class="text-gray-900 font-medium text-sm">Back</a>
                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </body>
