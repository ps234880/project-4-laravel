<x-app-layout>
    <x-slot name="header">
        <div class="font-semibold text-xl text-gray-600 leading-tight">Geregistreerde gebruikers</div>
        <div class="font-semibold text-xl text-gray-600 leading-tight">Klik op gebruiker om de rol te wijzigen</div>
    </x-slot>   

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-slate-600 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @foreach ($users as $user)
                        <div>
                            <a class="font-semibold text-gray-800 dark:text-gray-400 leading-tight hover:text-gray-200" href="{{ route('users.edit', $user) }}">
                                {{ $user->name }} ({{ $user->id }})
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
