<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mecanicas extends Model
{
    public $timestaps = false;
    
    protected $fillable = [
        'id', 'vehiculo_id', 'empleado_id', 'fecha_recibido', 'diagnostico', 'cambios_repuestos',
        'fecha_entrega', 'total_repuesto', 'total_mano_obra'
    ];
}
