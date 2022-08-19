<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    use HasFactory;
    //protected $table = 'matricula';
    public $timestamps = false;
    //protected $keyType = 'string';

    protected $casts = [
        'sexo' => 'boolean'
    ];

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'nombres',
        'apellidos',
        'sexo',
        'grado_id',
        'correo',
        'dni',
        'fechanac',
        'lugarnac',
        'direccion',
        'religion',
        'discapacidad',
        'nivel_id',
        'nombrespadre',
        'apellidospadre',
        'dnipadre',
        'ocupacionpadre',
        'gradoinstrucionpadre',
        'direccionpadre',
        'correopadre',
        'celularpadre',
        'religionpadre',
        'nombresmadre',
        'apellidosmadre',
        'dnimadre',
        'ocupacionmadre',
        'gradoinstrucionmadre',
        'direccionmadre',
        'correomadre',
        'celularmadre',
        'religionmadre',
        'estado'
    ];
}
