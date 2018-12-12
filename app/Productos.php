<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    public $timestaps = false;
    
    protected $fillable = [
        'id', 'nombres', 'marca', 'descripcion', 'condicion', 'vl_precio_compra',
        'precio_unitario', 'c_existencia', 'estado'
    ];
}
