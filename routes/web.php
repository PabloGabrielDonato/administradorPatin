<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\CuotaController;
use App\Http\Controllers\DisciplinaController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;

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

// LOGIN Y REGISTER

Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest');

Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');


Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');




    //RUTA RAIZ
    Route::get('/', [SessionsController::class, 'create']); // Cambiar la ruta raíz a la lista de alumnos

    //APARTADO ALUMNOS
    Route::get('/alumnos/create', [AlumnoController::class, 'create'])->name('alumnos.create')->middleware('auth');
    Route::get('/alumnos/{alumno}', [AlumnoController::class, 'show'])->name('alumnos.show')->middleware('auth');
    Route::get('/alumnos/{alumno}/edit', [AlumnoController::class, 'edit'])->name('alumnos.edit')->middleware('auth');

    // CUOTAS
    Route::get('/alumnos/{alumno}/show-cuotas', [AlumnoController::class, 'showCuotas'])->name('alumnos.showCuotas')->middleware('auth');
    Route::put('/cuotas/{cuota}', [CuotaController::class, 'updateEstadoPago'])
        ->name('cuotas.updateEstadoPago')->middleware('auth');
    
    
    //RUTA DE RECURSOS
    
    Route::resource('disciplinas', DisciplinaController::class)->middleware('auth');
    Route::resource('alumnos', AlumnoController::class)->middleware('auth');



