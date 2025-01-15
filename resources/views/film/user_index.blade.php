@extends('layouts.app2')

@section('content')

<div class="container">
    <h1 class="my-4">Moje Filmy</h1>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    
    <form action="{{ route('film.user_index') }}" method="GET" class="d-inline ms-3">
        <label for="search" class="me-2">Wyszukaj:</label>
        <input type="text" name="search" id="search" class="form-control d-inline" style="width: 200px;" value="{{ request('search') }}">
        <button type="submit" class="btn btn-primary ms-2">Szukaj</button>
    </form>
    <br>
    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Tytuł</th>
                <th>Data Premiery</th>
                <th>Autor</th>
                <th>Opis</th>
                <th>Akcje</th>
            </tr>
        </thead>
        <tbody>
            @foreach($filmy as $film)
                <tr>
                    <td>{{ $loop->iteration + ($filmy->currentPage() - 1) * $filmy->perPage() }}</td>
                    <td>{{ $film->tytul }}</td>
                    <td>{{ $film->data_premiery }}</td>
                    <td>{{ $film->autorzy ? $film->autorzy->imie . ' ' . $film->autorzy->nazwisko : 'Brak autora' }}</td>
                    <td>{{ Str::limit($film->opis, 100) }}</td>
                    <td class="przyciski d-flex justify-content-start gap-2">
                        <a href="{{ route('film.show', $film->id) }}" class="btn btn-info btn-sm">Zobacz</a>

                        @if(auth()->user()->role == 'admin' || auth()->id() == $film->user_id)
                            <a href="{{ route('film.edit', $film->id) }}" class="btn btn-warning btn-sm">Edytuj</a>
                            <form action="{{ route('film.destroy', $film->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Czy na pewno chcesz usunąć ten film? Ta akcja jest nieodwracalna.')">Usuń</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <br>
    <div>
        <div class="asd" style="margin-right: 650px">
            {{ $filmy->links() }}
        </div>
        
        <form action="{{ route('film.user_index') }}" method="GET" class="d-inline ms-3">
            <label for="page" class="me-2">Idź do strony:</label>
            <input type="number" name="page" id="page" min="1" max="{{ $filmy->lastPage() }}" class="form-control d-inline" style="width: 80px;" value="{{ $filmy->currentPage() }}">
            <button type="submit" class="btn btn-primary ms-2">Idź</button>
        </form>
        <br>
    </div>
</div>

@endsection
