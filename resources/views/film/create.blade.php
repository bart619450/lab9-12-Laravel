@extends('layouts.app2')

@section('content')
<div class="container">
    <h1 class="my-4">Dodaj Nowy Film</h1>
    <form action="{{ route('film.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="tytul" class="form-label">Tytuł</label>
            <input type="text" class="form-control" id="tytul" name="tytul" required>
        </div>
        <div class="mb-3">
            <label for="data_premiery" class="form-label">Data Premiery</label>
            <input type="date" class="form-control" id="data_premiery" name="data_premiery" required>
        </div>
        <div class="mb-3">
            <label for="autor_id" class="form-label">Autor</label>
            <select class="form-control" id="autor_id" name="autor_id" required>
                <option value="">Wybierz autora</option>
                @foreach($autorzy as $autor)
                    <option value="{{ $autor->id }}">{{ $autor->imie }} {{ $autor->nazwisko }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="opis" class="form-label">Opis</label>
            <textarea class="form-control" id="opis" name="opis"></textarea>
        </div>
        
        <!-- Dodanie pola do wyboru aktorów -->
        <div class="mb-3">
            <label for="aktorzy" class="form-label">Aktorzy</label>
            <select multiple class="form-control" id="aktorzy" name="aktorzy[]">
                @foreach($aktorzy as $aktor)
                    <option value="{{ $aktor->id }}">{{ $aktor->imie }} {{ $aktor->nazwisko }}</option>
                @endforeach
            </select>
        </div>

        <!-- Dodanie pola do wyboru typów filmu -->
        <div class="mb-3">
            <label for="typyfilmow" class="form-label">Typy Filmu</label>
            <select multiple class="form-control" id="typyfilmow" name="typyfilmow[]">
                @foreach($typyfilmow as $typ)
                    <option value="{{ $typ->id }}">{{ $typ->nazwa }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Zapisz Film</button>
    </form>
</div>
@endsection
