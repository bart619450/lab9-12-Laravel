<x-app-layout>
<div class="container">
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <!-- Reszta zawartości strony -->
</div>
    <div class="container mx-auto py-12">
        


        <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-6">
            {{ __('Dashboard') }}
        </h2>

        @if(auth()->user()->role == 'krytyk')  
            <h3 class="text-lg font-semibold mb-4"> Posiadasz rolę:"Krytyk" </h3>
        @endif
        @if(auth()->user()->role == 'admin')
        <h3 class="text-lg font-semibold mb-4"> Posiadasz rolę:"Administrator" </h3>
        @endif
        @if(auth()->user()->role == 'user')
        <h3 class="text-lg font-semibold mb-4"> Posiadasz rolę:"Użytkownik" </h3>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
            <!-- Sekcja Filmów -->
            <div class="bg-white shadow-sm rounded-lg p-6">
                <h3 class="text-lg font-semibold mb-4">Twoje Filmy</h3>
                <a href="{{ route('film.user_index') }}" class="btn btn-primary">Zobacz moje filmy</a>
            </div>

            <div class="bg-white shadow-sm rounded-lg p-6">
                <h3 class="text-lg font-semibold mb-4">Twoi Aktorzy</h3>
                <a href="{{ route('aktor.user_index') }}" class="btn btn-primary">Zobacz moich aktorów</a>
            </div>

            <div class="bg-white shadow-sm rounded-lg p-6">
                <h3 class="text-lg font-semibold mb-4">Twoi Autorzy</h3>
                <a href="{{ route('autor.user_index') }}" class="btn btn-primary">Zobacz moich autorów</a>
            </div>

            <div class="bg-white shadow-sm rounded-lg p-6">
                <h3 class="text-lg font-semibold mb-4">Twoje Typy filmów</h3>
                <a href="{{ route('typfilmu.user_index') }}" class="btn btn-primary">Zobacz moje Typy Filmów</a>
            </div>

        </div>
        
        @if(auth()->user()->role == 'user')
        <div class="request">
                <h3 class="text-lg font-semibold mb-4">Wniosek o przyznanie roli krytyka</h3>
            <form action="{{ route('role_request.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="reason" class="block text-sm font-medium text-gray-700">Powód</label>
                    <textarea name="reason" id="reason" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Wyślij prośbę</button>
            </form>
            </div>
            @endif
            

    </div>
</x-app-layout>
