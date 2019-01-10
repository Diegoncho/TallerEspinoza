<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleFactura extends Model
{
    public $table = 'detallefactura';
    
    protected $fillable = [
        'id', 'producto_id', 'mecanica_id', 'factura_id', 'cantidad'
    ];
}
