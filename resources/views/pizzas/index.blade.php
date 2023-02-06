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
                            {{-- Size --}}
                            <form method="post" action="{{ route('orders.store') }}">
                            <td class="py-2 px-4 text-sm text-slate-600 flex gap-1">
                                <select name="size_id" id="size_id" onchange="GetSize(this)" {{-- ERWIN --}}
                                    class="text-sm rounded-lg block w-full p-2.5 bg-slate-600 border-gray-600 placeholder-gray-400 text-white focus:ring-gray-500 focus:border-gray-500">
                                    @foreach ($sizes as $size)
                                        @if ($size->id == 2)
                                            <option selected value="{{ $size->id }}">{{ $size->name }}</option>
                                        @else
                                            <option value="{{ $size->id }}">{{ $size->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            {{-- Amount --}}
                                <input type="number" name="amount" id="amount" min="1" value="1" onkeyup="GetAmount(this)"
                                    placeholder="Enter amount"
                                class="text-sm rounded-lg block w-full p-2.5 bg-slate-600 border-gray-600 placeholder-gray-400 text-white focus:ring-gray-500 focus:border-gray-500">
                            </td>
                            {{-- Add & customize --}}
                            <tr>
                                
                                <td class="px-4 py-2 text-sm text-slate-600 text-left flex gap-2">
                                    @foreach ($users as $user)
                                    @foreach ($user->orders as $order)
                                    @if (Auth::check())
                                    @if ($user->id == Auth::user()->id)
                                    @if($order->orderstatus->name != "Initial")
                                    
                                    @else
                                    <button type="submit" class="px-4 py-2 w-full text-center bg-gray-300 rounded-lg font-semibold text-xs text-gray-800 uppercase tracking-widest hover:bg-white focus:bg-white active:bg-gray-300 transition ease-in-out duration-150">
                                    Add pizza
                                    </button>
                                    @csrf
                                    <input type="hidden" name="pizza_id" value="{{ $pizza->id }}"/>
                                    @endif
                                    @endif
                                    @endif
                                    @endforeach
                                    @endforeach

                                    @foreach ($users as $user)
                                    @foreach ($user->orders as $order)
                                    @if (Auth::check())
                                    @if ($user->id == Auth::user()->id)
                                    <input type="hidden" name="order_id" value="{{ $order->id }}"/>
                                    @endif
                                    @endif
                                    @endforeach
                                    @endforeach
                                </td>
                            </tr>
                            </form>
                        </tbody>
                    </table>
                @endforeach
            </div>
        </div>
    </div>

    <script src="../js/script.js"></script>

    <x-slot name="footer">
        <h2 class="font-semibold text-l text-gray-600  leading-tight">
            {{ __('Stonks Pizza') }}
        </h2>
    </x-slot>
</x-app-layout>