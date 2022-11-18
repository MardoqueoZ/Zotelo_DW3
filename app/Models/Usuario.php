<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;
    public $table = 'usuarios';
    public $fillable = [
        'nombre',
        'apellido',
        'fecha_nacimiento',
        'email',
        'username',
        'password',
        'rol'
    ];
}
