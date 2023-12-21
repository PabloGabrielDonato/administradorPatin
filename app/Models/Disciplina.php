<?php

// app/Models/Disciplina.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'precio'];

    public function alumnos()
    {
        return $this->belongsToMany(Alumno::class);
    }
}


