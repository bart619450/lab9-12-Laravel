<div class="container my-5">
    <form method="POST" action="{{ route('typfilmu.store') }}">
        @csrf
        <div class="row">
            <!-- Tytul -->
            <div class="col-md-6 mb-3">
                <label for="nazwa" class="form-label">Nazwa</label>
                <input type="text" class="form-control" id="nazwa" name="nazwa" value="{{ old('nazwa', $typfilmu->nazwa ?? '') }}" required>
            </div>
        </div>

        <div class="row">
            <!-- Filmy -->
            <div class="col-md-6 mb-3">
                <label for="filmy" class="form-label">Filmy</label>
                <select multiple id="filmy" name="filmy[]" class="form-control">
                    @foreach($filmy as $film)
                        <option value="{{ $film->id }}" {{ in_array($film->id, old('filmy', $typfilmu->filmy->pluck('id')->toArray() ?? [])) ? 'selected' : '' }}>
                            {{ $film->tytul }}
                        </option>
                    @endforeach
                </select>
            </div>

        <!-- Przycisk -->
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">Zapisz Typ Filmu</button>
        </div>
    </form>
</div>


<!-- Inicjalizacja Choices.js -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var element = document.getElementById('filmy');
        var choices = new Choices(element, {
            removeItemButton: true,
            searchEnabled: false,
            itemSelectText: 'Kliknij, aby wybrać',
            placeholderValue: 'Wybierz filmy',
        });

    });
</script>

