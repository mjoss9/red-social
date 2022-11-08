<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeachingExperience extends Model
{
    use HasFactory;
    protected $fillable = [
        'años',
        'carrera',
        'asignatura',
        'desde',
        'hasta',
    ];

}
