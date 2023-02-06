<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-600  leading-tight">
            {{ __('Orders') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4">
            @hasanyrole('admin|employee')
            @foreach ($users as $user)
            <table class="ring-1 ring-black ring-opacity-20 rounded-lg mt-4">
                <thead class="bg-slate-600 ">
                    <tr>
                        <th scope="col" class="px-4 py-5 text-left text-sm uppercase text-slate-50 rounded-tl-lg">
                            Order ID
                        </th>
                        <th scope="col" class="px-4 py-5 text-left text-sm uppercase text-slate-50">
                            Name
                        </th>
                        <th scope="col" class="px-4 py-5 text-left text-sm uppercase text-slate-50">
                            Status
                        </th>
                        <th scope="col" class="px-4 py-5 text-left text-sm uppercase text-slate-50">

                        </th>
                        <th scope="col" class="px-4 py-5 text-left text-sm uppercase text-slate-50 rounded-tr-lg">

                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user->orders as $order)
                        <tr>
                            <td class="py-4 px-4 text-sm text-slate-600">
                                <a>{{ $order->id }}</a>
                            </td>
                            <td class="py-4 px-4 text-sm text-slate-600">
                                <a>{{ $order->user->name }}</a>
                            </td>
                            <td class="py-4 px-4 text-sm text-slate-600">
                                <a>{{ $order->orderstatus->name }}</a>
                            </td>
                            <td class="py-4 px-4 text-sm font-medium justify-between">
                                <form action="{{ route('orders.edit', $order->id) }}">
                                @csrf
                                <button class="text-indigo-600 hover:text-indigo-900" type="submit">Edit</button>
                                </form>
                            </td>
                            <td class="py-4 px-4 text-sm font-medium justify-between">
                                <form action="{{ route('orders.destroy', $order->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-600 hover:text-red-900">Annuleer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @endforeach
            @endhasanyrole
            
            @unlessrole('admin|employee')
                @foreach ($users as $user)
                    @foreach ($user->orders as $order)
                    @if ($user->id == Auth::user()->id)
                    <table class="ring-1 ring-black ring-opacity-20 rounded-lg mt-4">
                        <thead class="bg-slate-600 ">
                            <tr>
                                <th scope="col" class="px-4 py-5 text-left text-sm uppercase text-slate-50 rounded-tl-lg">
                                    <a>{{ $order->user->name }}</a>
                                </th>
                                <th scope="col" class="px-4 py-5 text-left text-sm uppercase text-slate-50">
                                    <a>Status</a>
                                </th>
                                <th scope="col" class="px-4 py-5 text-left text-sm uppercase text-slate-50">

                                </th>
                                <th scope="col" class="px-4 py-5 text-left text-sm uppercase text-slate-50 rounded-tr-lg">
                                    @if ($order->orderstatus->name == "Delivered")
                                    <form method="post" action="{{ route('orders.store', $order->id) }}">
                                        @csrf
                                        <button class="text-left text-sm uppercase text-slate-50 hover:text-slate-400" type="submit">End Order</button>
                                        <input type="hidden" name="user_id" value="{{ $order->user->id }}"/>
                                        <input type="hidden" name="orderstatus_id" value="{{ 1 }}"/>
                                        <input type="hidden" name="order_id" value="{{ $order->id }}"/>
                                    </form>
                                    @endif
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="py-4 px-4 text-sm text-slate-600">
                                    @foreach ($order->orderlines as $orderline)
                                    <a>{{ $orderline->pizza->name }} - {{ $orderline->size->name }} - x{{ $orderline->amount }}</a><br>
                                    @endforeach
                                </td>
                                <td class="py-4 px-4 text-sm text-slate-600">
                                    <a>{{ $order->orderstatus->name}}</a>
                                </td>
                                <td class="py-4 px-4 text-sm font-medium justify-between">
                                    @hasanyrole('employee|admin')
                                    <a href="{{ route('orders.edit', $order->id) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                    @endhasanyrole
                                </td>
                                <td class="py-4 px-4 text-sm font-medium justify-between">
                                    @if ($order->orderstatus->id == 1)
                                    <form method="POST" action="{{ route('orders.destroy', $order->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="user_id" value="{{ $order->user->id }}"/>
                                    <input type="hidden" name="orderstatus_id" value="{{ 1 }}"/>
                                    <input type="hidden" name="order_id" value="{{ $order->id }}"/>
                                    <button class="text-red-600 hover:text-red-900">Annuleer</button>
                                    </form>
                                    @else
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    @endif
                    @endforeach
                @endforeach
            @endunlessrole

        </div>
    </div>

    <x-slot name="footer">
        <h2 class="font-semibold text-l text-gray-600  leading-tight">
            {{ __('Stonks Pizza') }}
        </h2>
    </x-slot>
</x-app-layout>
