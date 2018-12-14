<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehiculos extends Model
{
    public $timestaps = false;
    
    protected $fillable = [
        'id', 'tipo_vehiculo', 'marca', 'modelo', 'numero_placa', 'capacidad',
        'color', 'empleado_id'
    ];
}
