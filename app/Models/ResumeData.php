<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResumeData extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'apellidop',
        'apellidom',
        'carnet',
        'correo',
        'mension',
        'direccion',
        'celular',
        'nacimientof',
        'nacimientol',
        'sexo',
        'telefono',
    ];
}
