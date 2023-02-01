<x-app-layout>
    <x-slot name="logo">
        <a href="/">
            <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
        </a>
    </x-slot>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-slate-600 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <header>
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            Profile Information of {{ $user->name }}
                        </h2>
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            {{ __("Update your account's profile information and email address.") }}
                        </p>
                    </header>
                    <form method="POST" action="{{ route('users.update', [$user]) }}">
                        @csrf
                        @method('put')
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                            <div>
                                <div>
                                    <x-input-label for="name" :value="__('Name')" />
                                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                        value="{{ $user->name }}" required autofocus autocomplete="name" />
                                </div>

                                <div>
                                    <x-input-label for="email" :value="__('Email')" />
                                    <x-text-input id="email" class="block mt-1 w-full" type="text" name="email"
                                        value="{{ $user->email }}" required autofocus autocomplete="email" />
                                </div>

                                <div>
                                    <x-input-label for="street" :value="__('Street')" />
                                    <x-text-input id="street" class="block mt-1 w-full" type="text" name="street"
                                        value="{{ $user->street }}" required autofocus autocomplete="street" />
                                </div>

                                <div>
                                    <x-input-label for="house_number" :value="__('House Number')" />
                                    <x-text-input id="house_number" class="block mt-1 w-full" type="text"
                                        name="house_number" value="{{ $user->house_number }}" required autofocus
                                        autocomplete="house_number" />
                                </div>
                                <div>
                                    <x-input-label for="postal_code" :value="__('Postal Code')" />
                                    <x-text-input id="postal_code" class="block mt-1 w-full" type="text"
                                        name="postal_code" value="{{ $user->postal_code }}" required autofocus
                                        autocomplete="postal_code" />
                                </div>
                            </div>
                            <div>
                                <div>
                                    <x-input-label for="phone_number" :value="__('Phone Number')" />
                                    <x-text-input id="phone_number" class="block mt-1 w-full" type="text"
                                        name="phone_number" value="{{ $user->phone_number }}" required autofocus
                                        autcomplete="phone_number" />
                                </div>
                                <form method="POST" action="{{ route('users.update', [$user]) }}">
                                    @csrf
                                    @method('put')
                                    <div class="mt-6">
                                        <select class="form-control" name="roles[]" multiple="">
                                            @foreach ($roles as $role)
                                                <option class="font-semibold text-gray-600 leading-tight"
                                                    value="{{ $role->id }}"
                                                    {{ $user->roles()->get()->contains($role)? 'selected': '' }}>
                                                    {{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mt-6 flex">
                                        <x-primary-button>
                                            {{ __('Update Profile') }}
                                        </x-primary-button>
                                    </div>
                                </form>

                            </div>
                        </div>

                </div>
                <form method="post" action="{{ route('users.destroy', $user->id) }}" class="p-6">
                    @csrf
                    @method('delete')

                    <div class="mt-6 flex justify-end">
                        <x-danger-button class="ml-3">
                            {{ __('Delete Account') }}
                        </x-danger-button>
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
