<div class="mb-3">
    <label for="name" class="form-label">Tytul</label>
    <input type="text" class="form-control" id="tytul" name="tytul" value="{{ old('tytul', $film->tytul ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="population" class="form-label">Data premiery</label>
    <input type="date" class="form-control" id="data_premiery" name="data_premiery" value="{{ old('data_premiery', $film->data_premiery ?? '') }}">
</div>

<div class="mb-3">
    <label for="description" class="form-label">Opis</label>
    <textarea class="form-control" id="opis" name="opis">{{ old('opis', $film->opis ?? '') }}</textarea>
</div>

<div class="mb-3">
    <label for="typyfilmow" class="form-label">Typ Filmu</label>
    <select multiple class="form-control" id="typyfilmow" name="typyfilmow[]">
        @foreach($typyfilmow as $film_typ)
            <option value="{{ $film_typ->id }}" {{ in_array($film_typ->id, old('typyfilmow', $film->typyfilmow->pluck('id')->toArray() ?? [])) ? 'selected' : '' }}>
                {{ $film_typ->nazwa }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="aktorzy" class="form-label">Aktorzy</label>
    <select multiple class="form-control" id="aktorzy" name="aktorzy[]">
        @foreach($aktorzy as $aktor)
            <option value="{{ $aktor->id }}" {{ in_array($aktor->id, old('aktorzy', $film->aktorzy->pluck('id')->toArray() ?? [])) ? 'selected' : '' }}>
                {{ $aktor->imie }} {{ $aktor->nazwisko }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="autor_id" class="form-label">Autor</label>
    <select class="form-control" id="autor_id" name="autor_id">
        @foreach($autorzy as $autor)
            <option value="{{ $autor->id }}" {{ old('autor_id', $film->autor_id) == $autor->id ? 'selected' : '' }}>
                {{ $autor->imie }} {{ $autor->nazwisko }}
            </option>
        @endforeach
    </select>
</div>
