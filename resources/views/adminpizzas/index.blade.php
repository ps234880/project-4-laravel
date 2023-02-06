<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-600 leading-tight">
            {{ __('Pizzas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <table class="ring-1 ring-black ring-opacity-20 rounded-lg mt-4">
                <thead class="bg-slate-600 ">
                    <tr>
                        <th scope="col" class="px-4 py-5 text-left text-sm uppercase text-slate-50 rounded-tl-lg">
                            Name
                        </th>
                        <th scope="col" class="px-4 py-5 rounded-tr-lg">
                            <a href="{{ route('adminpizzas.create') }}"
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
                                <a href="{{ route('adminpizzas.edit', $pizza->id) }}"
                                    class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                <form action="{{ route('adminpizzas.destroy', $pizza->id) }}" method="POST">
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