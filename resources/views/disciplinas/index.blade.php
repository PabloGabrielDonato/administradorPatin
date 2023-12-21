<!-- resources/views/disciplinas/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Disciplinas</h1>
    <a href="{{ route('disciplinas.create') }}" class="btn btn-primary">Nueva Disciplina</a>

    @if($disciplinas->count() > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($disciplinas as $disciplina)
                    <tr>
                        
                        <td>{{ $disciplina->nombre }}</td>
                        <td>${{ $disciplina->precio }}</td>
                        <td>
                            <a href="{{ route('disciplinas.show', $disciplina->id) }}" class="btn btn-info">Ver</a>
                            <a href="{{ route('disciplinas.edit', $disciplina->id) }}" class="btn btn-warning">Editar</a>
                            <form method="POST" action="{{ route('disciplinas.destroy', $disciplina->id) }}" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No hay disciplinas registradas.</p>
    @endif
@endsection
