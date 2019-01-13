<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compras extends Model
{
    public function detail(){
        return $this->hasMany('App\DetalleCompra', 'compra_id');
    }

    public function client(){
        return $this->belongsTo('App\Proveedores','proveedor_id');
    }
}
