<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VistaTransportes extends Model
{
    public $timestaps = false;
    
    public $table = "vta_transportes";

    protected $fillable = [
        'id', 'fecha_inicio', 'fecha_fin', 'destino', 'empleado_id', 'nombres', 'apellidos', 'vehiculo_id',
        'modelo', 'carga'
    ];

    public function scopeName($query, $name)
    {
        if (trim($name) != ""){

            $query->where(\DB::raw("CONCAT(destino, ' ' ,nombres)"), "LIKE", "%$name%");
        }

    }
}
