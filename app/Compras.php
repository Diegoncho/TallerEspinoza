<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compras extends Model
{
    public $timestaps = false;
    
    protected $fillable = [
        'id', 'proveedor_id', 'fecha', 'nombre_producto', 'cantidad', 'precio_unitario', 'iva',
        'subtotal', 'Descuento', 'total'
    ];
}
