<?php

// app/Http/Controllers/CuotaController.php

namespace App\Http\Controllers;

use App\Models\Cuota;
use App\Models\Alumno;
use Illuminate\Http\Request;

class CuotaController extends Controller
{
    public function index()
    {
        $cuotas = Cuota::all();
        return view('cuotas.index', compact('cuotas'));
    }

    public function create()
    {
        return view('cuotas.create');
    }
    public function showCuotas(Alumno $alumno)
    {
        $cuotas = $alumno->cuotas;
        return view('alumnos.show', compact('alumno', 'cuotas'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'alumno_id' => 'required|exists:alumnos,id',
            'mes' => 'required',
            // Agrega más validaciones según tus necesidades
        ]);

        Cuota::create([
            'alumno_id' => $request->alumno_id,
            'mes' => $request->mes,
            'estado_pago' => 'NO PAGADO',
        ]);

        return redirect()->route('cuotas.index')->with('success', 'Cuota creada exitosamente');
    }

    public function markPaid($cuotaId)
{
    $cuota = Cuota::find($cuotaId);

    if ($cuota) {
        $cuota->estado_pago = 'PAGADA';
        $cuota->actualizarEstado('pagada'); // Llama directamente a la función para actualizar el estado
        return redirect()->route('cuotas.index')->with('success', 'Cuota marcada como pagada');
    }

    return redirect()->route('cuotas.index')->with('error', 'Cuota no encontrada');
}


// app/Http/Controllers/CuotaController.php

public function updateEstadoPago(Request $request, Cuota $cuota)
{
    $request->validate([
        'estado_pago' => 'required|in:pagada,no_pagada,pendiente,no_corresponde',
    ]);

    info("Antes de la actualización - Estado de pago: " . $cuota->estado_pago);
    info("Antes de la actualización - Fecha de modificación: " . $cuota->fecha_modificacion);

    // Llama al método en el modelo para actualizar el estado y el total
    $cuota->actualizarEstado($request->estado_pago);

    info("Después de la actualización - Estado de pago: " . $cuota->estado_pago);
    info("Después de la actualización - Fecha de modificación: " . $cuota->fecha_modificacion);

    return redirect()->back()->with('success', 'Estado de pago actualizado exitosamente');
}

}
