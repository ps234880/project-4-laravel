<x-app-layout>
    <x-slot name="header">
        <div class="font-semibold text-xl text-gray-600 leading-tight">Create User</div>
    </x-slot>   

<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-slate-600 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <header>
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                               Create A New User
                        </h2>
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            {{ __("Update your account's profile information and email address.") }}
                        </p>
                    </header>
                    <form method="POST" action="{{ route('users.store') }}">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                        <div>
                            <div>
                                <x-input-label for="name" :value="__('Name')" />
                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" required autofocus/>
                            </div>

                            <div>
                                <x-input-label for="email" :value="__('Email')" />
                                <x-text-input id="email" class="block mt-1 w-full" type="text" name="email" required autofocus/>
                            </div>

                            <div>
                                <x-input-label for="street" :value="__('Street')" />
                                <x-text-input id="street" class="block mt-1 w-full" type="text" name="street" required autofocus/>
                            </div>

                            <div>
                                <x-input-label for="house_number" :value="__('House Number')" />
                                <x-text-input id="house_number" class="block mt-1 w-full" type="text" name="house_number" required autofocus/>
                            </div>
                        </div>
                        <div>
                            <div>
                                <x-input-label for="postal_code" :value="__('Postal Code')" />
                                <x-text-input id="postal_code" class="block mt-1 w-full" type="text" name="postal_code" required autofocus/>
                            </div>

                            <div>
                                <x-input-label for="phone_number" :value="__('Phone Number')" />
                                <x-text-input id="phone_number" class="block mt-1 w-full" type="text" name="phone_number" required autofocus/>
                            </div>
                            <div>
                                <x-input-label for="password" :value="__('Password')" />
                                <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" required autofocus />
                            </div>
                            <div class="mt-7 flex">
                                <x-primary-button>
                                    {{ __('Create User') }}
                                </x-primary-button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
