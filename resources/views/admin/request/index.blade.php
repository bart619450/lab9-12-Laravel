<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Prośby o przyznanie roli Krytyka:
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-xl font-semibold mb-4">Zarządzanie Prośbami</h3>
                    
                    @forelse ($roleRequests as $request)
                        <div class="bg-white p-4 mb-4 shadow-sm rounded">
                            <h3>{{ $request->user->name }} ({{ $request->user->email }})</h3>
                            <p>{{ $request->reason }}</p>
                            <p>Status: {{ $request->status }}</p>
                            <form action="{{ route('role_request.approve', $request->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-primary">Zatwierdź</button>
                            </form>
                            <form action="{{ route('role_request.reject', $request->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-danger">Odrzuć</button>
                            </form>
                        </div>
                    @empty
                        <h3>Brak próśb o rolę krytyka</h3>
                    @endforelse

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
