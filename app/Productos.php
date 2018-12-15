<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    public $timestaps = false;
    
    protected $fillable = [
        'id', 'nombre', 'marca', 'descripcion', 'estado', 'cantidad', 'precio_costo'
    ];
}
