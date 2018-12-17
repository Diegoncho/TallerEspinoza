<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modelos extends Model
{
    public $timestaps = false;

    protected $fillable = [
        'id', 'modelo'
    ]; 

    public function scopeName($query, $name)
    {
        if (trim($name) != ""){

            $query->where(\DB::raw("CONCAT(modelo)"), "LIKE", "%$name%");
        }

    }
}
