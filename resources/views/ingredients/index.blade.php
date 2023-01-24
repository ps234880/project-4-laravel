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
    <div class="max-w-7xl mx-auto">

        {{-- Left right gap --}}
        <div class="px-4 sm:px-6 lg:px-8">

            {{-- Table names --}}
            <table class="mt-8 ring-1 ring-black ring-opacity-20">
                <thead class="bg-slate-600">
                    <tr>
                        <th scope="col" class="px-4 py-5 text-center text-sm font-medium uppercase text-slate-50">
                            Name
                        </th>
                        <th scope="col" class="px-4 py-5 text-center text-sm font-medium uppercase text-slate-50">
                            Price
                        </th>
                        <th scope="col" class="px-4 py-5">

                        </th>
                        <th scope="col" class="px-4 py-5">
                            <a href="/ingredients/create"
                                class="text-slate-50 hover:text-slate-300 text-sm font-medium uppercase">
                                Add ingredient
                            </a>
                        </th>
                    </tr>
                </thead>

                {{-- Ingredients --}}
                <tbody>
                    @foreach ($ingredients as $ingredient)
                        <tr>
                            {{-- Name --}}
                            <td class="py-3 pl-4 pr-3 text-sm text-gray-900">
                                {{ $ingredient->name }}
                            </td>

                            {{-- Price --}}
                            <td class="py-3 pl-4 pr-3 text-sm text-gray-900">
                                € {{ $ingredient->price }}
                            </td>

                            {{-- Edit --}}
                            <td class="py-4 pl-4 pr-3 text-sm">
                                <a href="/ingredients/{{ $ingredient->id }}/edit"
                                    class="text-indigo-600 hover:text-indigo-900">Edit</a>
                            </td>

                            {{-- Delete --}}
                            <td class="py-4 pl-4 pr-3 text-sm font-medium">
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
@endsection
