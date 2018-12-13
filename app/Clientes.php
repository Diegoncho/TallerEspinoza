<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    public $timestaps = false;
    
    protected $fillable = [
        'id', 'nombres', 'apellidos', 'direccion', 'telefono', 'dui',
        'nit'
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
