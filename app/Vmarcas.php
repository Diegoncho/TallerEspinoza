<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vmarcas extends Model
{
    public $timestaps = false;

    protected $fillable = [
        'id', 'marca'
    ];
}
