<?php

namespace App\Repositories;

use App\Clientes;

class ClienteRepository 
{
    private $model;

    public function __construct() {

        $this->model = new Clientes();
    }

    public function findByName($q){

        return $this->model->where('nombres', 'like', "%$q%")
                    ->get();
    }
}