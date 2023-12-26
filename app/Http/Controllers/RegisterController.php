<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function create ()
    {
        return view ('register.create');
    }
    public function store ()
    {
        $attributes =  request()->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required'
        ]);

        $user = User::create($attributes);

        auth()->login($user);


        return redirect('/');
    }
}
