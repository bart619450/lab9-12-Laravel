<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
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
    <div class="container mx-auto py-12">
        


        <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-6">
            <?php echo e(__('Dashboard')); ?>

        </h2>

        <?php if(auth()->user()->role == 'krytyk'): ?>  
            <h3 class="text-lg font-semibold mb-4"> Posiadasz rolę:"Krytyk" </h3>
        <?php endif; ?>
        <?php if(auth()->user()->role == 'admin'): ?>
        <h3 class="text-lg font-semibold mb-4"> Posiadasz rolę:"Administrator" </h3>
        <?php endif; ?>
        <?php if(auth()->user()->role == 'user'): ?>
        <h3 class="text-lg font-semibold mb-4"> Posiadasz rolę:"Użytkownik" </h3>
        <?php endif; ?>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
            <!-- Sekcja Filmów -->
            <div class="bg-white shadow-sm rounded-lg p-6">
                <h3 class="text-lg font-semibold mb-4">Twoje Filmy</h3>
                <a href="<?php echo e(route('film.user_index')); ?>" class="btn btn-primary">Zobacz moje filmy</a>
            </div>

            <div class="bg-white shadow-sm rounded-lg p-6">
                <h3 class="text-lg font-semibold mb-4">Twoi Aktorzy</h3>
                <a href="<?php echo e(route('aktor.user_index')); ?>" class="btn btn-primary">Zobacz moich aktorów</a>
            </div>

            <div class="bg-white shadow-sm rounded-lg p-6">
                <h3 class="text-lg font-semibold mb-4">Twoi Autorzy</h3>
                <a href="<?php echo e(route('autor.user_index')); ?>" class="btn btn-primary">Zobacz moich autorów</a>
            </div>

            <div class="bg-white shadow-sm rounded-lg p-6">
                <h3 class="text-lg font-semibold mb-4">Twoje Typy filmów</h3>
                <a href="<?php echo e(route('typfilmu.user_index')); ?>" class="btn btn-primary">Zobacz moje Typy Filmów</a>
            </div>

        </div>
        
        <?php if(auth()->user()->role == 'user'): ?>
        <div class="request">
                <h3 class="text-lg font-semibold mb-4">Wniosek o przyznanie roli krytyka</h3>
            <form action="<?php echo e(route('role_request.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="mb-4">
                    <label for="reason" class="block text-sm font-medium text-gray-700">Powód</label>
                    <textarea name="reason" id="reason" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Wyślij prośbę</button>
            </form>
            </div>
            <?php endif; ?>
            

    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\20461\projekt\resources\views/dashboard.blade.php ENDPATH**/ ?>