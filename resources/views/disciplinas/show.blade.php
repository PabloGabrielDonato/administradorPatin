<!-- resources/views/disciplinas/show.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Disciplina: {{ $disciplina->nombre }}</h1>
    <p>ID: {{ $disciplina->id }}</p>
    <p>Precio: ${{ $disciplina->precio }}</p>
    <a href="{{ route('disciplinas.edit', $disciplina->id) }}" class="btn btn-warning">Editar</a>
    <form method="POST" action="{{ route('disciplinas.destroy', $disciplina->id) }}" style="display:inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
    </form>
    <a href="{{ route('disciplinas.index') }}" class="btn btn-secondary">Volver</a>
@endsection
