

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

    
    <p><strong>Film dodany przez:</strong> <?php echo e($film->user->name ?? 'Admin'); ?></p>
    <p class="poka">Tytul: <strong><?php echo e($film->tytul); ?></strong></p>
    <p class="poka">Opis:<strong><?php echo e($film->opis); ?> </strong></p>
    <p class="poka">Data premiery: <strong><?php echo e($film->data_premiery); ?></strong></p>
    <p class="poka">Autor: <strong><?php echo e($film->getAutorName()); ?></strong></p>
    <p class="poka">Typ filmu: <strong><?php echo e($film->typyfilmow->pluck('nazwa')->join(', ') ?: 'Brak typu'); ?></strong></p>
    
    <p class="poka">Aktorzy:</p>
    <ul class="actor-list">
        <?php $__currentLoopData = $film->aktorzy; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $aktor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><strong><?php echo e($aktor->imie); ?> <?php echo e($aktor->nazwisko); ?></strong></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
    <div class="tlo">
    <div class="rating-container">
        <div class="rating-box">
            <h3>Średnia ocena krytyków:</h3>
            <p>
                <?php if($sredniaOcenaKrytykow): ?>
                    <?php echo e(number_format($sredniaOcenaKrytykow, 2)); ?>

                <?php else: ?>
                    Brak ocen krytyków
                <?php endif; ?>
            </p>
        </div>

        <div class="rating-box">
            <h3>Średnia ocena użytkowników:</h3>
            <p>
                <?php if($sredniaOcenaUzytkownikow): ?>
                    <?php echo e(number_format($sredniaOcenaUzytkownikow, 2)); ?>

                <?php else: ?>
                    Brak ocen użytkowników
                <?php endif; ?>
            </p>
        </div>
    </div>

    <?php if(auth()->guard()->check()): ?>
        
        <h3 class="rating-text">Oceń film:</h3>
        <form action="<?php echo e(route('film.ocena', $film->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="rating-stars">
            <label for="ocena">Ocena (1-10):</label>
            <div class="star-rating">
                <?php for($i = 1; $i <= 10; $i++): ?>
                    <input type="radio" id="star<?php echo e($i); ?>" name="ocena" value="<?php echo e($i); ?>" <?php if(old('ocena') == $i): ?> checked <?php endif; ?>>
                    <label for="star<?php echo e($i); ?>"><?php echo e($i); ?></label>
                <?php endfor; ?>
            </div>
        </div>

        <?php if(auth()->user()->role == 'krytyk' || auth()->user()->role == 'admin'): ?>
            <input type="hidden" name="typ_oceny" value="krytyk">
        <?php else: ?>
            <input type="hidden" name="typ_oceny" value="uzytkownik">
        <?php endif; ?>
        <div class=blklvm>
        <button type="submit" class="btn btn-ocena">Dodaj ocenę</button>
        </div>
    </form>

        <?php else: ?>
        <p>Musisz być zalogowany, aby ocenić film.</p>
</div>
    <?php endif; ?>


    <h3 class="komkom">Komentarze:</h3>
    <?php if(auth()->guard()->check()): ?>
    <form action="<?php echo e(route('komentarz.store', $film->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="mb-3">
            <textarea class="koment" name="tresc" rows="3" placeholder="Wpisz komentarz..." required></textarea>
        </div>
        <button type="submit" class="btn btn-kom">Dodaj komentarz</button>
    </form>
    <?php else: ?>
    <p>Musisz być zalogowany, aby dodać komentarz.</p>
    <?php endif; ?>
    <ul class="comment-list">
    <?php $__empty_1 = true; $__currentLoopData = $film->komentarze; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $komentarz): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <li class="comment-box">
        <?php if($komentarz->user): ?>
            <strong><?php echo e($komentarz->user->name); ?>:</strong> <?php echo e($komentarz->tresc); ?> 
            <small>(<?php echo e($komentarz->created_at->format('d-m-Y')); ?>)</small>
            
            <!-- Sprawdzenie, czy użytkownik jest autorem komentarza lub adminem -->
            <?php if($komentarz->user_id == auth()->id() || auth()->user()->role == 'admin'): ?>
                <!-- Opcja usuwania komentarza -->
                <form action="<?php echo e(route('komentarz.delete', $komentarz->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="btn btn-danger btn-sm">Usuń</button>
                </form>
            <?php endif; ?>
        <?php else: ?>
            <strong>Nieznany użytkownik:</strong> <?php echo e($komentarz->tresc); ?> 
            <small>(<?php echo e($komentarz->created_at->format('d-m-Y')); ?>)</small>
        <?php endif; ?>
    </li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <li class="brak">Brak komentarzy</li>
<?php endif; ?>

    </ul>

    

    <a href="<?php echo e(route('film.index')); ?>" class="btn btn-secondary">Powróć do listy</a>
    <br>
    <br>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\20461\projekt\resources\views/film/show.blade.php ENDPATH**/ ?>