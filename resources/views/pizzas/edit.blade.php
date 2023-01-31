<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-600  leading-tight">
            {{ __('Pizzas') }}
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto mt-5">
        <div class="px-4 sm:px-6 lg:px-8">
            <div class="flex gap-5">
                {{-- Add ingredient to pizza --}}
                <div class="mb-6">
                    <label for="name" class="block mb-2 font-medium text-slate-600">Add ingredients to
                        pizza</label>
                    @foreach ($ingredients as $ingredient)
                        <table class="text-sm">
                            <tr>
                                <td class="text-slate-600">
                                    {{ $ingredient->name }}
                                </td>
                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium">
                                    <form action="{{ route('ingredient_pizza.store') }}" method="POST">
                                        @csrf
                                        <button class="text-green-600 hover:text-green-900">Add</button>
                                        <input type="hidden" name="ingredient_id" value="{{ $ingredient->id }}">
                                        <input type="hidden" name="pizza_id" value="{{ $pizza->id }}">
                                    </form>
                                </td>
                            </tr>
                        </table>
                    @endforeach
                </div>
                {{-- Remove ingredient from pizza --}}
                <div class="mb-6">
                    <label for="name" class="block mb-2 font-medium text-slate-600">Remove
                        ingredients</label>
                    @foreach ($pizza->ingredients as $ingredient)
                        <table class="text-sm">
                            <tr>
                                <td class="text-slate-600">
                                    {{ $ingredient->name }}
                                </td>
                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium">
                                    <form action="{{ route('ingredient_pizza.destroy', $pizza->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="text-red-600 hover:text-red-900">Remove</button>
                                        <input type="hidden" name="ingredient_id" value="{{ $ingredient->id }}">
                                    </form>
                                </td>
                            </tr>
                        </table>
                    @endforeach
                </div>
            </div>
            {{-- Edit form --}}
            <form method="POST" action="{{ route('pizzas.update', $pizza->id) }}">
                @method('PATCH')
                @csrf

                {{-- Pizza name --}}
                <div class="mb-6">
                    <label for="name" class="block mb-2 text-sm font-medium text-slate-600">Pizza name</label>
                    <input type="text"
                        class="text-sm rounded-lg block w-full p-2.5 bg-slate-600 border-gray-600 placeholder-gray-400 text-white focus:ring-gray-500 focus:border-gray-500"
                        name="name" value="{{ $pizza->name }}">
                    @error('name')
                        <div>{{ $message }}</div>
                    @enderror
                </div>

                {{-- Back and update --}}
                <div class="flex items-center justify-start space-x-4 mb-6">
                    <a href="{{ route('pizzas.index') }}" class="text-slate-600 font-medium text-sm">Back</a>
                    <button type="submit"
                        class="text-white rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center bg-slate-600 border-gray-600 hover:bg-slate-700">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
