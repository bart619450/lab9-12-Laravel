<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Filmowersum
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Krótki opis strony -->
                    <p class="text-lg text-gray-600">
                        Wszystkie filmy, aktorzy oraz autorzy w jednym miejscu. Odkryj świat kina w pełni.
                    </p>
                    <div class="mt-8 text-center">
                        @guest
                            <a href="{{ route('login') }}" class="inline-block px-6 py-3 text-black bg-blue-500 hover:bg-blue-700 rounded-md">
                                Zaloguj się, aby rozpocząć
                            </a>
                        @else
                            <a href="{{ route('dashboard') }}" class="inline-block px-6 py-3 text-black bg-blue-500 hover:bg-blue-700 rounded-md">
                                Przejdź do swojego panelu
                            </a>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
