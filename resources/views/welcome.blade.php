<x-app-layout>
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
                                <a href="{{ route('film.index') }}">
                                    <img src="{{ asset('images/film.png') }}" alt="Filmy" class="zdj h-auto rounded-lg shadow-md">
                                    <div class="podZ text-black text-2xl font-bold mt-10">
                                        Filmy
                                    </div>
                                </a>
                            </div>
                            <div class="slider-slide">
                                <a href="{{ route('autor.index') }}">
                                    <img src="{{ asset('images/autor.jpg') }}" alt="Autorzy" class="zdj h-auto rounded-lg shadow-md">
                                    <div class="podZ text-black text-2xl font-bold mt-10">
                                        Autorzy
                                    </div>
                                </a>
                            </div>
                            <div class="slider-slide">
                                <a href="{{ route('aktor.index') }}">
                                    <img src="{{ asset('images/aktor2.png') }}" alt="Aktorzy" class="zdj h-auto rounded-lg shadow-md">
                                    <div class="podZ text-black text-2xl font-bold mt-10">
                                        Aktorzy
                                    </div>
                                </a>
                            </div>
                            <div class="slider-slide">
                                <a href="{{ route('typfilmu.index') }}">
                                    <img src="{{ asset('images/genres.jpg') }}" alt="Typy Filmów" class="zdj h-auto rounded-lg shadow-md">
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
                        @guest
                            <a href="{{ route('login') }}" class="inline-block px-6 py-3 text-black bg-blue-500 hover:bg-blue-700 rounded-md">
                                <br>
                                Zaloguj się, aby rozpocząć
                                <br>
                                <br>
                            </a>
                        @else
                            <a href="{{ route('dashboard') }}" class="inline-block px-6 py-3 text-black bg-blue-500 hover:bg-blue-700 rounded-md">
                            <br>
                                Przejdź do swojego panelu
                                <br>
                                <br>
                                
                            </a>
                        @endguest
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
</x-app-layout>

