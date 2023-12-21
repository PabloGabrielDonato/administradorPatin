<?php
// app/Http/Controllers/AuthController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Password;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $storedPassword = Password::find(1)->password;

        if (!empty($storedPassword) && password_verify($request->password, $storedPassword)) {
            // Autenticar al usuario
            Auth::guard('custom')->loginUsingId(1); // Asígnale el ID correcto según tu lógica
            return redirect()->route('alumnos.index'); // Cambia esto según tu estructura de rutas
        }

        return redirect()->route('login')->with('error', 'Contraseña incorrecta');
    }
}




