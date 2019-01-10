<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CabeceraFactura extends Model
{
    public $table = 'cabecerafactura';
    
    protected $fillable = [
        'id', 'fecha', 'cliente_id' 
    ];
}
