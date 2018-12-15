<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VistaVehiculos extends Model
{
    public $timestaps = false;

    public $table = "vta_vehiculos";

    protected $fillable = [
        'id', 'marca_id', 'marca', 'modelo_id', 'modelo', 'color', 'matricula', 'anio'
    ];

    public function scopeName($query, $name)
    {
        if (trim($name) != ""){

            $query->where(\DB::raw("CONCAT(marca, ' ' ,modelo)"), "LIKE", "%$name%");
        }

    }
}
