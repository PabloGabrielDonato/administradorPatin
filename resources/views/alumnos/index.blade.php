<!-- resources/views/alumnos/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Lista de Patinadores</h1>
    <a href="{{ route('alumnos.create') }}" class="btn btn-primary">Agregar Alumno</a>

    <table class="table">
        <thead>
            <tr>
                <th>DNI</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($alumnos as $alumno)
                <tr>
                    <td>{{ $alumno->dni }}</td>
                    <td>{{ $alumno->nombre }}</td>
                    <td>{{ $alumno->apellido }}</td>
                    <td>
                        <a href="{{ route('alumnos.edit', $alumno->id) }}" class="btn btn-warning">Editar</a>
                        <a href="{{ route('alumnos.showCuotas', $alumno->id) }}" class="btn btn-success">Pagos</a>
                        <button type="button" class="btn btn-danger" onclick="confirmarEliminacion('{{ $alumno->id }}')">Eliminar</button>
                        <form id="form-eliminar-{{ $alumno->id }}" action="{{ route('alumnos.destroy', $alumno->id) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
