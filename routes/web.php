<?php

use App\Http\Controllers\ChirpController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ConsultaPqrCiudadanoController;
use App\Http\Controllers\NuevapqrController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});
Route::get('/consultapqrciudadano', [ConsultaPqrCiudadanoController::class,
 'index'])->name('consultapqrciudadano');

 Route::get('/nuevapqr', [NuevapqrController::class,
  'index'])->name('nuevapqr'); 



Route::middleware('auth')->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/chirps', [ChirpController::class, 'index'] )->
     name('chirps.index');

    Route::post('/chirps', [ChirpController::class, 'store'])
        ->name('chirps.store');

       
    
    });

   



require __DIR__.'/auth.php';
