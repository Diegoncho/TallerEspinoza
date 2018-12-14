<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VistaEmpleados extends Model
{
    public $timestamps = false;

    public $table = "vta_empleados";

    protected $fillable = [
        'id', 'nombres', 'apellidos', 'direccion', 'telefono', 'edad',
        'fecha_nac', 'estado_civil', 'sexo', 'departamento_id', 'nombre', 
        'dui', 'nit', 'afp', 'email', 'img'
    ];
}
