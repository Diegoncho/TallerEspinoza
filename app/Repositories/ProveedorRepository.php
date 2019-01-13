<?php

namespace App\Repositories;

use App\Proveedores;

class ProveedorRepository 
{
    private $model;

    public function __construct() {

        $this->model = new Proveedores();
    }

    public function findByName($q){

        return $this->model->where('nombre_proveedor', 'like', "%$q%")
                    ->get();
    }
}