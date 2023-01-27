<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-600  leading-tight">
            {{ __('Units') }}
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
                        <th scope="col" class="px-4 py-5 rounded-tr-lg">
                            <a href="{{ route('units.create') }}"
                                class="text-slate-50 hover:text-slate-300 text-sm font-medium uppercase">
                                Add unit
                            </a>
                        </th>
                    </tr>
                </thead>
                <!-- units -->
                <tbody>
                    @foreach ($units as $unit)
                        <tr>
                            <!-- Name -->
                            <td class="py-4 px-4 text-sm text-slate-600">
                                {{ $unit->name }}
                            </td>
                            <!-- Edit and delete -->
                            <td class="py-4 px-4 text-sm font-medium flex justify-between">
                                <a href="{{ route('units.edit', $unit->id) }}"
                                    class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                <form action="{{ route('units.destroy', $unit->id) }}" method="POST">
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
