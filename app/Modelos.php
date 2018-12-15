<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modelos extends Model
{
    public $timestaps = false;

    protected $fillable = [
        'id', 'modelo'
    ];
}
