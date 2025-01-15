

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1 class="my-4">Edytuj Film</h1>
    <form action="<?php echo e(route('film.update', $film->id)); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>
    <?php echo $__env->make('film.partials.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <a href="<?php echo e(route('film.index')); ?>" class="btn btn-secondary">Anuluj</a>
</form>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\20461\projekt\resources\views/film/edit.blade.php ENDPATH**/ ?>