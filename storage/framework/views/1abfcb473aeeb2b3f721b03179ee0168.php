

<?php $__env->startSection('content'); ?>

<div class="container">
    <h1 class="my-4">Film Database</h1>
    <a href="<?php echo e(route('film.create')); ?>" class="btn btn-primary mb-3">Dodaj nowy film <br></a>
    
    
    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>
    
    <form action="<?php echo e(route('film.index')); ?>" method="GET" class="d-inline ms-3">
            <label for="search" class="me-2">Wyszukaj:</label>
            <input type="text" name="search" id="search" class="form-control d-inline" style="width: 200px;" value="<?php echo e(request('search')); ?>">
            <button type="submit" class="btn btn-primary ms-2">Szukaj</button>
        </form>
        <br>
    <table class="table table-bordered ">
        <thead>
            <tr>
                <th>#</th>
                <th>Tytuł</th>
                <th>Data Premiery</th>
                <th>Autor</th>
                <th>Opis</th>
                <th>Akcje</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $filmy; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $film): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($loop->iteration + ($filmy->currentPage() - 1) * $filmy->perPage()); ?></td>
                    <td class="wide-column"><?php echo e($film->tytul); ?></td>
                    <td><?php echo e($film->data_premiery); ?></td>
                    <td><?php echo e($film->autorzy ? $film->autorzy->imie . ' ' . $film->autorzy->nazwisko : 'Brak autora'); ?></td>
                    <td class="wide-column"><?php echo e(Str::limit($film->opis, 100)); ?></td>
                    <td class="narrow-column d-flex justify-content-start gap-2">
                        <a href="<?php echo e(route('film.show', $film->id)); ?>" class="btn btn-info btn-sm">Zobacz</a>

                        <!-- Sprawdzamy, czy użytkownik jest administratorem lub autorem filmu -->
                        <?php if(auth()->user()->role == 'admin' || auth()->id() == $film->user_id): ?>

                            <a href="<?php echo e(route('film.edit', $film->id)); ?>" class="btn btn-warning btn-sm">Edytuj</a>

                            <form action="<?php echo e(route('film.destroy', $film->id)); ?>" method="POST" class="d-inline">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Czy na pewno chcesz usunąć ten film? Ta akcja jest nieodwracalna.')">Usuń</button>
                            </form>
                        <?php endif; ?>
                    </td>

                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <!-- Przyciski paginacji wyrównane do lewej -->
     <br>
    <div >
        <div class="asd" style="margin-right: 650px">
        
            <?php echo e($filmy->links()); ?>

            
        </div>
        
        <form action="<?php echo e(route('film.index')); ?>" method="GET" class="d-inline ms-3">
            <label for="page" class="me-2">Idź do strony:</label>
            <input type="number" name="page" id="page" min="1" max="<?php echo e($filmy->lastPage()); ?>" class="form-control d-inline" style="width: 80px;" value="<?php echo e($filmy->currentPage()); ?>">
            <button type="submit" class="btn btn-primary ms-2">Idź</button>
        </form>
        <br>
         <!-- Formularz do wyszukiwania -->
         
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\20461\projekt\resources\views/film/index.blade.php ENDPATH**/ ?>