<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Clientes;

class ClientesController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){

        $Clientes = Clientes::orderby('id','ASC')->paginate(1);

        return view('CrudClientes.Clientes' , compact('Clientes'));
    }


    public function post(Request $request){

        $validator = Validator::make($request->all(),[
            'nombres' => 'required|max:255',
            'apellidos' => 'required|max:255',
            'direccion' => 'required',
            'telefono' => 'required|max:10',
            'dui' => 'required|max:20',
            'nit' => 'required|max:20',
        ]);

        if ($validator->fails()) {
            return redirect('/clienteAdd')
            ->withInput()
            ->withErrors($validator);
        }

            $Clientes = new Clientes;

            $Clientes->nombres = $request->nombres;
            $Clientes->apellidos = $request->apellidos;
            $Clientes->direccion = $request->direccion;
            $Clientes->telefono = $request->telefono;
            $Clientes->dui = $request->dui;
            $Clientes->nit = $request->nit;

            $Empleados->save();

            return redirect('/menu');
    }

}