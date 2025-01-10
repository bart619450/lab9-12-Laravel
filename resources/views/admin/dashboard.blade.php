<!-- resources/views/admin/dashboard.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Panel Admina
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-xl font-semibold mb-4">Zarządzanie użytkownikami</h3>
                    <ul class="space-y-2">
                        <li>
                            <a href="{{ route('admin.users.index') }}" class="text-indigo-500 hover:text-indigo-600">
                                Edytuj użytkowników
                            </a>
</br>
                            <a href="{{ route('admin.request.index') }}" class="text-indigo-500 hover:text-indigo-600">
                                Prosby o przyznanie roli
                            </a>
                        </li>
                    </ul>

                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
