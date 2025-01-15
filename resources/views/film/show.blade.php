@extends('layouts.app2')

@section('content')
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

    
    <p><strong>Film dodany przez:</strong> {{ $film->user->name ?? 'Admin' }}</p>
    <p class="poka">Tytul: <strong>{{ $film->tytul }}</strong></p>
    <p class="poka">Opis:<strong>{{ $film->opis }} </strong></p>
    <p class="poka">Data premiery: <strong>{{ $film->data_premiery }}</strong></p>
    <p class="poka">Autor: <strong>{{ $film->getAutorName() }}</strong></p>
    <p class="poka">Typ filmu: <strong>{{ $film->typyfilmow->pluck('nazwa')->join(', ') ?: 'Brak typu' }}</strong></p>
    
    <p class="poka">Aktorzy:</p>
    <ul class="actor-list">
        @foreach ($film->aktorzy as $aktor)
            <li><strong>{{ $aktor->imie }} {{ $aktor->nazwisko }}</strong></li>
        @endforeach
    </ul>
    <div class="tlo">
    <div class="rating-container">
        <div class="rating-box">
            <h3>Średnia ocena krytyków:</h3>
            <p>
                @if($sredniaOcenaKrytykow)
                    {{ number_format($sredniaOcenaKrytykow, 2) }}
                @else
                    Brak ocen krytyków
                @endif
            </p>
        </div>

        <div class="rating-box">
            <h3>Średnia ocena użytkowników:</h3>
            <p>
                @if($sredniaOcenaUzytkownikow)
                    {{ number_format($sredniaOcenaUzytkownikow, 2) }}
                @else
                    Brak ocen użytkowników
                @endif
            </p>
        </div>
    </div>

    @auth
        
        <h3 class="rating-text">Oceń film:</h3>
        <form action="{{ route('film.ocena', $film->id) }}" method="POST">
        @csrf
        <div class="rating-stars">
            <label for="ocena">Ocena (1-10):</label>
            <div class="star-rating">
                @for($i = 1; $i <= 10; $i++)
                    <input type="radio" id="star{{ $i }}" name="ocena" value="{{ $i }}" @if(old('ocena') == $i) checked @endif>
                    <label for="star{{ $i }}">{{ $i }}</label>
                @endfor
            </div>
        </div>

        @if(auth()->user()->role == 'krytyk' || auth()->user()->role == 'admin')
            <input type="hidden" name="typ_oceny" value="krytyk">
        @else
            <input type="hidden" name="typ_oceny" value="uzytkownik">
        @endif
        <div class=blklvm>
        <button type="submit" class="btn btn-ocena">Dodaj ocenę</button>
        </div>
    </form>

        @else
        <p>Musisz być zalogowany, aby ocenić film.</p>
</div>
    @endauth


    <h3 class="komkom">Komentarze:</h3>
    @auth
    <form action="{{ route('komentarz.store', $film->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <textarea class="koment" name="tresc" rows="3" placeholder="Wpisz komentarz..." required></textarea>
        </div>
        <button type="submit" class="btn btn-kom">Dodaj komentarz</button>
    </form>
    @else
    <p>Musisz być zalogowany, aby dodać komentarz.</p>
    @endauth
    <ul class="comment-list">
    @forelse ($film->komentarze as $komentarz)
    <li class="comment-box">
        @if ($komentarz->user)
            <strong>{{ $komentarz->user->name }}:</strong> {{ $komentarz->tresc }} 
            <small>({{ $komentarz->created_at->format('d-m-Y') }})</small>
            
            <!-- Sprawdzenie, czy użytkownik jest autorem komentarza lub adminem -->
            @if ($komentarz->user_id == auth()->id() || auth()->user()->role == 'admin')
                <!-- Opcja usuwania komentarza -->
                <form action="{{ route('komentarz.delete', $komentarz->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Usuń</button>
                </form>
            @endif
        @else
            <strong>Nieznany użytkownik:</strong> {{ $komentarz->tresc }} 
            <small>({{ $komentarz->created_at->format('d-m-Y') }})</small>
        @endif
    </li>
@empty
    <li class="brak">Brak komentarzy</li>
@endforelse

    </ul>

    

    <a href="{{ route('film.index') }}" class="btn btn-secondary">Powróć do listy</a>
    <br>
    <br>
</div>
@endsection
