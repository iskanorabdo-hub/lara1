<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VoitureController;
use App\Http\Controllers\ParkingController;
 
//afichir les voiture
Route::get('/listevoiture', [VoitureController::class, 'listes'])->name('liste');
Route::get('/voiture/{id}', [VoitureController::class, 'show'])->name('show');
// afficher parking
Route::get('/listeparking', [ParkingController::class, 'listes'])->name('liste-parking');
Route::get('/parking/{id}', [ParkingController::class, 'show'])->name('show');

// ajouter
Route::get('/ajouter', [ParkingController::class, 'ajouter'])->name('ajouter');
Route::post('/inserer', [ParkingController::class, 'inserer'])->name('inserer');
Route::get('/parking/{id}', [ParkingController::class, 'showp'])->name('showp');
// modifier
Route::get('/modifierparking/{id}', [ParkingController::class, 'modifier'])->name('modifierparking');
Route::post('/enregistrer/{id}', [ParkingController::class, 'enregistrer'])->name('enregistrer');

// supprimerm
Route::delete('/supprimerparking/{id}', [ParkingController::class, 'suprimer'])->name('supprimerparking');