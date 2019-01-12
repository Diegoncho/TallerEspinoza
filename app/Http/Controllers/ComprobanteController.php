<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\ClienteRepository;

class ComprobanteController extends Controller
{
    private $_clienteRepo;

    public function __construct(ClienteRepository $clienteRepo){

        $this->middleware('auth');

        $this->_clienteRepo = $clienteRepo;
    }

    public function index(){

        return view('CrudFacturas.factura');
    }

    public function create(){

        return view('CrudFacturas.facturaAdd');
    }

    public function findClient(Request $request){

        return $this->_clienteRepo->findByName($request->input('q'));
    }

}
