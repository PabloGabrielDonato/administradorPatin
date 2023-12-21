<?php

// app/Http/Middleware/CheckPassword.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Password;

class CheckPassword
{
    public function handle(Request $request, Closure $next)
    {
        $enteredPassword = $request->password;
        $storedPassword = Password::find(1)->password;

        if (!empty($storedPassword) && password_verify($enteredPassword, $storedPassword)) {
            return $next($request);
        }

        return redirect()->route('login')->with('error', 'Contraseña incorrecta');
    }
}


