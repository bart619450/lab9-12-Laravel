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

        

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
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
.large-font .grid h3{
    font-size: 110%;
}



.large-font textarea#reason {
    font-size:120%;

}
.large-font .request h3,.large-font .request label,.large-font .request{
    font-size:120%;
}
.large-font .container h2, .large-font .container h3{
    font-size:120%;
}

.large-font .text-lg{
    font-size:120%;
    margin-bottom: 20px;
}
.large-font .help h2{
    font-size:120%;
}
.large-font .py-12 .text-xl{
    font-size: 120%;
}
.large-font mb-4 .block{
    font-size:120%;
}
.large-font label{
    font-size:110%;

}
.large-font input[type="text"],
.large-font input[type="email"],{
    font-size:110%;
    width:100%;
    
}
.large-font input[type="text"],
.large-font input[type="email"] {
    font-size: 1.5rem;  /* Powiększa rozmiar czcionki */
    width: 100%;  /* Ustawia pełną szerokość */
    padding: 10px;  /* Zwiększa przestrzeń wewnątrz inputów */
    
}
.large-font select {
    font-size: 110%;
    padding: 10px;
}


.high-contrast select{
    background-color: black;
    border-color: yellow;
    color: white;
    
}

.high-contrast label{
    color:white;

}
.high-contrast input[type="text"],
.high-contrast input[type="email"] {
    color: white;
    background-color: black;
    border-color:yellow;
}

.high-contrast .request label{
    color:white;
}
.high-contrast .font-semibold{
    color:#fff;
}
/* Tryb wysokiego kontrastu */
.high-contrast .bg-custom-header{
    background-color: #000;
    color: #fff;
}

.high-contrast .bg-white{
    background-color: #101010;
    color: #fff;

}
.high-contrast .text-lg{
    color:#fff;
}
.high-contrast {
    background-color: #000;
    color: #fff;
}
.high-contrast .p-6 {
    background-color: #000;  
    color: #fff; ;  
}
.high-contrast .py-12 {
    background-color: #080808;  
    color: #fff; ;  
}
.high-contrast .header {
    background-color: #000;  /* Żółte tło dla przycisków */
    color: #fff; ;  /* Kolor linków w trybie wysokiego kontrastu */
}
.high-contrast .help {

    background-color: #000;  /* Żółte tło dla przycisków */
    color: #fff; ;  /* Kolor linków w trybie wysokiego kontrastu */
}

.high-contrast .table th, .high-contrast .table td {
    border-color: #fff;  /* Jasne obramowanie w trybie wysokiego kontrastu */
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
.high-contrast .min-h-screen{
    background-color: #000;
    color: #fff;
}

.high-contrast textarea#reason {
    color:white;
    border-color: yellow;
    background-color: black;
}


.help{
    color:gray;
    margin-bottom: 3px;
    margin-top:10px;
    margin-left: 300px;
    
    position:absolute;

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
.request{
    margin-top: 20px;
    text-align: center;
}
textarea#reason {
    margin-left: 25%;
    width: 50%; /* pełna szerokość kontenera */
    height: 150px; /* wysokość, możesz dostosować według potrzeb */
    padding: 10px; /* odstęp wewnętrzny od krawędzi */
    font-size: 16px; /* rozmiar czcionki */
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

/* Styl dla wyszukiwarki */
input[type="text"] {
    padding: 2px;
    border: 1px solid #ddd;
    border-radius: 4px;
    width: 200px;
    font-size: 14px;
}
</style>
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
            {{ $slot }}
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
</html>
