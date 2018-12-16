<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VistaMecanicas extends Model
{
    public $timestaps = false;
    
    public $table = "vta_mecanicas";

    protected $fillable = [
        'id', 'fecha_recibido', 'fecha_entrega', 'diagnostico', 'cambios_repuestos', 'empleado_id',
        'nombres', 'apellidos', 'total_repuesto', 'total_mano_obra'
    ];

    public function scopeName($query, $name)
    {
        if (trim($name) != ""){

            $query->where(\DB::raw("CONCAT(diagnostico, ' ' ,nombres)"), "LIKE", "%$name%");
        }

    }
}
