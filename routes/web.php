<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\AktorController;  // Import AktorController
use App\Http\Controllers\AutorController;  // Import AutorController
use App\Http\Controllers\TypFilmuController;  // Import TypFilmuController
use App\Http\Controllers\KomentarzController;
use App\Http\Controllers\RoleRequestController;

Route::delete('/komentarz/{id}', [KomentarzController::class, 'destroy'])->name('komentarz.delete');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Trasy związane z filmami
    Route::get('/filmy', [FilmController::class, 'index'])->name('film.index');
    Route::get('/filmy/create', [FilmController::class, 'create'])->name('film.create');  // Dodaj trasę do tworzenia filmu
    Route::post('/filmy', [FilmController::class, 'store'])->name('film.store');  // Dodaj trasę do zapisania filmu
    Route::get('/film/{id}', [FilmController::class, 'show'])->name('film.show');
    Route::post('/film/{id}/comment', [FilmController::class, 'addComment'])->name('film.addComment');
    Route::post('/film/{id}/rating', [FilmController::class, 'addRating'])->name('film.addRating');
    Route::get('/film/{id}/edit', [FilmController::class, 'edit'])->name('film.edit');
    Route::delete('/film/{id}', [FilmController::class, 'destroy'])->name('film.destroy');
    Route::put('film/{film}', [FilmController::class, 'update'])->name('film.update');
    Route::post('film/{film}/komentarz', [FilmController::class, 'storeComment'])->name('komentarz.store');
    Route::post('/film/{id}/ocena', [FilmController::class, 'storeRating'])->name('film.ocena');
    Route::get('/my-films', [FilmController::class, 'user_index'])->name('film.user_index');
    

    
    // Trasy związane z aktorami
    Route::resource('aktor', AktorController::class);
    Route::get('/my-actors', [AktorController::class, 'user_index'])->name('aktor.user_index');

    
    // Trasy związane z autorami
    Route::resource('autor', AutorController::class);
    Route::get('/my-authors', [AutorController::class, 'user_index'])->name('autor.user_index');

    
    // Trasy związane z typami filmów
    Route::resource('typfilmu', TypFilmuController::class);
    Route::get('/my-filmtypes', [TypFilmuController::class, 'user_index'])->name('typfilmu.user_index');

    Route::post('/role-request', [RoleRequestController::class, 'store'])->name('role_request.store');


});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', function () {
        return view('admin.dashboard');  // Widok głównej strony panelu admina
    })->name('admin.dashboard');
    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('/admin/users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/admin/users/{user}', [UserController::class, 'update'])->name('admin.users.update');
    Route::delete('/admin/users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');

    Route::get('/admin/role-requests', [RoleRequestController::class, 'index'])->name('admin.request.index');
    Route::patch('/admin/role-requests/{id}/approve', [RoleRequestController::class, 'approve'])->name('role_request.approve');
    Route::patch('/admin/role-requests/{id}/reject', [RoleRequestController::class, 'reject'])->name('role_request.reject');
});

require __DIR__.'/auth.php';
