<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\CuotaController;


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




    // Rutas protegidas
    Route::get('/', [AlumnoController::class, 'index']); // Cambiar la ruta raíz a la lista de alumnos


    Route::get('/alumnos/create', [AlumnoController::class, 'create'])->name('alumnos.create');
    Route::get('/alumnos/{alumno}', [AlumnoController::class, 'show'])->name('alumnos.show');
    Route::get('/alumnos/{alumno}/edit', [AlumnoController::class, 'edit'])->name('alumnos.edit');
    // CUOTAS
    Route::get('/alumnos/{alumno}/show-cuotas', [AlumnoController::class, 'showCuotas'])->name('alumnos.showCuotas');
    Route::put('/cuotas/{cuota}', [CuotaController::class, 'updateEstadoPago'])
        ->name('cuotas.updateEstadoPago');
    
    
    Route::resource('alumnos', AlumnoController::class);



