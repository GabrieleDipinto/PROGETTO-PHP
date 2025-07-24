<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ url('/') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-gray-900 dark:text-gray-100">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    <x-nav-link :href="route('prenotazioni.index')" :active="request()->routeIs('prenotazioni.*')" class="text-gray-900 dark:text-gray-100">
                        {{ __('Prenotazioni') }}
                    </x-nav-link>
                    <x-nav-link :href="route('segnalazioni.index')" :active="request()->routeIs('segnalazioni.*')" class="text-gray-900 dark:text-gray-100">
                        {{ __('Segnalazioni') }}
                    </x-nav-link>
                    <x-nav-link :href="route('fedelta')" :active="request()->routeIs('fedelta')" class="text-gray-900 dark:text-gray-100">
                        {{ __('Carta Fedeltà') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Right Side Navigation -->
            <div class="hidden sm:flex sm:items-center sm:ml-6 space-x-4">
                <!-- Dark Mode Toggle -->
                <button 
                    onclick="toggleDarkMode()"
                    class="p-2 text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 focus:outline-none"
                >
                    <!-- Sun icon -->
                    <svg class="hidden dark:block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                    <!-- Moon icon -->
                    <svg class="block dark:hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                    </svg>
                </button>

                <x-nav-link :href="route('profile.edit')" :active="request()->routeIs('profile.edit')" class="text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-gray-100">
                    {{ __('Profile') }}
                </x-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-nav-link :href="route('logout')"
                        onclick="event.preventDefault();
                        this.closest('form').submit();" 
                        class="text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-gray-100">
                        {{ __('Log Out') }}
                    </x-nav-link>
                </form>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-gray-900 dark:text-gray-100">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('prenotazioni.index')" :active="request()->routeIs('prenotazioni.*')" class="text-gray-900 dark:text-gray-100">
                {{ __('Prenotazioni') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('segnalazioni.index')" :active="request()->routeIs('segnalazioni.*')" class="text-gray-900 dark:text-gray-100">
                {{ __('Segnalazioni') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('fedelta')" :active="request()->routeIs('fedelta')" class="text-gray-900 dark:text-gray-100">
                {{ __('Carta Fedeltà') }}
            </x-responsive-nav-link>
            <!-- Dark Mode Toggle for Mobile -->
            <div class="px-4 py-2">
                <button 
                    onclick="toggleDarkMode()"
                    class="w-full flex items-center px-2 py-2 text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-gray-100"
                >
                    <span class="dark:hidden">Attiva Tema Scuro</span>
                    <span class="hidden dark:inline">Attiva Tema Chiaro</span>
                </button>
            </div>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                @if(Auth::check())
                    <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->nome }} {{ Auth::user()->cognome }}</div>
                    <div class="font-medium text-sm text-gray-500 dark:text-gray-400">{{ Auth::user()->email }}</div>
                @elseif(session('is_admin'))
                    <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ session('admin_name') }}</div>
                    <div class="font-medium text-sm text-gray-500 dark:text-gray-400">Admin</div>
                @endif
            </div>

            @if(Auth::check())
                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('profile.edit')" class="text-gray-600 dark:text-gray-300">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            @elseif(session('is_admin'))
                <div class="mt-3 space-y-1">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            @endif
        </div>
    </div>
</nav>
