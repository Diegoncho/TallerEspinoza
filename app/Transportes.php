<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transportes extends Model
{
    public $timestaps = false;
    
    protected $fillable = [
        'id', 'fecha_inicio', 'fecha_fin', 'destino', 'empleado_id', 'vehiculo_id',
        'carga'
    ];

}
