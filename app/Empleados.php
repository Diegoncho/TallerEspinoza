<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleados extends Model
{
    public $timestaps = false;
    
    protected $fillable = [
        'id', 'nombres', 'apellidos', 'direccion', 'telefono', 'edad',
        'fecha_nac', 'estado_civil', 'sexo', 'departamento_id', 'dui',
        'nit', 'afp', 'email', 'img'
    ];
}
