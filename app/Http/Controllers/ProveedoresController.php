<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Clientes;

class ProveedoresController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){

        $Clientes = Clientes::orderby('id','ASC')->paginate(1);

        return view('CrudProveedores.Proveedores' , compact('Proveedores'));
    }


    public function post(Request $request){

        $validator = Validator::make($request->all(),[
            'nombres_proveedor' => 'required|max:255',
            'Nombre_contacto' => 'required|max:255',
            'cargo_contacto' => 'required|max:255',
            'telefono' => 'required|max:10',
            'ciudad' => 'required|max:20',
            'pais' => 'required|max:20',
            'direccion' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/proveedorAdd')
            ->withInput()
            ->withErrors($validator);
        }

            $Proveedor = new Proveedor;

            $Proveedor->nombres_proveedor = $request->nombres_proveedor;
            $Proveedor->nombre_contacto = $request->nombre_contacto;
            $Proveedor->cargo_contacto = $request->cargo_contacto;
            $Proveedor->telefono = $request->telefono;
            $Proveedor->ciudad = $request->ciudad;
            $Proveedor->pais = $request->pais;
            $Proveedor->direccion = $request->direccion;

            $Proveedor->save();

            return redirect('/menu');
    }
}
