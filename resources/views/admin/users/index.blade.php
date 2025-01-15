<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Lista użytkowników
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <!-- Formularz wyszukiwania -->
                    <form action="{{ route('admin.users.index') }}" method="GET" class="mb-4 flex gap-2">
                        <label for="search" class="sr-only">Wyszukaj:</label>
                        <input type="text" name="search" id="search" value="{{ $search ?? '' }}" 
                               class="border-gray-300 rounded-md" placeholder="Wyszukaj użytkownika...">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">
                            Szukaj
                        </button>
                    </form>

                    <!-- Tabela użytkowników -->
                    <table class="table-auto w-full border">
                        <thead>
                            <tr>
                                <th class="border px-4 py-2">#</th>
                                <th class="border px-4 py-2">ID</th>
                                <th class="border px-4 py-2">Imię</th>
                                <th class="border px-4 py-2">Email</th>
                                <th class="border px-4 py-2">Rola</th>
                                <th class="border px-4 py-2">Akcje</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $index => $user)
                                <tr>
                                    <td class="border px-4 py-2">{{ $index + 1 + ($users->currentPage() - 1) * $users->perPage() }}</td>
                                    <td class="border px-4 py-2">{{ $user->id }}</td>
                                    <td class="border px-4 py-2">{{ $user->name }}</td>
                                    <td class="border px-4 py-2">{{ $user->email }}</td>
                                    <td class="border px-4 py-2">{{ $user->role }}</td>
                                    <td class="border px-4 py-2">
                                        <a href="{{ route('admin.users.edit', $user) }}" class="text-blue-500 hover:underline ">
                                            Edytuj
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Paginacja -->
                    <div class="szukaj">
                        {{ $users->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
