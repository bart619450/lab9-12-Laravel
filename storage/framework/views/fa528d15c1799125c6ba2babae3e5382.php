

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1 class="my-4">Dodaj Nowy Film</h1>
    <div class="container my-5">
        <form method="POST" action="<?php echo e(route('film.store')); ?>">
            <?php echo csrf_field(); ?>
            <div class="row">
                <!-- Tytul -->
                <div class="col-md-6 mb-3">
                    <label for="tytul" class="form-label">Tytuł</label>
                    <input type="text" class="form-control" id="tytul" name="tytul" required>
                </div>

                <!-- Data premiery -->
                <div class="col-md-6 mb-3">
                    <label for="data_premiery" class="form-label">Data Premiery</label>
                    <input type="date" class="form-control" id="data_premiery" name="data_premiery" required>
                </div>
            </div>

            <div class="row">
                <!-- Opis -->
                <div class="col-md-12 mb-3">
                    <label for="opis" class="form-label">Opis</label>
                    <textarea class="form-control" id="opis" name="opis"></textarea>
                </div>
            </div>

            <div class="row">
                <!-- Typy Filmów -->
                <div class="col-md-6 mb-3">
                    <label for="typyfilmow" class="form-label">Typy Filmu</label>
                    <select multiple id="typyfilmow" name="typyfilmow[]" class="form-control">
                        <?php $__currentLoopData = $typyfilmow; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $typ): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($typ->id); ?>"><?php echo e($typ->nazwa); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <!-- Aktorzy -->
                <div class="col-md-6 mb-3">
                    <label for="aktorzy" class="form-label">Aktorzy</label>
                    <select multiple id="aktorzy" name="aktorzy[]" class="form-control">
                        <?php $__currentLoopData = $aktorzy; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $aktor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($aktor->id); ?>"><?php echo e($aktor->imie); ?> <?php echo e($aktor->nazwisko); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>

            <!-- Autor -->
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="autor_id" class="form-label">Autor</label>
                    <select class="form-control" id="autor_id" name="autor_id">
                        <option value="">Wybierz autora</option>
                        <?php $__currentLoopData = $autorzy; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $autor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($autor->id); ?>"><?php echo e($autor->imie); ?> <?php echo e($autor->nazwisko); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>

            <!-- Przycisk -->
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Zapisz Film</button>
            </div>
            <a href="<?php echo e(route('aktor.index')); ?>" class="btn btn-secondary">Anuluj</a>
        </form>
    </div>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\20461\projekt\resources\views/film/create.blade.php ENDPATH**/ ?>