<?php

// app/Models/Disciplina.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{
    protected $fillable = ['nombre', 'precio'];

    public function alumnos()
    {
        return $this->belongsToMany(Alumno::class, 'alumno_disciplina');
    }
}

