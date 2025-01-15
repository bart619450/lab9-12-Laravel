

<?php $__env->startSection('content'); ?>

<div class="container">
    <h1 class="my-4">Moje Typy Filmów</h1>
    
    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>
    
    <form action="<?php echo e(route('typfilmu.user_index')); ?>" method="GET" class="d-inline ms-3">
        <label for="search" class="me-2">Wyszukaj:</label>
        <input type="text" name="search" id="search" class="form-control d-inline" style="width: 200px;" value="<?php echo e(request('search')); ?>">
        <button type="submit" class="btn btn-primary ms-2">Szukaj</button>
    </form>
    <br>
    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Nazwa</th>
                <th>Akcje</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $typyfilmow; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $typfilmu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($loop->iteration + ($typyfilmow->currentPage() - 1) * $typyfilmow->perPage()); ?></td>
                    <td><?php echo e($typfilmu->nazwa); ?></td>
                    <td class="przyciski d-flex justify-content-start gap-2">
                        <a href="<?php echo e(route('typfilmu.show', $typfilmu->id)); ?>" class="btn btn-info btn-sm">Zobacz</a>

                        <?php if(auth()->user()->role == 'admin' || auth()->id() == $typfilmu->user_id): ?>
                            <a href="<?php echo e(route('typfilmu.edit', $typfilmu->id)); ?>" class="btn btn-warning btn-sm">Edytuj</a>
                            <form action="<?php echo e(route('typfilmu.destroy', $typfilmu->id)); ?>" method="POST" class="d-inline">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Czy na pewno chcesz usunąć ten Typ Filmu? Ta akcja jest nieodwracalna.')">Usuń</button>
                            </form>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <br>
    <div>
        <div class="asd" style="margin-right: 650px">
            <?php echo e($typyfilmow->links()); ?>

        </div>
        
        <form action="<?php echo e(route('typfilmu.user_index')); ?>" method="GET" class="d-inline ms-3">
            <label for="page" class="me-2">Idź do strony:</label>
            <input type="number" name="page" id="page" min="1" max="<?php echo e($typyfilmow->lastPage()); ?>" class="form-control d-inline" style="width: 80px;" value="<?php echo e($typyfilmow->currentPage()); ?>">
            <button type="submit" class="btn btn-primary ms-2">Idź</button>
        </form>
        <br>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\20461\projekt\resources\views/typfilmu/user_index.blade.php ENDPATH**/ ?>