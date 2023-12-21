<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\CuotaController;
use App\Http\Controllers\DisciplinaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;

Route::get('/login', function () {
    return view('auth.login');
})->name('login');
Route::post('/login', [AuthController::class, 'login']);

// RUTAS PROTEGIDAS
Route::middleware('checkPassword')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/alumnos.index', [AlumnoController::class, 'index'])->name('alumnos.index');

    // ... Otras rutas protegidas
    Route::get('/alumnos.index', [AlumnoController::class, 'index'])->name('alumnos.index');
    

    //APARTADO ALUMNOS
    Route::get('/alumnos/create', [AlumnoController::class, 'create'])->name('alumnos.create');
    Route::get('/alumnos', [AlumnoController::class, 'index'])->name('alumnos.index');
    Route::get('/alumnos/{alumno}', [AlumnoController::class, 'show'])->name('alumnos.show');
    Route::get('/alumnos/{alumno}/edit', [AlumnoController::class, 'edit'])->name('alumnos.edit');

    // CUOTAS
    Route::get('/alumnos/{alumno}/show-cuotas', [AlumnoController::class, 'showCuotas'])->name('alumnos.showCuotas');
    Route::put('/cuotas/{cuota}', [CuotaController::class, 'updateEstadoPago'])
        ->name('cuotas.updateEstadoPago');

    //RUTA DE RECURSOS
    Route::resource('disciplinas', DisciplinaController::class);
    Route::resource('alumnos', AlumnoController::class);
});
