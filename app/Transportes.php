<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transportes extends Model
{
    public $timestaps = false;
    
    protected $fillable = [
        'id', 'empleado_id', 'destino', 'fecha_inicio', 'fecha_fin', 'vehiculo_id',
        'carga', 'tipo_ser'
    ];
}
