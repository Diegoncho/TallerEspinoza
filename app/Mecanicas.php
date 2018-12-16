<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mecanicas extends Model
{
    public $timestaps = false;
    
    protected $fillable = [
        'id', 'fecha_recibido', 'fecha_entrega', 'diagnostico', 'cambios_repuestos', 'empleado_id',
        'total_repuesto', 'total_mano_obra'
    ];
}
