<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Clientes;

class ClienteController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request){

        $Clientes = Clientes::name($request->get('name'))->orderby('id','ASC')->paginate(7);

        return view('CrudClientes.cliente' , compact('Clientes'));
    }

    public function create(){

        return view('CrudClientes.clienteAdd');
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

            $Clientes->save();

            return redirect('/cliente');
    }

    public function delete($id){
        
        $Clientes = Clientes::findOrFail($id);

        $Clientes->delete();

        \Session::flash('message', $Clientes->nombres.' '. $Clientes->apellidos.' Fue eliminado.');

        return redirect('/cliente');
    }

}
