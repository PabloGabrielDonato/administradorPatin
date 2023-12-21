<?php

// app/Http/Controllers/HomeController.php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        // Imprime información para depuración
        info('Usuario autenticado: ' . auth()->user()->name);
        info('Intentó acceder a: ' . request()->url());

        // Redirigir al índice de alumnos
        return redirect()->route('alumnos.index');
    }
}




