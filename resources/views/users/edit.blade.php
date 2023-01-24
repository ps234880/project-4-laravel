<x-app-layout>
    <x-slot name="logo">
        <a href="/">
            <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
        </a>
    </x-slot>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" bg-slate-600 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('users.update', [$user]) }}">
                        @csrf
                        @method('put')
                        <div class="text-xl">Wijzig de rol(len) voor:</div>
                        <div class="text-xl">{{ $user->name }}</div>
                        <div class="mt-2">
                            <select class="form-control" name="roles[]" multiple="">
                                @foreach($roles as $role)
                                    <option class="font-semibold text-gray-600 leading-tight hover:text-gray-800" value="{{ $role->id }}" {{ $user->roles()->get()->contains($role) ? 'selected' : '' }}>{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex mt-4">
                            <x-primary-button>
                                {{ __('Wijzig rollen') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
