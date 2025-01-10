

@extends('layouts.app2')

@section('content')

<div class="container">
    <h1 class="my-4">Aktor Database</h1>
    <a href="{{ route('aktor.create') }}" class="btn btn-primary mb-3">Dodaj nowego aktora <br></a>
    
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    
    <form action="{{ route('aktor.index') }}" method="GET" class="d-inline ms-3">
            <label for="search" class="me-2">Wyszukaj:</label>
            <input type="text" name="search" id="search" class="form-control d-inline" style="width: 200px;" value="{{ request('search') }}">
            <button type="submit" class="btn btn-primary ms-2">Szukaj</button>
        </form>
        <br>
    <table class="table table-bordered ">
        <thead>
            <tr>
                <th>#</th>
                <th>Imie</th>
                <th>Nazwisko</th>
                <th>Akcje</th>
            </tr>
        </thead>
        <tbody>
            @foreach($aktorzy as $aktor)
                <tr>
                    <td>{{ $loop->iteration + ($aktorzy->currentPage() - 1) * $aktorzy->perPage() }}</td>
                    <td>{{ $aktor->imie }}</td>
                    <td>{{ $aktor->nazwisko }}</td>
                    <td class="przyciski d-flex justify-content-start gap-2">
                        <a href="{{ route('aktor.show', $aktor->id) }}" class="btn btn-info btn-sm">Zobacz</a>

                       
                        @if(auth()->user()->role == 'admin' || auth()->id() == $aktor->user_id)

                            <a href="{{ route('aktor.edit', $aktor->id) }}" class="btn btn-warning btn-sm">Edytuj</a>

                            <form action="{{ route('aktor.destroy', $aktor->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Czy na pewno chcesz usunąć tego aktora? Ta akcja jest nieodwracalna.')">Usuń</button>
                            </form>
                        @endif
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Przyciski paginacji wyrównane do lewej -->
     <br>
    <div >
        <div class="asd" style="margin-right: 650px">
        
            {{ $aktorzy->links() }}
            
        </div>
        
        <form action="{{ route('aktor.index') }}" method="GET" class="d-inline ms-3">
            <label for="page" class="me-2">Idź do strony:</label>
            <input type="number" name="page" id="page" min="1" max="{{ $aktorzy->lastPage() }}" class="form-control d-inline" style="width: 80px;" value="{{ $aktorzy->currentPage() }}">
            <button type="submit" class="btn btn-primary ms-2">Idź</button>
        </form>
        <br>
         <!-- Formularz do wyszukiwania -->
         
    </div>
</div>

@endsection
