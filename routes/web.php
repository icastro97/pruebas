<?php

use App\Http\Controllers\AsignacionController;
use App\Http\Controllers\EquipoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

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

    Route::get('/asignar-equipo', [AsignacionController::class, 'asignarEquipo'])->name('asignar-equipo');
    Route::post('/asignar-equipo', [AsignacionController::class, 'storeEquipo'])->name('guardar-asignacion-equipo');
    Route::get('/desasignar-equipo/{equipo}', [AsignacionController::class, 'desasignarEquipo'])->name('desasignar-equipo');



    Route::get('/asignar-telefono', [AsignacionController::class, 'asignarTelefono'])->name('asignar-telefono');
    Route::post('/asignar-telefono', [AsignacionController::class, 'storeTelefono'])->name('guardar-asignacion-telefono');
    Route::get('/desasignar-telefono/{telefono}', [AsignacionController::class, 'desasignarTelefono'])->name('desasignar-telefono');



    Route::get('/equipos/create', [EquipoController::class, 'create'])->name('equipos.create');
    Route::post('/equipos', [EquipoController::class, 'store'])->name('equipos.store');
    Route::get('/equipos/{equipo}', [EquipoController::class, 'show'])->name('equipos.show');
    Route::get('/equipos/{equipo}/add-images', [EquipoController::class, 'addImages'])->name('equipos.add-images');
    Route::post('/equipos/{equipo}/images', [EquipoController::class, 'storeImages'])->name('equipos.storeImages');
    Route::delete('/equipos/images/{imagen}', [EquipoController::class, 'destroyImage'])->name('equipos.destroyImage');
});

require __DIR__.'/auth.php';



