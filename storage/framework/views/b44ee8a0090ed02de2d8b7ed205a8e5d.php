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
    <div class="help">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Filmowersum
        </h2>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="srodek text-gray-900">
                    <!-- Dłuższy opis strony -->
                    <p class="text-lg text-gray-600  lg:px-8 mt-4 ">
                        Witaj w Filmowersum – kompleksowej bazie danych poświęconej światu kina! Nasza strona umożliwia ci odkrywanie filmów, aktorów, autorów i typów filmów w jednym miejscu. Znajdziesz tu szczegółowe informacje o swoich ulubionych produkcjach, ich twórcach i obsadzie. 
                    </p>
                    <p class="text-lg text-gray-600 lg:px-8 mt-4 mb-4">
                        Filmowersum to także platforma, która pozwala ci na ocenianie filmów i dzielenie się swoją opinią z innymi użytkownikami. Możesz również zapoznać się z ocenami profesjonalnych krytyków. A jeśli masz swoje ulubione filmy, możesz je komentować i dodawać własne spostrzeżenia. Wszystko to sprawia, że nasza strona jest idealnym miejscem dla prawdziwych pasjonatów kina, którzy chcą w pełni zanurzyć się w świecie filmowych emocji.
                    </p>

                    <!-- Sekcja ze zmieniającymi się zdjęciami -->
                    <div class="przed relative mt-8">
                        <br>
                    <div class="przzdj flex  justify-between">
                    <button class="pr " onclick="prevSlide()">&#8592;</button>
                        
                        <div class="slider-container ">
                            <!-- Zdjęcia w sliderze -->
                            <div class="slider-slide">
                                <a href="<?php echo e(route('film.index')); ?>">
                                    <img src="<?php echo e(asset('images/film.png')); ?>" alt="Filmy" class="zdj h-auto rounded-lg shadow-md">
                                    <div class="podZ text-black text-2xl font-bold mt-10">
                                        Filmy
                                    </div>
                                </a>
                            </div>
                            <div class="slider-slide">
                                <a href="<?php echo e(route('autor.index')); ?>">
                                    <img src="<?php echo e(asset('images/autor.jpg')); ?>" alt="Autorzy" class="zdj h-auto rounded-lg shadow-md">
                                    <div class="podZ text-black text-2xl font-bold mt-10">
                                        Autorzy
                                    </div>
                                </a>
                            </div>
                            <div class="slider-slide">
                                <a href="<?php echo e(route('aktor.index')); ?>">
                                    <img src="<?php echo e(asset('images/aktor2.png')); ?>" alt="Aktorzy" class="zdj h-auto rounded-lg shadow-md">
                                    <div class="podZ text-black text-2xl font-bold mt-10">
                                        Aktorzy
                                    </div>
                                </a>
                            </div>
                            <div class="slider-slide">
                                <a href="<?php echo e(route('typfilmu.index')); ?>">
                                    <img src="<?php echo e(asset('images/genres.jpg')); ?>" alt="Typy Filmów" class="zdj h-auto rounded-lg shadow-md">
                                    <div class="podZ text-black text-2xl font-bold mt-10">
                                    
                                        Typy Filmów
                                        
                                    
                                    </div>
                                </a>
                            </div>
                        </div>
                        <button class="nx" onclick="nextSlide()">&#8594;</button>
                        </div>
                        <br>
                        
                    </div>

                    <!-- Przycisk do przejścia -->
                     
                    <div class="logowanie mt-8 text-center">
                        <?php if(auth()->guard()->guest()): ?>
                            <a href="<?php echo e(route('login')); ?>" class="inline-block px-6 py-3 text-black bg-blue-500 hover:bg-blue-700 rounded-md">
                                <br>
                                Zaloguj się, aby rozpocząć
                                <br>
                                <br>
                            </a>
                        <?php else: ?>
                            <a href="<?php echo e(route('dashboard')); ?>" class="inline-block px-6 py-3 text-black bg-blue-500 hover:bg-blue-700 rounded-md">
                            <br>
                                Przejdź do swojego panelu
                                <br>
                                <br>
                                
                            </a>
                        <?php endif; ?>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="bg-gray-100 py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-xl text-gray-800 leading-tight">Kontakt</h3>
                    <p class="mt-4 text-gray-600">Masz pytania? Chcesz się z nami skontaktować? Oto nasze dane kontaktowe:</p>
                    <ul class="mt-4 space-y-2">
                        <li><strong>Adres e-mail:</strong> kontakt@filmowersum.com</li>
                        <li><strong>Telefon:</strong> +48 123 456 789</li>
                        <li><strong>Adres:</strong> ul. Filmowa 12, 00-000 Warszawa</li>
                    </ul>
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

<?php /**PATH C:\xampp\htdocs\20461\projekt\resources\views/welcome.blade.php ENDPATH**/ ?>