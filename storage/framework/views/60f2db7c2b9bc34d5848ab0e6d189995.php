<div class="container my-5">
    <form method="POST" action="<?php echo e(route('typfilmu.store')); ?>">
        <?php echo csrf_field(); ?>
        <div class="row">
            <!-- Tytul -->
            <div class="col-md-6 mb-3">
                <label for="nazwa" class="form-label">Nazwa</label>
                <input type="text" class="form-control" id="nazwa" name="nazwa" value="<?php echo e(old('nazwa', $typfilmu->nazwa ?? '')); ?>" required>
            </div>
        </div>

        <div class="row">
            <!-- Filmy -->
            <div class="col-md-6 mb-3">
                <label for="filmy" class="form-label">Filmy</label>
                <select multiple id="filmy" name="filmy[]" class="form-control">
                    <?php $__currentLoopData = $filmy; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $film): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($film->id); ?>" <?php echo e(in_array($film->id, old('filmy', $typfilmu->filmy->pluck('id')->toArray() ?? [])) ? 'selected' : ''); ?>>
                            <?php echo e($film->tytul); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

<?php /**PATH C:\xampp\htdocs\20461\projekt\resources\views/typfilmu/partials/form.blade.php ENDPATH**/ ?>