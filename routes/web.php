<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PrenotazioneController;
use App\Http\Controllers\SegnalazioneController;
use App\Http\Controllers\CartaFedeltaController;
use Illuminate\Support\Facades\Route;

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

    // Rotte per le prenotazioni
    Route::get('/prenotazioni', [PrenotazioneController::class, 'index'])->name('prenotazioni.index');
    Route::get('/prenotazioni/create', [PrenotazioneController::class, 'create'])->name('prenotazioni.create');
    Route::post('/prenotazioni', [PrenotazioneController::class, 'store'])->name('prenotazioni.store');
    Route::delete('/prenotazioni/{prenotazione}', [PrenotazioneController::class, 'destroy'])->name('prenotazioni.destroy');
    
    // Rotte per le segnalazioni
    Route::get('/segnalazioni', [SegnalazioneController::class, 'index'])->name('segnalazioni.index');
    Route::get('/segnalazioni/create', [SegnalazioneController::class, 'create'])->name('segnalazioni.create');
    Route::post('/segnalazioni', [SegnalazioneController::class, 'store'])->name('segnalazioni.store');

    // Rotta per la carta fedeltà
    Route::get('/fedelta', [CartaFedeltaController::class, 'index'])->name('fedelta');
});

require __DIR__.'/auth.php';
