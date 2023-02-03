<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-600  leading-tight">
            {{ __('Orders') }}
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto mt-5">
        <div class="px-4 sm:px-6 lg:px-8">
            {{-- Edit form --}}
            <form method="POST" action="{{ route('orders.update', $user->id) }}">
                @method('PATCH')
                @csrf

                {{-- Orderstatus --}}
                <div class="mb-6">
                    <label for="orderstatus_id" class="block mb-2 text-sm font-medium text-slate-600">Orderstatus</label>
                    <select name="orderstatus_id"
                        class="text-sm rounded-lg block w-full p-2.5 bg-slate-600 border-gray-600 placeholder-gray-400 text-white focus:ring-gray-500 focus:border-gray-500">
                        @foreach ($orderstatuses as $orderstatus)
                            <option value="{{ $orderstatus->id }}"
                                @if ($order->orderstatus == $orderstatus) selected="selected" @endif> {{ $orderstatus->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Back and update --}}
                <div class="flex items-center justify-start space-x-4">
                    <a href="{{ route('orders.index') }}" class="text-slate-600 font-medium text-sm">Back</a>
                    <button type="submit"
                        class="text-white rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center bg-slate-600 border-gray-600 hover:bg-slate-700">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>

    <x-slot name="footer">
        <h2 class="font-semibold text-l text-gray-600  leading-tight">
            {{ __('Stonks Pizza') }}
        </h2>
    </x-slot>
</x-app-layout>
