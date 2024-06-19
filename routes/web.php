<?php

use App\Models\User;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ConsultaPqrCiudadanoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\nuevaresolucionController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

Route::get('/', function () {
    return view('welcome');
});



/* Route::get('/consultapqrciudadano', [
    ConsultaPqrCiudadanoController::class,
    'index'
])->name('consultapqrciudadano');
*/




Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/nuevaresolucion', [
    nuevaresolucionController::class,
    'index'
])->name('nuevaresolucion');

Route::post('/crearnuevaresolucion', [
    nuevaresolucionController::class,
    'store'
])->name('crearnuevaresolucion.store');

//Route::post('/consultar-pqr', [ConsultaPqrCiudadanoController::class, 'consultarPqrCiudadano'])->name('consultapqrciudadano');

Route::get('/download/{id}', function ($id) {
    $resolucion = App\Models\Resolucion::findOrFail($id);
    $rutaArchivo = 'archivos_pqr/' . $resolucion->archivo;

    //Verificar si el archivo existe
    if (Storage::exists($rutaArchivo)) {
        return response()->download(storage_path('app/' . $rutaArchivo));
    } else {
        abort(404);
    }
})->name('download');




Route::get('/pdf', [PdfController::class, 'pdf'])->name('pdf');



Route::get('dashboard/register', [RegisteredUserController::class, 'create'])
    ->name('register');

Route::post('dashboard/register', [RegisteredUserController::class, 'store']);

Route::get('dashboard/users', [RegisteredUserController::class])
    ->name('users');

Route::get('dashboard/users', function () {
    $users = User::all();
    return view('users.index', compact('users'));
})->name('users');

Route::get('dashboard/users', [UserController::class, 'index']);

Route::get('/export', [ExcelController::class, 'export'])->name('export');


Route::middleware(['auth'])->group(function () {
    Route::resource('users', UserController::class);
});


Route::post('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');


Route::group(['middleware' => ['auth']], function () {
    Route::resource('users', UserController::class)->except(['edit', 'update']);
    Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('users.edit')->middleware('can:update,user');
    Route::put('users/{user}', [UserController::class, 'update'])->name('users.update')->middleware('can:update,user');
});

Route::group(['middleware' => ['auth']], function () {
    Route::resource('users', UserController::class);
});

Route::post('/users/{user}/toggle-activation', [UserController::class, 'toggleActivation'])->name('users.toggleActivation');


Route::POST('/dashboard/users/{user}', function (Request $request, User $user) {
    // Update user logic with the received data from the form
    $user->update($request->all());

    // Redirect or perform other actions after update
    return redirect()->route('users.index')->with('success', 'User updated successfully!');
});




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
