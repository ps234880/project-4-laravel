<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-600  leading-tight">
            {{ __('Pizzas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <table class=" ring-1 ring-black ring-opacity-20 rounded-lg">
                <thead class="bg-slate-600">
                    <tr>
                        <th scope="col"
                            class="px-4 py-5 text-left text-sm font-medium uppercase text-slate-50 rounded-tl-lg">
                            {{ $pizza->name }}
                        </th>
                        <th scope="col"
                            class="px-4 py-5 text-left text-sm font-medium uppercase text-slate-50 rounded-tr-lg">
                            Price
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="max-w-2xl">
                        {{-- Ingredients --}}
                        <td class="py-4 px-4 text-sm text-slate-600">
                            @foreach ($pizza->ingredients as $ingredient)
                                {{ $ingredient->name }}
                            @endforeach
                        </td>
                        {{-- Pizza price --}}
                        <td class="py-4 px-4 text-sm text-slate-600">
                            Price per piece: € <p id="PricePer"> {{ $sum = number_format((float) $sum, 2) }}</p>
                        </td>
                    </tr>
                    <tr class="max-w-2xl">
                        <td class="px-4 text-sm text-slate-600">Remove ingredients:
                        </td>
                        <td class="px-4 text-sm text-slate-600">
                        </td>
                    </tr>
                    <tr class="max-w-2xl">
                        {{-- Remove ingredients --}}
                        <td class="px-4 text-sm text-slate-600">
                            @foreach ($pizza->ingredients as $ingredient)
                                <input type="checkbox" name="ingredients" value="{{$ingredient->name}}"> {{ $ingredient->name }} €
                                -{{ $ingredient->price = number_format((float) $ingredient->price, 2) }}
                                <br>
                            @endforeach
                        </td>
                        <td class="px-4 text-sm text-slate-600">
                        </td>
                    </tr>
                </tbody>
                <tbody>
                    <tr class="max-w-2xl">
                        <td class="pt-4 px-4 text-sm text-slate-600">Extra ingredients:
                        </td>
                        <td class="pt-4 text-sm text-slate-600">
                        </td>
                    </tr>
                    <tr class="max-w-2xl">
                        {{-- Extra ingredients --}}
                        <td class="px-4 text-sm text-slate-600">
                            @foreach ($ingredients as $ingredient)
                                <input type="checkbox" name="ingredients" value="{{$ingredient->name}}"> {{ $ingredient->name }} €
                                {{ $ingredient->price = number_format((float) $ingredient->price, 2) }}
                                <br>
                            @endforeach
                        </td>
                        <td class="px-4 text-sm text-slate-600">
                        </td>
                    </tr>
                </tbody>
                <tbody>
                    <tr class="max-w-2xl">
                        {{-- Size --}}
                        <td class="py-2 px-4 text-sm text-slate-600 flex gap-1">
                            <select name="size" id="size" onchange="GetSize(this)" {{-- ERWIN --}}
                                class="text-sm rounded-lg block w-full p-2.5 bg-slate-600 border-gray-600 placeholder-gray-400 text-white focus:ring-gray-500 focus:border-gray-500">
                                @foreach ($sizes as $size)
                                    @if ($size->id == 2)
                                        <option selected value="{{ $size->id }}">{{ $size->name }}</option>
                                    @else
                                        <option value="{{ $size->id }}">{{ $size->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <input type="number" name="Amount" id="Amount" value="1" onkeyup="GetAmount(this)"
                                placeholder="Enter amount"
                                class="text-sm rounded-lg block w-full p-2.5 bg-slate-600 border-gray-600 placeholder-gray-400 text-white focus:ring-gray-500 focus:border-gray-500">
                            </td>
                        {{-- Deze $sum moet later $totalSum heten ofzo. Berekening komt later --}}
                        <td class="py-2 px-4 text-sm text-slate-600">Total price: €
                            <br>
                            <p id="Total">{{ $sum = number_format((float) $sum, 2) }}</p>
                        </td>
                    </tr>
                </tbody>
                <tbody>
                    <tr class="max-w-2xl">
                        {{-- Size --}}
                        <td colspan="3" class="py-4 px-4 text-sm text-slate-600">
                            <button onclick="AddPizza()"
                                class="text-sm rounded-lg block w-full p-2.5 bg-slate-600 border-gray-600 placeholder-gray-400 text-white focus:ring-gray-500 focus:border-gray-500">Add
                                to cart
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <script src="../js/script.js"></script>

    <x-slot name="footer">
        <h2 class="font-semibold text-l text-gray-600  leading-tight">
            {{ __('Stonks Pizza') }}
        </h2>
    </x-slot>
</x-app-layout>
