<?php

use App\Http\Controllers\CandidataController;
use App\Http\Controllers\EscrutinioController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VotosController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('candidatas', CandidataController::class);
    Route::resource('escrutinio', EscrutinioController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', [VotosController::class, 'index'])->name('home');
Route::post('/votar', [VotosController::class, 'votar'])->name('votar');
Route::get('/resultados', [VotosController::class, 'resultados'])->name('resultados');

Route::get('/home', [HomeController::class, 'index'])->name('dashboard');

require __DIR__.'/auth.php';
