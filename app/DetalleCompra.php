<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleCompra extends Model
{
    public $timestaps = false;
    
    protected $fillable = [
        'id', 'compra_id', 'producto_id', 'cantidad', 'precio_unitario'
    ];
}
