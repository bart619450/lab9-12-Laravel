@extends('layouts.app2')

@section('content')

<div class="container">
    <h1 class="my-4">Moi Autorzy</h1>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    
    <form action="{{ route('autor.user_index') }}" method="GET" class="d-inline ms-3">
        <label for="search" class="me-2">Wyszukaj:</label>
        <input type="text" name="search" id="search" class="form-control d-inline" style="width: 200px;" value="{{ request('search') }}">
        <button type="submit" class="btn btn-primary ms-2">Szukaj</button>
    </form>
    <br>
    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Imie</th>
                <th>Nazwisko</th>
                <th>Akcje</th>
            </tr>
        </thead>
        <tbody>
            @foreach($autorzy as $autor)
                <tr>
                    <td>{{ $loop->iteration + ($autorzy->currentPage() - 1) * $autorzy->perPage() }}</td>
                    <td>{{ $autor->imie }}</td>
                    <td>{{ $autor->nazwisko }}</td>
                    <td class="przyciski d-flex justify-content-start gap-2">
                        <a href="{{ route('autor.show', $autor->id) }}" class="btn btn-info btn-sm">Zobacz</a>

                        @if(auth()->user()->role == 'admin' || auth()->id() == $autor->user_id)
                            <a href="{{ route('autor.edit', $autor->id) }}" class="btn btn-warning btn-sm">Edytuj</a>
                            <form action="{{ route('autor.destroy', $autor->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Czy na pewno chcesz usunąć tego autora? Ta akcja jest nieodwracalna.')">Usuń</button>
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
            {{ $autorzy->links() }}
        </div>
        
        <form action="{{ route('autor.user_index') }}" method="GET" class="d-inline ms-3">
            <label for="page" class="me-2">Idź do strony:</label>
            <input type="number" name="page" id="page" min="1" max="{{ $autorzy->lastPage() }}" class="form-control d-inline" style="width: 80px;" value="{{ $autorzy->currentPage() }}">
            <button type="submit" class="btn btn-primary ms-2">Idź</button>
        </form>
        <br>
    </div>
</div>

@endsection
