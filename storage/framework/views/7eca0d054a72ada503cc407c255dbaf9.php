

<?php $__env->startSection('content'); ?>
<div class="container">
    <?php if(session('error')): ?>
        <div class="alert alert-danger">
            <?php echo e(session('error')); ?>

        </div>
    <?php endif; ?>

    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>
    <?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>

    <!-- Reszta zawartości strony -->
</div>

    
    <p><strong>Aktor dodany przez:</strong> <?php echo e($aktor->user->name ?? 'Admin'); ?></p>
    <p class="poka">Imie: <strong><?php echo e($aktor->imie); ?></strong></p>
    <p class="poka">Nazwisko:<strong><?php echo e($aktor->nazwisko); ?> </strong></p>
    <p class="poka">Filmy:</p>
    <ul class="actor-list">
        <?php $__currentLoopData = $aktor->filmy; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $film): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><strong><?php echo e($film->tytul); ?></strong> <small><?php echo e($film->data_premiery); ?></small></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
    

    
    <br>
    <a href="<?php echo e(route('aktor.index')); ?>" class="btn btn-secondary">Powróć do listy</a>
    <br>
    <br>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\20461\projekt\resources\views/aktor/show.blade.php ENDPATH**/ ?>