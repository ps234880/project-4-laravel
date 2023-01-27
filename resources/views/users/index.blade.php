<x-app-layout>
    <x-slot name="header">
        <div class="font-semibold text-xl text-gray-600 leading-tight">Registered Users</div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-slate-600 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex">
                        <button class="hover:text-slate-300">
                            <a href="{{ route('users.create') }}">{{ __('Create User') }}</a>
                        </button>
                    </div>
                    <br>
                    @isset($users)
                        @foreach ($users as $user)
                            <div>
                                <a class="font-semibold text-gray-100 leading-tight hover:text-gray-200"
                                    href="{{ route('users.edit', $user) }}">
                                    {{ $user->name }} - ({{ $user->id }}) - @forelse ($user->roles as $role)
                                    {{ $role->name }} @empty guest
                                    @endforelse
                                </a>
                            </div>
                        @endforeach
                    @endisset
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
