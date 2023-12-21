<!-- resources/views/disciplinas/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Nueva Disciplina</h1>
    <form method="POST" action="{{ route('disciplinas.store') }}">
        @csrf
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input type="number" class="form-control" id="precio" name="precio" step="0.01" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('disciplinas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
