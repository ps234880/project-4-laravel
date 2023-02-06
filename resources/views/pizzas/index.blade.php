<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-600 leading-tight">
            {{ __('Pizzas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- Pizzas --}}
            @hasrole('customer')
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach ($pizzas as $pizza)
                    {{-- ingredient sum price per pizza --}}
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
                                        {{ $ingredient->name }},
                                    @endforeach
                                </td>
                            </tr>
                            {{-- Add & customize --}}
                            <tr>
                                <td class="px-4 py-2 text-sm text-slate-600 text-left flex gap-2">
                                    <a href="{{ route('pizzas.show', $pizza->id) }}"
                                        class="px-4 py-2 w-full text-center bg-gray-300 rounded-lg font-semibold text-xs text-gray-800 uppercase tracking-widest hover:bg-white focus:bg-white active:bg-gray-300 transition ease-in-out duration-150">Customize
                                        Pizza
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                @endforeach
            </div>
            @endhasrole

            {{-- Pizza crud --}}
            @hasanyrole('admin|employee')
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
            @endhasanyrole
        </div>
    </div>

    <x-slot name="footer">
        <h2 class="font-semibold text-l text-gray-600  leading-tight">
            {{ __('Stonks Pizza') }}
        </h2>
    </x-slot>
</x-app-layout>
