<?php

// app/Models/Alumno.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $fillable = ['nombre', 'apellido', 'dni'];

    public function cuotas()
    {
        return $this->hasMany(Cuota::class);
    }

    // Agrega esta relación para obtener las disciplinas del alumno
    public function disciplinas()
    {
        return $this->belongsToMany(Disciplina::class, 'alumno_disciplina');
    }
    

    public function crearCuotas()
    {
        $meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];

        foreach ($meses as $mes) {
            $this->cuotas()->create([
                'mes' => $mes,
                'estado_pago' => 'no_corresponde', // Puedes establecer el estado predeterminado que desees
            ]);
        }
    }
}
