<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicTitle extends Model
{
    use HasFactory;
    protected $fillable = [
        'titulo',
        'universidad',
        'añot',
        'horas',
    ];
}
