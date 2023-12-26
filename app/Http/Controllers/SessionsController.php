<?php

namespace App\Http\Controllers;




class SessionsController extends Controller
{
    public function create()
    {
        return view ('login.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name'=> 'required',
            'password'=> 'required'
        ]);


        if (auth()->attempt($attributes)){
            session()->regenerate();
            return redirect('alumnos');
        };
    }

    public function destroy()
    {
        auth()->logout();
        return redirect ('/');
    }
}
