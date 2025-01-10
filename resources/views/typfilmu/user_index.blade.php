@extends('layouts.app2')

@section('content')

<div class="container">
    <h1 class="my-4">Moje Typy Filmów</h1>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    
    <form action="{{ route('typfilmu.user_index') }}" method="GET" class="d-inline ms-3">
        <label for="search" class="me-2">Wyszukaj:</label>
        <input type="text" name="search" id="search" class="form-control d-inline" style="width: 200px;" value="{{ request('search') }}">
        <button type="submit" class="btn btn-primary ms-2">Szukaj</button>
    </form>
    <br>
    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Nazwa</th>
                <th>Akcje</th>
            </tr>
        </thead>
        <tbody>
            @foreach($typyfilmow as $typfilmu)
                <tr>
                    <td>{{ $loop->iteration + ($typyfilmow->currentPage() - 1) * $typyfilmow->perPage() }}</td>
                    <td>{{ $typfilmu->nazwa }}</td>
                    <td class="przyciski d-flex justify-content-start gap-2">
                        <a href="{{ route('typfilmu.show', $typfilmu->id) }}" class="btn btn-info btn-sm">Zobacz</a>

                        @if(auth()->user()->role == 'admin' || auth()->id() == $typfilmu->user_id)
                            <a href="{{ route('typfilmu.edit', $typfilmu->id) }}" class="btn btn-warning btn-sm">Edytuj</a>
                            <form action="{{ route('typfilmu.destroy', $typfilmu->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Czy na pewno chcesz usunąć ten Typ Filmu? Ta akcja jest nieodwracalna.')">Usuń</button>
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
            {{ $typyfilmow->links() }}
        </div>
        
        <form action="{{ route('typfilmu.user_index') }}" method="GET" class="d-inline ms-3">
            <label for="page" class="me-2">Idź do strony:</label>
            <input type="number" name="page" id="page" min="1" max="{{ $typyfilmow->lastPage() }}" class="form-control d-inline" style="width: 80px;" value="{{ $typyfilmow->currentPage() }}">
            <button type="submit" class="btn btn-primary ms-2">Idź</button>
        </form>
        <br>
    </div>
</div>

@endsection
