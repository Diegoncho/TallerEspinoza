<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    //
    public $timestaps = false;
    
    protected $fillable = [
        'id', 'nombres', 'apellidos', 'direccion', 'telefono', 'dui',
        'nit'
    ];
}
