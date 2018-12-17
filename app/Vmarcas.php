<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vmarcas extends Model
{
    public $timestaps = false;

    protected $fillable = [
        'id', 'marca'
    ];

    public function scopeName($query, $name)
    {
        if (trim($name) != ""){

            $query->where(\DB::raw("CONCAT(marca)"), "LIKE", "%$name%");
        }

    }
}
