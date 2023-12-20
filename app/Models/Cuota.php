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
}
