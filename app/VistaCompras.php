<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VistaCompras extends Model
{
    public $timestaps = false;
    
    public $table = "vta_compras";

    protected $fillable = [
        'id', 'proveedor_id', 'proveedor', 'telefono', 'fecha', 'producto_id', 'producto',
        'precio_costo', 'cantidad', 'subtotal', 'descuento', 'total'
    ];

    public function scopeName($query, $name)
    {
        if (trim($name) != ""){

            $query->where(\DB::raw("CONCAT(proveedor, ' ' ,fecha, ' ' ,producto)"), "LIKE", "%$name%");
        }

    }
}
