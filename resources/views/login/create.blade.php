@extends('layouts.app')

@section('content')
    <form method="POST" action="/login">
    @csrf


        <div>
            <label for="name">
                    Nombre
            </label>    
            <input type="text" name="name" id="name" required>
        </div>

        <div>
            <label for="password">
                    Contraseña
            </label>    
            <input type="password" name="password" id="password" required>
        </div>



        <div>
            <button type="submit" class="btn btn-success">
                    submit
            </button>    
        </div>
        

    </form>
@endsection