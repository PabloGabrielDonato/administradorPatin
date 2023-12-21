<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class Password extends Model implements AuthenticatableContract
{
    use HasFactory, AuthenticableTrait;

    protected $fillable = [
        'password',
    ];
}

