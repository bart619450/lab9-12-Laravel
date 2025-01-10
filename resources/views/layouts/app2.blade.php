<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" rel="stylesheet" />

<!-- Choices.js JS -->
<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
        <style>


/* Duża czcionka */
.large-font {
    font-size: 130%;
}
.large-font .bg-white{
    font-size: 120%;
}
.large-font .x-nav-link{
    font-size: 120% !important;;
}
.large-font .custom-nav-link{
    font-size: 105%;
}
.large-font .hiden{
    font-size: 120%;
}
.large-font .table th {
    font-size: 120%;
    
}
.large-font .table td {
    font-size: 120%;
    
}
.large-font .btn-primary {
    font-size: 110%;
}
.large-font .btn-warning {
    font-size: 110%;
}
.large-font .choices__item--selectable {
    font-size:105%;
}
.large-font .col-md-6{
    font-size:120%;
}
.large-font .choices,
.large-font .choices__inner, /* Wewnętrzny kontener */
.large-font .choices__list--dropdown, /* Lista rozwijana */
.large-font .choices__list {
    font-size:105%;
}
.large-font .choices__list {
    font-size:105%;
}

/* Tło i kolor tekstu dla opcji w menu */
.large-font .choices__item {
    font-size:105%;
}
.large-font .choices__item--highlighted,
.large-font .choices__item--selectable:hover {
    font-size:105%;
}
.large-font .choices__input {
    font-size:105%;
}
.large-font .choices__item--selectable {
    font-size:105%;
}
/* Powiększenie czcionki dla elementów listy */
.large-font .choices__list--dropdown .choices__item {
    font-size:105% !important; /* Wymuszenie rozmiaru czcionki */
}

/* Opcjonalnie: zmniejszenie rozmiaru czcionki przy najechaniu */
.large-font .choices__list--dropdown .choices__item:hover {
    font-size:105% !important; /* Wymuszenie rozmiaru czcionki */
}

.large-font textarea.form-control{
    font-size: 110%;
}

.large-font #tytul{
    font-size: 110%;
}
.large-font .btn-secondary{
    font-size:110%;
}
.large-font .koment{
    height: 200px;
    width: 1500px;
    font-size: 120%;
}
.large-font .btn-kom{
    font-size: 120%;
    
}
.large-font .btn-ocena{
    margin-left: 200px;
    font-size: 120%;
}
.large-font .btn-danger {
    font-size:110%;
}
.large-font .btn-info{
    font-size: 110%;
} 

/* Tryb wysokiego kontrastu */
/* Tryb wysokiego kontrastu */
.high-contrast .bg-white{
    background-color: #101010;
    color: #fff;

}
.high-contrast .min-h-screen{
    background-color: #000;
    color: #fff;
}
.high-contrast {
    background-color: #000;
    color: #fff;
}

.high-contrast .table th, .high-contrast .table td {
    border-color: #fff;  /* Jasne obramowanie w trybie wysokiego kontrastu */
    background-color:  #000;
}

.high-contrast a {
    color: #1e90ff;  /* Kolor linków w trybie wysokiego kontrastu */
}

.high-contrast .btn {
    background-color: #ff0;  /* Żółte tło dla przycisków */
    color: #000;             /* Czarny tekst */
}

.high-contrast .btn-primary {
    background-color: #ff0; /* Żółte tło dla przycisków */
}

.high-contrast .btn-primary:hover {
    background-color: #ffd700;
}

.high-contrast .btn-info {
    background-color: green;
}

.high-contrast .btn-warning {
    background-color: #ffa500;
}

.high-contrast .btn-danger {
    background-color: #f00;
}

.high-contrast .input[type="text"] {
    color:black;
}
.high-contrast .form-control{
    color:black;
}
.high-contrast .col-md-6{
    background-color: #101010;
    color:white;

}
.high-contrast .choices__list {
    background-color: #101010 !important; /* Tło całego menu wyboru */
    color: white !important; /* Kolor tekstu w menu */
}

/* Tło i kolor tekstu dla opcji w menu */
.high-contrast .choices__item {
    background-color: #101010 !important; /* Tło każdej opcji */
    color: white; /* Kolor tekstu każdej opcji */
}

/* Kolor tła opcji przy najechaniu */
.high-contrast .choices__item--highlighted,
.high-contrast .choices__item--selectable:hover {
    background-color: #333333 !important; /* Tło opcji przy najechaniu */
    color: white !important; /* Kolor tekstu przy najechaniu */
}
.high-contrast .choices__input {
    color: black !important; /* Kolor tekstu wpisywanego w pole wyszukiwania */
    background-color: #cccccc !important; /* Tło pola wyszukiwania */
}

/* Tło i kolor tekstu w placeholderze */
.high-contrast .choices__input::placeholder {
    color: #888888 !important; /* Kolor placeholdera */
}

.high-contrast .choices,
.high-contrast .choices__inner, /* Wewnętrzny kontener */
.high-contrast .choices__list--dropdown, /* Lista rozwijana */
.high-contrast .choices__list {
    background-color: black !important; /* Ustawienie tła na czarne */
    color: white !important; /* Kolor tekstu dla kontrastu */
}
.high-contrast .choices__item--selectable {
    border: 2px solid yellow; /* Ustawienie koloru obramowania */
    background-color: black; /* Opcjonalnie: zmiana tła */
    color: white; /* Opcjonalnie: zmiana koloru tekstu */
    border-radius: 5px; /* Opcjonalnie: zaokrąglenie */
    padding: 5px; /* Opcjonalnie: margines wewnętrzny */
}
.high-contrast .comment-list .comment-box {
    
    background-color: black;
    color:white;
}



            /* Styl dla tabel */
.table {
    border-collapse: collapse;
    width: 100%;
    margin-bottom: 1px;
    font-size: 16px;
    text-align: left;
}

.table th, .table td {
    padding: 5px 10px;
    border: 1px solid #ddd;
    word-wrap: break-word;
}

.table th {
    background-color: #f4f4f4;
    font-weight: bold;
}

.table td {
    vertical-align: middle;
}

/* Styl dla przycisków */
.btn {
    display: inline-block;
    margin-bottom: 1px;
    padding: 2px 10px;
    font-size: 14px;
    font-weight: 600;
    text-align: center;
    text-decoration: none;
    color: #fff;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}
.przyciski{
    display:flex;
}
.btn-cz{
    background-color:green;
    font-size: 110%;
    width: 250px;
    
}
.btn-ko{
    background-color:#0066b2;
    font-size: 110%;
    width: 250px;
}

.btn-primary {
    background-color: #007bff;
    border: none;
}

.btn-primary:hover {
    background-color: #0056b3;
}
.btn-secondary{
    background-color:green;
}

.btn-warning {
    background-color: #ffc107;
    border: none;
}
.btn-info{
    background-color: green;
    border: none;
} 

.btn-warning:hover {
    background-color: #e0a800;
}

.btn-danger {
    background-color: #dc3545;
    border: none;
}

.btn-danger:hover {
    background-color: #bd2130;
}

/* Styl dla wyszukiwarki */
input[type="text"] {
    padding: 2px;
    border: 1px solid #ddd;
    border-radius: 4px;
    width: 200px;
    font-size: 14px;
}
.col-md-6{
    margin-bottom: 15px;
    margin-left: 10px;
    margin-top: 10px;
    font-size: 18px;
}
textarea.form-control{
    height: 200px;
    width: 400px;
}
.my-4{
    font-size: 120%
}
text.form-control{
    height: 150px;
}
#tytul {
    width: 400px; /* Szerokość */
    height: 50px; /* Wysokość */
    font-size: 16px; /* Rozmiar czcionki */
    padding: 10px; /* Wewnętrzne odstępy */
    box-sizing: border-box; /* Ułatwia kontrolowanie rozmiaru */
}

/* Komentarze w małych kwadratach z zaokrąglonymi rogami */
.comment-box {
    background-color: #f8f9fa;
    border: 1px solid #ccc;
    border-radius: 8px;
    padding: 10px;
    margin-bottom: 10px;
}

/* Lista aktorów */
.actor-list {
    list-style-type: disc;
    margin-left: 20px;
}

/* Oceny krytyków i użytkowników w dwóch kolumnach */
.rating-container {
    display: flex;
    justify-content: space-between;
    margin-top: 20px;
}

.rating-box {
    margin-top: 10px;
    width: 45%;
    background-color: #f8f9fa;
    padding: 10px;
    border-radius: 8px;
    border: 1px solid #ccc;
    margin-left: 120px;
    margin-right: 120px;
    background-color:#DAA520;
    text-align: center;
    color: white;
    
    font-size: 30px;
}


/* Gwiazdkowa ocena - checkboxy */
.btn-ocena{
    margin-left: 285px;
    background-color: #ffcc00;
    margin-top: 2px;
    margin-bottom: 4px;
}
.blklvm{
    margin-left:750px;
    margin-right:725px;
    background-color: #181818;
}
.star-rating {
    
    
    display: flex;
    text-align: center;
    gap: 5px;
    background-color: #181818;
}
.rating-stars{
    margin-left: 750px;
    margin-right: 725px;
    color: white;
    background-color: #181818;
    text-align: center;
}
.rating-text{
    margin-left: 750px;
    margin-right: 725px;
    color:white;
    text-align: center;
    background-color: #181818;
}


.star-rating input[type="checkbox"] {
    display: none;
}

.star-rating label {
    cursor: pointer;
    font-size: 20px;
    color: #ffcc00;
}

.star-rating input[type="checkbox"]:checked ~ label {
    color: #ffcc00;
}
.koment{
    margin-left: 10px;
    width: 1000px;
}

/* Formularz z komentarzami */
.comment-list {
    list-style-type: none;
    padding-left: 0;
}

.comment-list li {
    margin-bottom: 15px;
}

.comment-list .comment-box {
    margin-left: 10px;
    background-color: #f9f9f9;
    border: 1px solid #ddd;
    padding: 10px;
    border-radius: 8px;
}

/* Przycisk usuń */
.btn-danger {
    background-color: #dc3545;
    border-color: #dc3545;
}
.poka{
    margin-bottom: 10px;
    margin-left: 5px;
    margin-top: 15px;
    font-size: 20px;
}
.h3{
    margin-left:10px;
}
.komkom{
    margin-left:10px;
    font-size: 16px;
    color: white;
}
.tlo{
    background-color: #181818;
}
.btn-kom{
    background-color: #ffcc00;
    margin-bottom: 10px;
    margin-left: 850px;
    
}
.alert-danger{
    background-color: crimson;
    color: white;
    margin-right: 1500px;
    border-radius: 6px;
    margin-left: 3px;
}
.alert-success{
    background-color: #00563B;
    color: white;
    margin-right: 1500px;
    border-radius: 6px;
    margin-left: 3px;
}
.brak{
    color:white;
    font-size: 20px;
}




</style>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
            @yield('content')
            </main>
        </div>
        <script>
document.addEventListener("DOMContentLoaded", function () {
    const body = document.body;
    const increaseFontButton = document.getElementById("increase-font");
    const toggleContrastButton = document.getElementById("toggle-contrast");

    // Sprawdzenie ustawień z localStorage
    if (localStorage.getItem("font-size") === "large") {
        body.classList.add("large-font");
        increaseFontButton.textContent = "Zmniejsz czcionkę";
    }
    if (localStorage.getItem("contrast") === "high") {
        body.classList.add("high-contrast");
        toggleContrastButton.textContent = "Niski kontrast";
    }

    // Funkcja do zwiększania czcionki
    let fontSizeIncreased = localStorage.getItem("font-size") === "large";
    increaseFontButton.addEventListener("click", function () {
        if (!fontSizeIncreased) {
            body.classList.add("large-font");
            localStorage.setItem("font-size", "large"); // Zapisz ustawienie w localStorage
            fontSizeIncreased = true;
            this.textContent = "Zmniejsz czcionkę";
        } else {
            body.classList.remove("large-font");
            localStorage.setItem("font-size", "normal"); // Zapisz ustawienie w localStorage
            fontSizeIncreased = false;
            this.textContent = "Zwiększ czcionkę";
        }
    });

    // Funkcja do przełączania wysokiego kontrastu
    let highContrastEnabled = localStorage.getItem("contrast") === "high";
    toggleContrastButton.addEventListener("click", function () {
        if (!highContrastEnabled) {
            body.classList.add("high-contrast");
            localStorage.setItem("contrast", "high"); // Zapisz ustawienie w localStorage
            highContrastEnabled = true;
            this.textContent = "Niski kontrast";
        } else {
            body.classList.remove("high-contrast");
            localStorage.setItem("contrast", "normal"); // Zapisz ustawienie w localStorage
            highContrastEnabled = false;
            this.textContent = "Wysoki kontrast";
        }
    });
});
</script>
</body>

    </body>
</html>
