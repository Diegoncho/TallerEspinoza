<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehiculos extends Model
{
    public $timestaps = false;
    
    protected $fillable = [
        'id', 'marca_id', 'modelo_id', 'color', 'matricula', 'anio'
    ];
}
