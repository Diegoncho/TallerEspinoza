<?php

namespace App\Repositories;

use App\Productos;

class ProductoRepository 
{
    private $model;

    public function __construct() {

        $this->model = new Productos();
    }

    public function findByName($q){

        return $this->model->where('nombre', 'like', "%$q%")
                    ->get();
    }
}