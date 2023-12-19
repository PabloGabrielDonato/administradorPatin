@extends('layouts.app')

@section('content')
    <h1>Editar Alumno</h1>

    <form action="{{ route('alumnos.update', $alumno->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" class="form-control" value="{{ $alumno->nombre }}">
        </div>
        <div class="form-group">
            <label for="apellido">Apellido:</label>
            <input type="text" name="apellido" class="form-control" value="{{ $alumno->apellido }}">
        </div>
        <div class="form-group">
            <label for="dni">DNI:</label>
            <input type="text" name="dni" class="form-control" value="{{ $alumno->dni }}">
        </div>

        <div class="form-group">
            <label>Disciplinas:</label><br>

            <!-- Recorre las disciplinas y muestra un checkbox para cada una -->
            @foreach($disciplinas as $disciplina)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="disciplinas[]" value="{{ $disciplina->id }}" {{ in_array($disciplina->id, $alumno->disciplinas->pluck('id')->toArray()) ? 'checked' : '' }}>
                    <label class="form-check-label">{{ $disciplina->nombre }}</label>
                </div>
            @endforeach
        </div>

        <button type="submit" class="btn btn-success">Guardar Cambios</button>
    </form>
@endsection
