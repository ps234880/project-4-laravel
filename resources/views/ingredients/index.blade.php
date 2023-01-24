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

    {{-- Gap from top and max width --}}
    <div class="max-w-4xl mx-auto mt-10">

        {{-- Left right gap --}}
        <div class="px-4 sm:px-6 lg:px-8">

            {{-- Text --}}
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="text-xl font-semibold text-gray-900">Ingredient</h1>
                    <p class="mt-2 text-sm text-gray-700">A list of ingredients</p>
                </div>

                {{-- Add ingredient --}}
                <a href="/ingredients/create"
                    class="mt-4 inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">
                    Add ingredient
                </a>
            </div>

            {{-- Table names --}}
            <table class="mt-8 min-w-full shadow ring-1 ring-black ring-opacity-20">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-4 py-3 text-left text-xs font-medium uppercase text-gray-500">
                            Name
                        </th>
                        <th scope="col" class="px-4 py-3 text-left text-xs font-medium uppercase text-gray-500">
                            Price
                        </th>
                    </tr>
                </thead>

                {{-- Index pizza --}}
                <tbody class="divide-y divide-gray-200 bg-white">
                    @foreach ($ingredients as $ingredient)
                        <tr>
                            <td class="whitespace-nowrap py-3 pl-4 pr-3 text-sm font-medium text-gray-900">
                                {{ $ingredient->name }}
                            </td>

                            <td class="whitespace-nowrap py-3 pl-4 pr-3 text-sm font-medium text-gray-900">
                                {{ $ingredient->price }}
                            </td>

                            {{-- Edit --}}
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium">
                                <a href="/ingredients/{{ $ingredient->id }}/edit"
                                    class="text-indigo-600 hover:text-indigo-900">Edit</a>
                            </td>

                            {{-- Delete --}}
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium">
                                <form action="{{ route('ingredients.destroy', $ingredient->id) }}" method="POST">
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


    <!-- SHOPPING CART -->
    <div id="order">
        <h2>Order</h2>
        <p>Total Price:</p>
        <a href="orders"><button id="create">Complete</a></button>
    </div>


    <!-- FOOTER -->
    <footer>
        <p>Copyright Stonks-Pizza 2023-2024</p>
    </footer>

    <!-- JS SCRIPTS -->
    <script src="js/script.js"></script>
@endsection
