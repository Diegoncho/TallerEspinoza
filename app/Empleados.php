<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleados extends Model
{
    public $timestaps = false;
    
    protected $fillable = [
        'id', 'nombres', 'apellidos', 'direccion', 'telefono', 'edad',
        'fecha_nac', 'estado_civil', 'sexo', 'departamento_id', 'dui',
        'nit', 'afp', 'email', 'img'
    ];

    public function getFullNameAttribute()
    {
        return $this->nombres.' '.$this->apellidos;
    }

    public function scopeName($query, $name)
    {
        if (trim($name) != ""){

            $query->where(\DB::raw("CONCAT(nombres, ' ' ,apellidos)"), "LIKE", "%$name%");
        }

    }
}
