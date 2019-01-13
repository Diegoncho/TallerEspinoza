<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComprobanteDetalle extends Model
{
    public $table = "comprobante_detalle";

    public function product(){
        return $this->belongsTo('App\Productos', 'producto_id');
    }
}
