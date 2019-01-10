<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VistaFacturas extends Model
{
    public $timestaps = false;

    public $table = "vta_facturas";

    protected $fillable = [
        'id', 'fecha', 'producto_id', 'producto', 'marca_id', 'marca',
        'cantidad', 'precio_costo', 'precio_mayoreo', 'precio_regular',
        'mecanica_id', 'diagnostico', 'total_repuesto', 'total_mano_obra',
        'cliente_id', 'nombres', 'apellidos', 'direccion', 'telefono'
    ];

    public function scopeName($query, $name)
    {
        if (trim($name) != ""){

            $query->where(\DB::raw("CONCAT(id, ' ' ,nombres, ' ' ,apellidos)"), "LIKE", "%$name%");
        }

    }
}
