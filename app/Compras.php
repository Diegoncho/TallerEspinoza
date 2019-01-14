<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compras extends Model
{
    public function detail(){
        return $this->hasMany('App\CompraDetalle', 'compras_id');
    }

    public function proveedor(){
        return $this->belongsTo('App\Proveedores','proveedor_id');
    }

    public function scopeName($query, $name)
    {
        if (trim($name) != ""){

            $query->where(\DB::raw("CONCAT(id)"), "LIKE", "%$name%");
        }
        
    }
}
