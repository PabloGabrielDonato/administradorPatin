<!-- resources/views/alumnos/show.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Cuotas de {{ $alumno->nombre }} {{ $alumno->apellido }}</h1>
    <p><strong>DNI:</strong> {{ $alumno->dni }}</p>
    <a href="{{ route('alumnos.index') }}" class="btn btn-primary">Volver a la Lista</a>

    @if($cuotas)
        @if(count($cuotas) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>Mes</th>
                        <th>Estado de Pago</th>
                        <th>Pagó?</th>
                        <th>Fecha</th>
                        <th>Disciplinas</th>
                        <th>Total a Pagar</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Dentro de tu vista que muestra las cuotas -->
                    @foreach($cuotas as $cuota)
                        <tr>
                            <td>{{ $cuota->mes }}</td>
                            <td>
                                <!-- Muestra el estado de pago -->
                                <span>{{ $cuota->estado_pago }}</span>
                            </td>
                            <td>
                                <!-- Selector de estado de pago -->
                                <form method="POST" action="{{ route('cuotas.updateEstadoPago', $cuota->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="d-flex align-items-center">
                                        <select name="estado_pago" class="form-select" onchange="this.form.submit()">                     
                                            <option value="no_corresponde" {{ $cuota->estado_pago === 'no_corresponde' ? 'selected' : '' }}>No corresponde</option>
                                            <option value="pendiente" {{ $cuota->estado_pago === 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                                            <option value="pagada" {{ $cuota->estado_pago === 'pagada' ? 'selected' : '' }}>Pagada</option>
                                            <option value="no_pagada" {{ $cuota->estado_pago === 'no_pagada' ? 'selected' : '' }}>No Pagada</option> 
                                        </select>
                                    </div>
                                </form>
                            </td>
                            <td>
                                <!-- Muestra la fecha de modificación si existe -->
                                {{ $cuota->updated_at->format('d/m/Y H:i:s') }}
                            </td>
                            <td>
                                @foreach($cuota->alumno->disciplinas as $disciplina)
                                    {{ $disciplina->nombre }}: ${{ $disciplina->precio }}<br>
                                @endforeach
                            </td>
                            <td>${{ $cuota->calcularTotal() }}</td>
                        </tr>
                    @endforeach
                </tbody>      
            </table>
        @else
            <p>No hay cuotas registradas para este alumno.</p>
        @endif
    @else
        <p>No hay cuotas registradas para este alumno.</p>
    @endif
@endsection
