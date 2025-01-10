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

    
    <p><strong>Aktor dodany przez:</strong> {{ $aktor->user->name ?? 'Admin' }}</p>
    <p class="poka">Imie: <strong>{{ $aktor->imie }}</strong></p>
    <p class="poka">Nazwisko:<strong>{{ $aktor->nazwisko }} </strong></p>
    <p class="poka">Filmy:</p>
    <ul class="actor-list">
        @foreach ($aktor->filmy as $film)
            <li><strong>{{ $film->tytul }}</strong> <small>{{$film->data_premiery }}</small></li>
        @endforeach
    </ul>
    

    
    <br>
    <a href="{{ route('aktor.index') }}" class="btn btn-secondary">Powróć do listy</a>
    <br>
    <br>
</div>
@endsection
