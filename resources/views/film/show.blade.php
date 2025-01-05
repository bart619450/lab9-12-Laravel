@extends('layouts.app2')

@section('content')
<div class="container">
@if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <!-- Informacja o tym, kto dodał film -->
    <p><strong>Film dodany przez:</strong> {{ $film->user->name ?? 'Admin' }}</p>

    <p><strong>Tytul:</strong> {{ $film->tytul }}</p>
    <p><strong>Opis:</strong> {{ $film->opis }}</p>
    <p><strong>Data premiery:</strong> {{ $film->data_premiery }}</p>
    <p><strong>Autor:</strong> {{ $film->getAutorName() }}</p>
    <p><strong>Typ filmu:</strong> {{ $film->typyfilmow->pluck('nazwa')->join(', ') ?: 'Brak typu' }}</p>
    <p><strong>Aktorzy:</strong></p>
    <ul>
        @foreach ($film->aktorzy as $aktor)
            <li><strong>Imie:</strong> {{ $aktor->imie }} <strong>Nazwisko:</strong> {{ $aktor->nazwisko }}</li>
        @endforeach
    </ul>
    
    <h3>Średnia ocena krytyków:</h3>
<p>
    @if($sredniaOcenaKrytykow)
        {{ number_format($sredniaOcenaKrytykow, 2) }}
    @else
        Brak ocen krytyków
    @endif
</p>

<h3>Średnia ocena użytkowników:</h3>
<p>
    @if($sredniaOcenaUzytkownikow)
        {{ number_format($sredniaOcenaUzytkownikow, 2) }}
    @else
        Brak ocen użytkowników
    @endif
</p>


    @auth
    <h3>Oceń film:</h3>
    <form action="{{ route('film.ocena', $film->id) }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="ocena" class="form-label">Ocena (1-10):</label>
        <input type="number" class="form-control" id="ocena" name="ocena" min="1" max="10" required>
    </div>

    <!-- Sprawdzenie roli i odpowiednie wyświetlenie komunikatu -->
    @if(auth()->user()->role == 'krytyk' || auth()->user()->role == 'admin')
        <input type="hidden" name="typ_oceny" value="krytyk">
    @else
        <input type="hidden" name="typ_oceny" value="uzytkownik">
    @endif

    <button type="submit" class="btn btn-primary">Dodaj ocenę</button>
</form>
    @else
    <p>Musisz być zalogowany, aby ocenić film.</p>
    @endauth

    <h3>Komentarze:</h3>
    <ul>
    @forelse ($film->komentarze as $komentarz)
    @if ($komentarz->user)
        <li><strong>{{ $komentarz->user->name }}:</strong> {{ $komentarz->tresc }} <small>({{ $komentarz->created_at->format('d-m-Y') }})</small></li>
    @else
        <li><strong>Nieznany użytkownik:</strong> {{ $komentarz->tresc }} <small>({{ $komentarz->created_at->format('d-m-Y') }})</small></li>
    @endif
    @empty
        <li>Brak komentarzy</li>
    @endforelse
    </ul>

    <!-- Formularz dodawania komentarza -->
    @auth
    <h3>Dodaj komentarz:</h3>
    <form action="{{ route('komentarz.store', $film->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <textarea class="form-control" name="tresc" rows="3" placeholder="Wpisz komentarz..." required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Dodaj komentarz</button>
    </form>
    @else
    <p>Musisz być zalogowany, aby dodać komentarz.</p>
    @endauth

    <a href="{{ route('film.index') }}" class="btn btn-secondary">Powróć do listy</a>
</div>
@endsection
