<div class="container my-5">
    <form method="POST" action="{{ route('film.store') }}">
        @csrf
        <div class="row">
            <!-- Tytul -->
            <div class="col-md-6 mb-3">
                <label for="tytul" class="form-label">Tytuł</label>
                <input type="text" class="form-control" id="tytul" name="tytul" value="{{ old('tytul', $film->tytul ?? '') }}" required>
            </div>

            <!-- Data premiery -->
            <div class="col-md-6 mb-3">
                <label for="data_premiery" class="form-label">Data premiery</label>
                <input type="date" class="form-control" id="data_premiery" name="data_premiery" value="{{ old('data_premiery', $film->data_premiery ?? '') }}">
            </div>
        </div>

        <div class="row">
            <!-- Opis -->
            <div class="col-md-12 mb-3">
                <label for="opis" class="form-label">Opis</label>
                <textarea class="form-control" id="opis" name="opis">{{ old('opis', $film->opis ?? '') }}</textarea>
            </div>
        </div>

        <div class="row">
            <!-- Typy Filmów -->
            <div class="col-md-6 mb-3">
                <label for="typyfilmow" class="form-label">Typ Filmu</label>
                <select multiple id="typyfilmow" name="typyfilmow[]" class="form-control">
                    @foreach($typyfilmow as $film_typ)
                        <option value="{{ $film_typ->id }}" {{ in_array($film_typ->id, old('typyfilmow', $film->typyfilmow->pluck('id')->toArray() ?? [])) ? 'selected' : '' }}>
                            {{ $film_typ->nazwa }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Aktorzy -->
            <div class="col-md-6 mb-3">
                <label for="aktorzy" class="form-label">Aktorzy</label>
                <select multiple id="aktorzy" name="aktorzy[]" class="form-control">
                    @foreach($aktorzy as $aktor)
                        <option value="{{ $aktor->id }}" {{ in_array($aktor->id, old('aktorzy', $film->aktorzy->pluck('id')->toArray() ?? [])) ? 'selected' : '' }}>
                            {{ $aktor->imie }} {{ $aktor->nazwisko }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Autor -->
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="autor_id" class="form-label">Autor</label>
                <select class="form-control" id="autor_id" name="autor_id">
                    @foreach($autorzy as $autor)
                        <option value="{{ $autor->id }}" {{ old('autor_id', $film->autor_id) == $autor->id ? 'selected' : '' }}>
                            {{ $autor->imie }} {{ $autor->nazwisko }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Przycisk -->
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">Zapisz Film</button>
        </div>
    </form>
</div>


<!-- Inicjalizacja Choices.js -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var element = document.getElementById('aktorzy');
        var choices = new Choices(element, {
            removeItemButton: true,
            searchEnabled: false,
            itemSelectText: 'Kliknij, aby wybrać',
            placeholderValue: 'Wybierz aktorów'
        });

        var elementTypy = document.getElementById('typyfilmow');
        var choicesTypy = new Choices(elementTypy, {
            removeItemButton: true,
            searchEnabled: false,
            itemSelectText: 'Kliknij, aby wybrać',
            placeholderValue: 'Wybierz typy filmów'
        });

        var elementAutor = document.getElementById('autor_id');
        var choicesAutor = new Choices(elementAutor, {
            removeItemButton: false, // Brak przycisku usuwania, ponieważ pozwalamy wybrać tylko jednego autora
            searchEnabled: true, // Włączenie opcji wyszukiwania w przypadku długiej listy autorów
            itemSelectText: 'Kliknij, aby wybrać autora',
            placeholderValue: 'Wybierz autora'
        });
    });
</script>

