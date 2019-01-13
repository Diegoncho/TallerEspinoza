<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comprobantes extends Model
{
    public function detail(){
        return $this->hasMany('App\ComprobanteDetalle', 'comprobantes_id');
    }

    public function client(){
        return $this->belongsTo('App\Clientes','cliente_id');
    }

    public function scopeName($query, $name)
    {
        if (trim($name) != ""){

            $query->where(\DB::raw("CONCAT(id)"), "LIKE", "%$name%");
        }
        
    }
}
