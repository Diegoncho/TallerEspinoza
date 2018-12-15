<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pmarcas extends Model
{
    public $timestaps = false;

    protected $fillable = [
        'id', 'marca'
    ];
}
