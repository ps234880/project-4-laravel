<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-600 leading-tight">
            {{ __('Pizzas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- Pizzas --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach ($pizzas as $pizza)
                    @php
                        $sum = 0;
                        foreach ($pizza->ingredients as $ingredient) {
                            $sum += $ingredient->price;
                        }
                        $sum = number_format((float) $sum, 2);
                    @endphp
                    <table class="ring-1 ring-black ring-opacity-20 rounded-lg">
                        <thead class="bg-slate-600">
                            <tr class="max-w-2xl">
                                <td class="px-4 py-5 text-left text-sm uppercase text-slate-50 rounded-t-lg">
                                    pizza {{ $pizza->name }} - € {{ $sum }}
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Pizza ingredients --}}
                            <tr>
                                <td class="px-4 py-5 text-sm text-slate-600 text-left">
                                    @foreach ($pizza->ingredients as $ingredient)
                                        {{ $ingredient->name }}
                                    @endforeach
                                </td>
                            </tr>
                            {{-- Add & customize --}}
                            <tr>
                                <td class="px-4 py-2 text-sm text-slate-600 text-left flex gap-2">
                                    <a href="{{ route('pizzas.show', $pizza->id) }}"
                                        class="px-4 py-2 w-full text-center bg-gray-300 rounded-lg font-semibold text-xs text-gray-800 uppercase tracking-widest hover:bg-white focus:bg-white active:bg-gray-300 transition ease-in-out duration-150">Customize
                                        Pizza</a>
                                    <a href="{{ route('pizzas.show', $pizza->id) }}"
                                        class="px-4 py-2 w-full text-center bg-gray-300 rounded-lg font-semibold text-xs text-gray-800 uppercase tracking-widest hover:bg-white focus:bg-white active:bg-gray-300 transition ease-in-out duration-150">Add
                                        to cart</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                @endforeach
            </div>

            {{-- Pizza crud --}}
            <table class="ring-1 ring-black ring-opacity-20 rounded-lg mt-4">
                <thead class="bg-slate-600 ">
                    <tr>
                        <th scope="col" class="px-4 py-5 text-left text-sm uppercase text-slate-50 rounded-tl-lg">
                            Name
                        </th>
                        <th scope="col" class="px-4 py-5 rounded-tr-lg">
                            <a href="{{ route('pizzas.create') }}"
                                class="text-slate-50 hover:text-slate-300 text-sm uppercase">
                                Add Pizza
                            </a>
                        </th>
                    </tr>
                </thead>
                {{-- Pizzas --}}
                <tbody>
                    @foreach ($pizzas as $pizza)
                        <tr>
                            {{-- Name --}}
                            <td class="py-4 px-4 text-sm text-slate-600">
                                <a href="{{ route('pizzas.show', $pizza->id) }}">{{ $pizza->name }}</a>
                            </td>
                            {{-- Edit and delete --}}
                            <td class="py-4 px-4 text-sm font-medium flex justify-between">
                                <a href="{{ route('pizzas.edit', $pizza->id) }}"
                                    class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                <form action="{{ route('pizzas.destroy', $pizza->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-600 hover:text-red-900">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <x-slot name="footer">
        <h2 class="font-semibold text-l text-gray-600  leading-tight">
            {{ __('Stonks Pizza') }}
        </h2>
    </x-slot>
</x-app-layout>

{{-- @extends('pizzas.layout')

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
    
    <!-- REPSONSIVE CRUD -->
    @foreach ($pizzas as $pizza)
        <button class="collapsible">{{ $pizza->name }}</button>
        <div class="content">
            <p>Ingredients:
                @foreach ($pizza->ingredients as $ingredient)
                    {{ $ingredient->name }},
                @endforeach
            </p>
            <p>Price: €10,00</p>
            <br>
            <b>Size</b>
            <br>
            <br>
            <select id="size">
                <option>Small</option>
                <option selected="selected">Medium</option>
                <option>Large</option>
            </select>
            <br>
            <br>
            <b>Amount</b>
            <br>
            <br>
            <select id="amount">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                <option>6</option>
                <option>7</option>
                <option>8</option>
                <option>9</option>
                <option>10</option>
            </select>
            <br>
            <br>
            <b>Ingredients</b>
            <br>
            <br>
            <select>
                @foreach ($ingredients as $ingredient)
                    <option>
                        {{ $ingredient->name }}
                    </option>
                @endforeach
            </select>
            <br>
            <br>
            <button id="create"><a href="">Add Ingredient</a></button>
            <button id="delete"><a href="">Remove Ingrediënt</a></button>
            <p>Total Price: €10,00</p>
            <button id="create"><a href="">Add To Cart</a></button>
        </div>
    @endforeach

    <div id="paginate">{!! $pizzas->links() !!}</div>

    <!-- SHOPPING CART -->
    <div id="order">
        <h2>Order</h2>
        <p>Total Price:</p>
        <a href="orders"><button id="create">Complete</a></button>
    </div>


    <!-- Gap from top and max width -->
    <div class="max-w-7xl mx-auto">

        <!-- Left right gap -->
        <div class="px-4 sm:px-6 lg:px-8">

            <!-- Table names -->
            <table class="mt-8 ring-1 ring-black ring-opacity-20">
                <thead class="bg-slate-600">
                    <tr>
                        <th scope="col" class="px-4 py-5 text-center text-sm font-medium uppercase text-slate-50">
                            Name
                        </th>
                        <th scope="col" class="px-4 py-5 text-center text-sm font-medium uppercase text-slate-50">

                        </th>
                        <th scope="col" class="px-4 py-5">
                            <a href="/pizzas/create"
                                class="text-slate-50 hover:text-slate-300 text-sm font-medium uppercase">
                                Add pizza
                            </a>
                </thead>

                <!-- Ingredients -->
                <tbody class="divide-y bg-white">
                    @foreach ($pizzas as $pizza)
                        <tr>
                            <td class="py-4 px-4 text-sm text-slate-600">
                                {{ $pizza->name }}
                            </td>

                            <!-- Edit -->
                            <td class="py-4 px-4 text-sm">
                                <a href="/pizzas/{{ $pizza->id }}/edit"
                                    class="text-indigo-600 hover:text-indigo-900">Edit</a>
                            </td>

                            <!-- Delete -->
                            <td class="py-4 px-4 text-sm font-medium">
                                <form action="{{ route('pizzas.destroy', $pizza->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-600 hover:text-red-900">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- FOOTER -->
    <footer>
        <p>Copyright Stonks-Pizza 2023-2024</p>
    </footer>

    <!-- JS SCRIPTS -->
    <script src="js/script.js"></script>
@endsection --}}
