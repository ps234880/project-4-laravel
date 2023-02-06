<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-600  leading-tight">
            {{ __('Orders') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">



            @hasanyrole('admin|employee')
            @foreach ($users as $user)
            <table class="ring-1 ring-black ring-opacity-20 rounded-lg mt-4">
                <thead class="bg-slate-600 ">
                    <tr>
                        <th scope="col" class="px-4 py-5 text-left text-sm uppercase text-slate-50 rounded-tl-lg">
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
                                <button class="text-red-600 hover:text-red-900">Delete</button>
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

                        </th>
                    </tr>
                </thead>
                <tbody>
                        <tr>
                            <td class="py-4 px-4 text-sm text-slate-600">
                                @foreach ($order->orderlines as $orderline)
                                <a>{{ $orderline->pizza->name }}</a><br>
                                @endforeach
                            </td>
                            <td class="py-4 px-4 text-sm text-slate-600">
                                <a>{{ $order->orderstatus->name}}</a>
                            </td>
                            <td class="py-4 px-4 text-sm font-medium justify-between">
                                <a href="{{ route('orders.edit', $order->id) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                            </td>
                            <td class="py-4 px-4 text-sm font-medium justify-between">
                                <form method="POST" action="{{ route('orders.destroy', $order->id) }}">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-600 hover:text-red-900">Delete</button>
                                </form>
                            </td>
                        </tr>
                </tbody>
            </table>
            @endif
            @endforeach
            @endforeach
            @endunlessrole

            {{-- @unlessrole('admin|employee')
            @foreach ($users as $user)
            @if ($user->id == Auth::user()->id)
            <table class="ring-1 ring-black ring-opacity-20 rounded-lg mt-4">
                <thead class="bg-slate-600 ">
                    <tr>
                        <th scope="col" class="px-4 py-5 text-left text-sm uppercase text-slate-50 rounded-tl-lg">
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
                                <a>{{ $order->user->name }}</a>
                            </td>
                            <td class="py-4 px-4 text-sm text-slate-600">
                                <a>{{ $order->orderstatus->name }}</a>
                            </td>
                            <td class="py-4 px-4 text-sm font-medium justify-between">
                                <a href="{{ route('orders.edit', $order->id) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                            </td>
                            <td class="py-4 px-4 text-sm font-medium justify-between">
                                <form action="{{ route('orders.destroy', $order->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-600 hover:text-red-900">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
            @endforeach
            @endunlessrole --}}
        </div>
    </div>

    <x-slot name="footer">
        <h2 class="font-semibold text-l text-gray-600  leading-tight">
            {{ __('Stonks Pizza') }}
        </h2>
    </x-slot>
</x-app-layout>
