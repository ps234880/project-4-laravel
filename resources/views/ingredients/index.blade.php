<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-600  leading-tight">
            {{ __('Ingredients') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <table class=" ring-1 ring-black ring-opacity-20 rounded-lg">
                <thead class="bg-slate-600 ">
                    <tr>
                        <th scope="col"
                            class="px-4 py-5 text-left text-sm font-medium uppercase text-slate-50 rounded-tl-lg">
                            Name
                        </th>
                        <th scope="col" class="px-4 py-5 text-left text-sm font-medium uppercase text-slate-50">
                            Price
                        </th>
                        <th scope="col" class="px-4 py-5 text-left text-sm font-medium uppercase text-slate-50">
                            Unit
                        </th>
                        <th scope="col" class="px-4 py-5 rounded-tr-lg">
                            <a href="{{ route('ingredients.create') }}"
                                class="text-slate-50 hover:text-slate-300 text-sm font-medium uppercase">
                                Add ingredient
                            </a>
                        </th>
                    </tr>
                </thead>
                <!-- Ingredients -->
                <tbody>
                    @foreach ($ingredients as $ingredient)
                        <tr>
                            <!-- Name -->
                            <td class="py-4 px-4 text-sm text-slate-600">
                                {{ $ingredient->name }}
                            </td>
                            <!-- Price -->
                            <td class="py-4 px-4 text-sm text-slate-600">
                                € {{ $ingredient->price }}
                            </td>
                            <!-- Price -->
                            <td class="py-4 px-4 text-sm text-slate-600">
                                @isset($ingredient->unit->name)
                                    {{ $ingredient->unit->name }}
                                @endisset
                            </td>
                            <!-- Edit and delete -->
                            <td class="py-4 px-4 text-sm font-medium flex justify-between">
                                <a href="{{ route('ingredients.edit', $ingredient->id) }}"
                                    class="text-indigo-600 hover:text-indigo-900">Edit</a>
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
</x-app-layout>
