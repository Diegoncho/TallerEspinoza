<?php

namespace App\Repositories;

use App\Mcomprobantes;
use App\McomprobanteDetalle;
use DB;

class McomprobanteRepository 
{
    private $model;

    public function __construct() {

        $this->model = new Mcomprobantes();
    }

    public function get($id) {
        
        return $this->model->find($id);
    }

    public function getAll(){

        return $this->model->orderBy('id', 'desc')->paginate(7); 
    }

    public function save($data){
        $return = (object)[
            'response' => false
        ];

        try {
            DB::beginTransaction();

            $this->model->iva = $data->iva;
            $this->model->subtotal = $data->subtotal;
            $this->model->total = $data->total;
            $this->model->cliente_id = $data->cliente_id;

            $this->model->save();

            $detail = [];
            foreach($data->detail as $d) {
                $obj = new McomprobanteDetalle;

                $obj->mecanica_id = $d->mecanica_id;
                $obj->precio_unitario = $d->precio_unitario;
                $obj->total = $d->total;

                $detail[] = $obj;
            }

            $this->model->detail()->saveMany($detail);
            $return->response = true;

            DB::commit();
        } catch (\Exception $e){
            DB::rollBack();
        }

        return json_encode($return);
    }
}