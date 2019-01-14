<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompraDetalle extends Model
{
    public $table = "compra_detalle";

    public function product(){
        return $this->belongsTo('App\Productos', 'producto_id');
    }
}
