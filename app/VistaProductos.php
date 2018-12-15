<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VistaProductos extends Model
{
    public $timestaps = false;

    public $table = "vta_productos";
    
    protected $fillable = [
        'id', 'nombre', 'marca_id', 'marca', 'descripcion', 'estado', 'cantidad', 'precio_costo',
        'precio_mayoreo', 'precio_regular'
    ];

    public function scopeName($query, $name)
    {
        if (trim($name) != ""){

            $query->where(\DB::raw("CONCAT(nombre)"), "LIKE", "%$name%");
        }

    }
}
