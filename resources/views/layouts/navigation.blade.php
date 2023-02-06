<nav x-data="{ open: false }" class=" dark:bg-slate-600 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('pizzas.index') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    @hasanyrole('employee|admin')
                        <x-nav-link :href="route('users.index')" :active="request()->routeIs('users.index', 'users.edit', 'users.create', 'users.destroy')">
                            {{ __('Users') }}
                        </x-nav-link>
                        <x-nav-link :href="route('ingredients.index')" :active="request()->routeIs('ingredients.index', 'ingredients.edit', 'ingredients.create', 'ingredients.destroy' )">
                            {{ __('Ingredients') }}
                        </x-nav-link>
                        <x-nav-link :href="route('units.index')" :active="request()->routeIs('units.index', 'units.edit', 'units.create', 'units.destroy')">
                            {{ __('Units') }}
                        </x-nav-link>
                        <x-nav-link :href="route('adminpizzas.index')" :active="request()->routeIs('adminpizzas.index', 'adminpizzas.edit', 'adminpizzas.create', 'adminpizzas.destroy')">
                            {{ __('Pizzas') }}
                        </x-nav-link>
                        <x-nav-link :href="route('orders.index')" :active="request()->routeIs('orders.index', 'orders.edit', 'orders.create', 'orders.destroy')">
                            {{ __('Orders') }}
                        </x-nav-link>
                    @endhasanyrole
                    @unlessrole('employee|admin')
                    <x-nav-link :href="route('pizzas.index')" :active="request()->routeIs('pizzas.index', 'pizzas.edit', 'pizzas.create', 'pizzas.destroy')">
                        {{ __('Pizzas') }}
                    </x-nav-link>

                    <x-nav-link :href="route('orders.index')" :active="request()->routeIs('orders.index', 'orders.edit', 'orders.create', 'orders.destroy')">
                        {{ __('Orders') }}
                    </x-nav-link>
                    @endunlessrole
                </div>

                <!-- Settings Dropdown -->
                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    <x-dropdown ali gn="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-400 dark:bg-slate-600 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                @if (Auth::check())
                                <div>{{ Auth::user()->name }}</div>
                                @else
                                <div>Guest</div>
                                @endif

                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            @if (Auth::check())
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                            @else
                            <x-dropdown-link :href="route('login')">
                                {{ __('Login') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('register')">
                                {{ __('Register') }}
                            </x-dropdown-link>
                            @endif
                        </x-slot>
                    </x-dropdown>
                </div>

                <!-- Hamburger -->
                <div class="-mr-2 flex items-center sm:hidden">
                    <button @click="open = ! open"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-slate-600 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-600 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Responsive Navigation Menu -->
        <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">

            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800 dark:text-gray-200">
                        @if (Auth::check())
                        {{ Auth::user()->name }}
                        @else
                        Guest
                        @endif
                    </div>
                    <div class="font-medium text-sm text-gray-500">
                        @if (Auth::check())
                        {{ Auth::user()->email }}
                        @else
                        No Email
                        @endif
                    </div>
                </div>

                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>
                    @hasanyrole('employee|admin')
                    <x-responsive-nav-link :href="route('users.index')">
                        {{ __('Users') }}
                    </x-responsive-nav-link>

                    <x-responsive-nav-link :href="route('ingredients.index')">
                        {{ __('Ingredients') }}
                    </x-responsive-nav-link>

                    <x-responsive-nav-link :href="route('units.index')">
                        {{ __('Units') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('orders.index')">
                        {{ __('Orders') }}
                    </x-responsive-nav-link>
                    @endhasanyrole
                    @unlessrole('employee|admin')
                    <x-responsive-nav-link :href="route('pizzas.index')">
                        {{ __('Pizzas') }}
                    </x-responsive-nav-link>

                    <x-responsive-nav-link :href="route('orders.index')">
                        {{ __('Orders') }}
                    </x-responsive-nav-link>
                    @endunlessrole

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault();
                                    this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        </div>
    </div>
</nav>
