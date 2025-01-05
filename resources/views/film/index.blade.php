@extends('layouts.app2')

@section('content')
<div class="container">
    <h1 class="my-4">Film Database</h1>
    <a href="{{ route('film.create') }}" class="btn btn-primary mb-3">Dodaj nowy film</a>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Tytul</th>
                <th>Data Premiery</th>
                <th>Autor</th>
                <th>Opis</th>
                <th>Akcje</th>
            </tr>
        </thead>
        <tbody>
            @foreach($filmy as $film)
                <tr>
                    <td>{{ $film->tytul }}</td>
                    <td>{{ $film->data_premiery }}</td>
                    <td>{{ $film->autorzy ? $film->autorzy->imie . ' ' . $film->autorzy->nazwisko : 'Brak autora' }}</td>
                    <td>{{ $film->opis }}</td>
                    <td>
                        <a href="{{ route('film.show', $film->id) }}" class="btn btn-info btn-sm">Zobacz</a>
                        <a href="{{ route('film.edit', $film->id) }}" class="btn btn-warning btn-sm">Edytuj</a>
                        <form action="{{ route('film.destroy', $film->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Czy na pewno chcesz usunąć ten film? Ta akcja jest nieodwracalna.')">Usuń</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
