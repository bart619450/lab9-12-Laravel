@extends('layouts.app2')

@section('content')
<div class="container">
    <h1 class="my-4">Dodaj Nowego Aktora</h1>
    <div class="container my-5">
        <form method="POST" action="{{ route('aktor.store') }}">
            @csrf
            <div class="row">
                <!-- Tytul -->
                <div class="col-md-6 mb-3">
                    <label for="imie" class="form-label">Imie</label>
                    <input type="text" class="form-control" id="imie" name="imie" required>
                </div>

                <!-- Data premiery -->
                <div class="col-md-6 mb-3">
                    <label for="nazwisko" class="form-label">Nazwisko</label>
                    <input type="text" class="form-control" id="nazwisko" name="nazwisko" required>
                </div>
            </div>


            <div class="row">
                <!-- Typy Filmów -->
                <div class="col-md-6 mb-3">
                    <label for="filmy" class="form-label">Filmy</label>
                    <select multiple id="filmy" name="filmy[]" class="form-control">
                        @foreach($filmy as $film)
                            <option value="{{ $film->id }}">{{ $film->tytul }}</option>
                        @endforeach
                    </select>
                </div>

            <!-- Przycisk -->
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Zapisz Aktora</button>
            </div>
            <a href="{{ route('aktor.index') }}" class="btn btn-secondary">Anuluj</a>
        </form>
    </div>
</div>

<!-- Inicjalizacja Choices.js -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var element = document.getElementById('filmy');
        var choices = new Choices(element, {
            removeItemButton: true,
            searchEnabled: false,
            itemSelectText: 'Kliknij, aby wybrać',
            placeholderValue: 'Wybierz filmy'
        });

        
    });
</script>
@endsection