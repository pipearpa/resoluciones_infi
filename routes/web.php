<?php

use App\Http\Controllers\ChirpController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ConsultaPqrCiudadanoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NuevapqrController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/consultapqrciudadano', [
    ConsultaPqrCiudadanoController::class,
    'index'
])->name('consultapqrciudadano');

Route::get('/nuevapqr', [
    NuevapqrController::class,
    'index'
])->name('nuevapqr');

Route::post('/crearnuevapqr', [
    NuevapqrController::class,
    'store'
])->name('crearnuevapqr.store');


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::post('/consultar-pqr', [ConsultaPqrCiudadanoController::class, 'consultarPqrCiudadano'])->name('consultapqrciudadano');

Route::get('/download/{id}', function ($id) {
    $pqr = App\Models\Pqr::findOrFail($id);
    $rutaArchivo = 'archivos_pqr/' . $pqr->archivo;

   // Verificar si el archivo existe
    if (Storage::exists($rutaArchivo)) {
        return response()->download(storage_path('app/' . $rutaArchivo));
    } else {
        abort(404);
    }
})->name('download');
//Route::get('descargar-archivo/{fileName}', [NuevapqrController::class, 'descargarArchivo'])->name('descargar.archivo');















Route::middleware('auth')->group(function () {

    // Route::view('/dashboard', 'dashboard')->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/chirps', [ChirpController::class, 'index'])->name('chirps.index');

    Route::post('/chirps', [ChirpController::class, 'store'])
        ->name('chirps.store');
});





require __DIR__ . '/auth.php';
