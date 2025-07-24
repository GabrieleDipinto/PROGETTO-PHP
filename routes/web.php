<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PrenotazioneController;
use App\Http\Controllers\SegnalazioneController;
use App\Http\Controllers\CartaFedeltaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SegnalazioniAdminController;

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
    Route::get('/prenotazioni/{prenotazione}/edit', [PrenotazioneController::class, 'edit'])->name('prenotazioni.edit');
    Route::put('/prenotazioni/{prenotazione}', [PrenotazioneController::class, 'update'])->name('prenotazioni.update');
    
    // Rotte per le segnalazioni
    Route::get('/segnalazioni', [SegnalazioneController::class, 'index'])->name('segnalazioni.index');
    Route::get('/segnalazioni/create', [SegnalazioneController::class, 'create'])->name('segnalazioni.create');
    Route::post('/segnalazioni', [SegnalazioneController::class, 'store'])->name('segnalazioni.store');
    Route::get('/segnalazioni/{segnalazione}/edit', [SegnalazioneController::class, 'edit'])->name('segnalazioni.edit');
    Route::put('/segnalazioni/{segnalazione}', [SegnalazioneController::class, 'update'])->name('segnalazioni.update');
    Route::delete('/segnalazioni/{segnalazione}', [SegnalazioneController::class, 'destroy'])->name('segnalazioni.destroy');

    // Rotta per la carta fedeltà
    Route::get('/fedelta', [CartaFedeltaController::class, 'index'])->name('fedelta');
    Route::get('/premi', function () {
        return view('premi');
    })->name('premi');
});

Route::post('/premi/riscatta', [\App\Http\Controllers\PremiController::class, 'riscatta'])->name('premi.riscatta');

Route::middleware('web')->group(function () {
    Route::get('/admin/dashboard', function () {
        abort_unless(session('is_admin'), 403);
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/admin/segnalazioni', [SegnalazioniAdminController::class, 'index'])->name('admin.segnalazioni');
    Route::post('/admin/segnalazioni/{segnalazione}/approva', [SegnalazioniAdminController::class, 'approva'])->name('admin.segnalazioni.approva');
    Route::get('/admin/segnalazioni/{segnalazione}/risolvi', [SegnalazioniAdminController::class, 'risolviForm'])->name('admin.segnalazioni.risolviForm');
    Route::post('/admin/segnalazioni/{segnalazione}/risolvi', [SegnalazioniAdminController::class, 'risolvi'])->name('admin.segnalazioni.risolvi');
    Route::delete('/admin/segnalazioni/{segnalazione}', [SegnalazioniAdminController::class, 'elimina'])->name('admin.segnalazioni.elimina');
    Route::get('/admin/utenti', [\App\Http\Controllers\Admin\UtentiAdminController::class, 'index'])->name('admin.utenti');
    Route::delete('/admin/utenti/{utente}', [\App\Http\Controllers\Admin\UtentiAdminController::class, 'elimina'])->name('admin.utenti.elimina');
    Route::get('/admin/prenotazioni', [\App\Http\Controllers\Admin\PrenotazioniAdminController::class, 'index'])->name('admin.prenotazioni');
    Route::post('/admin/prenotazioni/{prenotazione}/approva', [\App\Http\Controllers\Admin\PrenotazioniAdminController::class, 'approva'])->name('admin.prenotazioni.approva');
    Route::delete('/admin/prenotazioni/{prenotazione}', [\App\Http\Controllers\Admin\PrenotazioniAdminController::class, 'elimina'])->name('admin.prenotazioni.elimina');
});

require __DIR__.'/auth.php';
