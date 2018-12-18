<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Productos;
use App\Pmarcas;
use App\VistaProductos;

class ProductoController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request){

        $VistaProductos = VistaProductos::name($request->get('name'))->orderby('id','ASC')->paginate(7);

        return view('CrudProductos.producto', compact('VistaProductos'));
    }

    public function view($id){

        $Productos = Productos::findOrFail($id);
        $VistaProductos = VistaProductos::findOrFail($id);
        $Pmarcas = Pmarcas::all();

        return view('CrudProductos.productoView', compact('Productos','VistaProductos','Pmarcas'));
    }

    public function create(){

        $Pmarcas = Pmarcas::all();

        return view('CrudProductos.productoAdd', compact('Pmarcas'));
    }

    public function edit($id){

        $Productos = Productos::findOrFail($id);
        $VistaProductos = VistaProductos::findOrFail($id);
        $Pmarcas = Pmarcas::all();

        return view('CrudProductos.productoEdit', compact('Productos','VistaProductos','Pmarcas'));
    }

    public function post(Request $request){

        $validator = Validator::make($request->all(),[
            'nombre' => 'required|max:255',
            'marca_id' => 'required',
            'descripcion' => 'required|max:250',
            'estado' => 'required',
            'cantidad' => 'required',
            'precio_costo' => 'required',
            'precio_mayoreo' => 'required',
            'precio_regular' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/productoAdd')
            ->withInput()
            ->withErrors($validator);
        }

            $Productos = new Productos;

            $Productos->nombre = $request->nombre;
            $Productos->marca_id = $request->marca_id;
            $Productos->descripcion = $request->descripcion;
            $Productos->estado = $request->estado;
            $Productos->cantidad = $request->cantidad;
            $Productos->precio_costo = $request->precio_costo;
            $Productos->precio_mayoreo = $request->precio_mayoreo;
            $Productos->precio_regular = $request->precio_regular;

            $Productos->save();

            return redirect('/producto');
    }

    public function put(Request $request, $id){

        $validator = Validator::make($request->all(),[
            'nombre' => 'required|max:255',
            'marca_id' => 'required',
            'descripcion' => 'required|max:250',
            'estado' => 'required',
            'cantidad' => 'required',
            'precio_costo' => 'required',
            'precio_mayoreo' => 'required',
            'precio_regular' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect("/productoEdit/$id")
            ->withInput()
            ->withErrors($validator);
        }

            $Productos = Productos::findOrFail($id);

            $Productos->nombre = $request->nombre;
            $Productos->marca_id = $request->marca_id;
            $Productos->descripcion = $request->descripcion;
            $Productos->estado = $request->estado;
            $Productos->cantidad = $request->cantidad;
            $Productos->precio_costo = $request->precio_costo;
            $Productos->precio_mayoreo = $request->precio_mayoreo;
            $Productos->precio_regular = $request->precio_regular;

            $Productos->save();

            return redirect('/producto');
    }

    public function delete($id){
        
        $Productos = Productos::findOrFail($id);

        $Productos->delete();

        \Session::flash('message', $Productos->nombre.' Fue eliminado.');

        return redirect('/producto');
    }
}
