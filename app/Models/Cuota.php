<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cuota extends Model
{
    protected $fillable = ['mes', 'estado_pago']; // Agrega 'mes' al array fillable
    protected $dates = ['fecha_modificacion'];

    public function alumno()
    {
        return $this->belongsTo(Alumno::class);
    }

    public function disciplinas()
    {
        return $this->alumno->disciplinas;
    }

    public function calcularTotal()
    {
        return $this->disciplinas()->sum('precio');
    }
}
