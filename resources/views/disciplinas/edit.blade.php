<!-- resources/views/disciplinas/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Editar Disciplina: {{ $disciplina->nombre }}</h1>
    <form method="POST" action="{{ route('disciplinas.update', $disciplina->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $disciplina->nombre }}" required>
        </div>
        <div class="mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input type="number" class="form-control" id="precio" name="precio" value="{{ $disciplina->precio }}" step="0.01" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        <a href="{{ route('disciplinas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
