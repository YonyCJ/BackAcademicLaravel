<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cursos extends Model
{
    use HasFactory;

    protected $casts = [
        'estado' => 'boolean',
    ];


    protected $fillable = [
        'id',
        'nombre',
        'credito',
        'grado_id',
        'persona_id'
    ];
}
