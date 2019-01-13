<?php

namespace App\Repositories;

use App\Mecanicas;

class MecanicaRepository 
{
    private $model;

    public function __construct() {

        $this->model = new Mecanicas();
    }

    public function findByName($q){

        return $this->model->where('diagnostico', 'like', "%$q%")
                    ->get();
    }
}