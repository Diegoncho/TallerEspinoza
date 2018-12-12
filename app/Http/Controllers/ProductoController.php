<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Productos;

class ProductoController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){

        $Productos = Productos::orderby('id','ASC')->paginate(1);

        return view('CrudProductos.producto' , compact('Productos'));
    }

    public function create(){

        return view('CrudProductos.productoAdd');
    }

    public function post(Request $request){

        $validator = Validator::make($request->all(),[
            'nombres' => 'required|max:255',
            'marca' => 'required|max:255',
            'descripcion' => 'required|max:255',
            'condicion' => 'required|max:100',
            'vl_precio_compra' => 'required',
            'precio_unitario' => 'required',
            'c_existencia' => 'required',
            'estado' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/productoAdd')
            ->withInput()
            ->withErrors($validator);
        }

            $Productos = new Productos;

            $Productos->nombres = $request->nombres;
            $Productos->marca = $request->marca;
            $Productos->descripcion = $request->descripcion;
            $Productos->condicion = $request->condicion;
            $Productos->vl_precio_compra = $request->vl_precio_compra;
            $Productos->precio_unitario = $request->precio_unitario;
            $Productos->c_existencia = $request->c_existencia;
            $Productos->estado = $request->estado;

            $Productos->save();

            return redirect('/producto');
    }

}
