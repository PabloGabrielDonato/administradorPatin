<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    protected $fillable = ['alumno_id', 'monto', 'fecha'];

    public function alumno()
    {
        return $this->belongsTo(Alumno::class);
    }
}
