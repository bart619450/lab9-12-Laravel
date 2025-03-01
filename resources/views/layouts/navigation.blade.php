<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="nawigacja">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ url('/') }}">
                    <img src="{{ asset('images/large2.png') }}" alt="Logo" class="custom-logo">
                    </a>
                </div>
                <style>
                    .custom-logo {
                        height: 45px;  /* Zmieniasz wysokość na 40px */
                        width: auto;   /* Proporcjonalna szerokość */
                    }
                    
                </style>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex flex-grow" style="width: 80%;">
                    @auth
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="custom-nav-link">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    @endauth
                    
                    <!-- Linki do aktorów, autorów, typów filmów i filmów -->
                    <x-nav-link :href="route('film.index')" :active="request()->routeIs('film.index')" class="custom-nav-link">
                        {{ __('Filmy') }}
                    </x-nav-link>
                    <x-nav-link :href="route('aktor.index')" :active="request()->routeIs('aktor.index')" class="custom-nav-link">
                        {{ __('Aktorzy') }}
                    </x-nav-link>
                    <x-nav-link :href="route('autor.index')" :active="request()->routeIs('autor.index')" class="custom-nav-link">
                        {{ __('Autorzy') }}
                    </x-nav-link>
                    <x-nav-link :href="route('typfilmu.index')" :active="request()->routeIs('typfilmu.index')" class="custom-nav-link">
                        {{ __('Typy Filmów') }}
                    </x-nav-link>
                    @admin
                    <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')" class="custom-nav-link">
                        {{ __('Admin') }}
                    </x-nav-link>
                    @endadmin
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
            @guest
                    <!-- Linki logowania i rejestracji -->
                    <x-nav-link :href="route('login')" :active="request()->routeIs('login')" class="custom-nav-link">
                        {{ __('Log In') }}
                    </x-nav-link>
                    <x-nav-link :href="route('register')" :active="request()->routeIs('register')" class="custom-nav-link">
                        {{ __('Register') }}
                    </x-nav-link>
                @endguest

                @auth
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')" class="custom-nav-link">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}" >
                            @csrf

                            <x-dropdown-link :href="route('logout') " class="custom-nav-link"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
                @endauth
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="flex items-center justify-end space-x-4 px-4 py-2 bg-gray-200">
    <button id="increase-font" class="btn btn-cz">Zwiększ czcionkę</button>
    <button id="toggle-contrast" class="btn btn-ko">Wysoki kontrast</button>
</div>

        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            @auth
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            @endauth
            <!-- Linki do aktorów, autorów, typów filmów i filmów -->
            <x-responsive-nav-link :href="route('film.index')" :active="request()->routeIs('film.index')">
                {{ __('Filmy') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('aktor.index')" :active="request()->routeIs('aktor.index')">
                {{ __('Aktorzy') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('autor.index')" :active="request()->routeIs('autor.index')">
                {{ __('Autorzy') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('typfilmu.index')" :active="request()->routeIs('typfilmu.index')">
                {{ __('Typy Filmów') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            @auth
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

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
            @endauth
        </div>
    </div>
</nav>
