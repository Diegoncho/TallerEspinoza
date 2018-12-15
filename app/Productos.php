<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    public $timestaps = false;
    
    protected $fillable = [
        'id', 'nombre', 'marca_id', 'descripcion', 'estado', 'cantidad', 'precio_costo',
        'precio_mayoreo', 'precio_regular'
    ];
}
