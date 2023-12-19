<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// En app/Models/Clave.php

class Clave extends Model
{
    protected $fillable = ['clave_acceso'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

