<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedores extends Model
{
    public $timestaps = false;
    
    protected $fillable = [
        'id', 'nombre_proveedor', 'nombre_contacto','cargo_contacto','telefono','ciudad','pais',
        'direccion'
    ];
}
