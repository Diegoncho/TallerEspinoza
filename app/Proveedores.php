<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedores extends Model
{
    public $timestaps = false;
    
    protected $fillable = [
        'id', 'nombre_proveedor', 'nombre_contacto', 'cargo_contacto', 'telefono',
        'ciudad', 'pais', 'direccion' 
    ];

    public function scopeName($query, $name)
    {
        if (trim($name) != ""){

            $query->where(\DB::raw("CONCAT(nombre_proveedor, ' ' ,nombre_contacto)"), "LIKE", "%$name%");
        }

    }
}
