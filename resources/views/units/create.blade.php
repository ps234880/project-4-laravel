<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-600  leading-tight">
            {{ __('Units') }}
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto mt-5">
        <div class="px-4 sm:px-6 lg:px-8">

            {{-- Create form --}}
            <form action="{{ route('units.store') }}" method="POST">
                @csrf

                {{-- Unit name --}}
                <div class="mb-6">
                    <label for="name" class="block mb-2 text-sm font-medium text-slate-600">Unit
                        name</label>
                    <input type="text"
                        class="text-sm rounded-lg block w-full p-2.5 bg-slate-600 border-gray-600 placeholder-gray-400 text-white focus:ring-gray-500 focus:border-gray-500"
                        placeholder="100 Gram" name="name">
                    @error('name')
                        <div>{{ $message }}</div>
                    @enderror
                </div>

                {{-- Back and create --}}
                <div class="flex items-center justify-start space-x-4">
                    <a href="{{ route('units.index') }}" class="text-slate-600 text-sm">Back</a>
                    <button type="submit"
                        class="text-white rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center bg-slate-600 border-gray-600 hover:bg-slate-700">
                        Create
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
