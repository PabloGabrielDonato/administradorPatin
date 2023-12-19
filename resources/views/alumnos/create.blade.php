
@extends('layouts.app')

@section('content')
    <h1>Agregar Nuevo Alumno</h1>

    <form action="{{ route('alumnos.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" class="form-control">
        </div>
        <div class="form-group">
            <label for="apellido">Apellido:</label>
            <input type="text" name="apellido" class="form-control">
        </div>
        <div class="form-group">
            <label for="dni">Ingrese el DNI:</label>
            <input type="text" name="dni" class="form-control">
        </div>
        <div class="form-group">
            <label>Disciplinas:</label>
            @foreach($disciplinas as $disciplina)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="disciplinas[]" value="{{ $disciplina->id }}">
                    <label class="form-check-label">{{ $disciplina->nombre }}</label>
                </div>
            @endforeach
        </div>
        <button type="submit" class="btn btn-success">Agregar Alumno</button>
    </form>
@endsection
