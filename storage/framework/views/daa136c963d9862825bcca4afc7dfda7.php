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
            Lista użytkowników
        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <!-- Formularz wyszukiwania -->
                    <form action="<?php echo e(route('admin.users.index')); ?>" method="GET" class="mb-4 flex gap-2">
                        <label for="search" class="sr-only">Wyszukaj:</label>
                        <input type="text" name="search" id="search" value="<?php echo e($search ?? ''); ?>" 
                               class="border-gray-300 rounded-md" placeholder="Wyszukaj użytkownika...">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">
                            Szukaj
                        </button>
                    </form>

                    <!-- Tabela użytkowników -->
                    <table class="table-auto w-full border">
                        <thead>
                            <tr>
                                <th class="border px-4 py-2">#</th>
                                <th class="border px-4 py-2">ID</th>
                                <th class="border px-4 py-2">Imię</th>
                                <th class="border px-4 py-2">Email</th>
                                <th class="border px-4 py-2">Rola</th>
                                <th class="border px-4 py-2">Akcje</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="border px-4 py-2"><?php echo e($index + 1 + ($users->currentPage() - 1) * $users->perPage()); ?></td>
                                    <td class="border px-4 py-2"><?php echo e($user->id); ?></td>
                                    <td class="border px-4 py-2"><?php echo e($user->name); ?></td>
                                    <td class="border px-4 py-2"><?php echo e($user->email); ?></td>
                                    <td class="border px-4 py-2"><?php echo e($user->role); ?></td>
                                    <td class="border px-4 py-2">
                                        <a href="<?php echo e(route('admin.users.edit', $user)); ?>" class="text-blue-500 hover:underline ">
                                            Edytuj
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>

                    <!-- Paginacja -->
                    <div class="szukaj">
                        <?php echo e($users->links()); ?>

                    </div>

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
<?php /**PATH C:\xampp\htdocs\20461\projekt\resources\views/admin/users/index.blade.php ENDPATH**/ ?>