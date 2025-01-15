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
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edytuj użytkownika: <?php echo e($user->name); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Formularz edycji użytkownika -->
                    <form method="POST" action="<?php echo e(route('admin.users.update', $user)); ?>">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>

                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Imię</label>
                            <input type="text" name="name" id="name" value="<?php echo e($user->name); ?>" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                        </div>

                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" name="email" id="email" value="<?php echo e($user->email); ?>" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                        </div>

                        <div class="mb-4">
                            <label for="role" class="block text-sm font-medium text-gray-700">Rola</label>
                            <select name="role" id="role" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                                <option value="user" <?php echo e($user->role === 'user' ? 'selected' : ''); ?>>Użytkownik</option>
                                <option value="krytyk" <?php echo e($user->role === 'krytyk' ? 'selected' : ''); ?>>Krytyk</option>
                                <option value="admin" <?php echo e($user->role === 'admin' ? 'selected' : ''); ?>>Admin</option>
                            </select>
                        </div>

                        <!-- Przycisk zapisywania -->
                        <button type="submit" class="btn btn-primary">
                            Zapisz zmiany
                        </button>
                    </form>

                    <!-- Formularz usuwania użytkownika -->
                    <form method="POST" action="<?php echo e(route('admin.users.destroy', $user)); ?>" onsubmit="return confirm('Czy na pewno chcesz usunąć tego użytkownika? \nTo działanie jest nieodwracalne!');" class="mt-4">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>

                        <!-- Przycisk usuwania -->
                        <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700 focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                            Usuń użytkownika
                        </button>
                    </form>
                    <form method="POST" action="<?php echo e(route('admin.users.destroyStay', $user)); ?>" 
                        onsubmit="return confirm('Czy na pewno chcesz usunąć tego użytkownika, pozostawiając jego dane? \nTo działanie jest nieodwracalne!');" 
                        class="mt-4">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PATCH'); ?>

                        <!-- Przycisk usuwania z zachowaniem danych -->
                        <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700 focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                            Usuń użytkownika, pozostawiając dane
                        </button>
                    </form>

                </div>
            </div>
        </div>
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
<?php /**PATH C:\xampp\htdocs\20461\projekt\resources\views/admin/users/edit.blade.php ENDPATH**/ ?>