<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class McomprobanteDetalle extends Model
{
    public $table = "mcomprobante_detalle";

    public function mecanica(){
        return $this->belongsTo('App\Mecanicas', 'mecanica_id');
    }
}
