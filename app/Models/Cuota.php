<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cuota extends Model
{
    protected $fillable = ['mes', 'estado_pago', 'total'];
    protected $dates = ['fecha_modificacion'];

    public function alumno()
    {
        return $this->belongsTo(Alumno::class);
    }
    // Método para calcular el total
    public function calcularTotal()
    {
        // Obtén las disciplinas asociadas al alumno de esta cuota
        $disciplinas = $this->alumno->disciplinas;

        // Calcula el total sumando los precios de las disciplinas
        $total = $disciplinas->sum('precio');

        return $total;
    }

    // Método para actualizar el total solo si la cuota no está pagada
public function actualizarTotal()
{
    if ($this->estado_pago !== 'pagada') {
        $this->update(['total' => $this->calcularTotal()]);
    }
}

public function actualizarEstado($nuevoEstado)
{
    // Si el nuevo estado es 'pagada', no actualices el total
    if ($nuevoEstado === 'pagada') {
        $this->estado_pago = 'pagada';
        $this->congelarTotal(); // Llama a la función para congelar el total
    } else {
        // Actualiza el estado y recalcula el total
        $this->estado_pago = $nuevoEstado;
        $this->total = $this->calcularTotal();
    }

    $this->fecha_modificacion = ($nuevoEstado === 'pagada') ? now() : null;
    $this->save();
}

// Método para congelar el total si la cuota está pagada
public function congelarTotal()
{
    if ($this->estado_pago === 'pagada') {
        $this->update(['total' => $this->calcularTotal()]);
    }
}
}
