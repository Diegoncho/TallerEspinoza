<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Proveedores;
use App\Productos;
use App\Compras;
use App\VistaCompras;

class CompraController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request){

        $VistaCompras = VistaCompras::name($request->get('name'))->orderby('id','ASC')->paginate(7);

        return view('CrudCompras.compra' , compact('VistaCompras'));
    }

    public function view($id){

        $VistaCompras = VistaCompras::findOrFail($id);
        $Compras = Compras::findOrFail($id);
    
        return view('CrudCompras.compraView', compact('VistaCompras','Compras'));
    }

    public function create(){
        
        $Proveedores = Proveedores::all();
        $Productos = Productos::all();

        return view('CrudCompras.compraAdd', compact('Proveedores','Productos'));
    }

    public function post(Request $request){

        $validator = Validator::make($request->all(),[
            'proveedor_id' => 'required',
            'fecha' => 'required|date',
            'producto_id' => 'required',
            'cantidad' => 'required',
            'descuento' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/compraAdd')
            ->withInput()
            ->withErrors($validator);
        }

            $Compras = new Compras;

            $Compras->proveedor_id = $request->proveedor_id;
            $Compras->fecha = $request->fecha;
            $Compras->producto_id = $request->producto_id;
            $Compras->cantidad = $request->cantidad;
            $Compras->descuento = $request->descuento;

            $Productos = Productos::findOrFail($request->producto_id);

            $Compras->total = $Productos->precio_costo * $Compras->cantidad;
            $Compras->subtotal =  $Compras->total / $Compras->descuento;
            $Compras->descuento = $Compras->total - $Compras->subtotal;

            $Compras->save();

            $Productos->cantidad = $Productos->cantidad + $Compras->cantidad;

            $Productos->save();

            return redirect('/compra');
    }

    public function delete($id){
        
        $Compras = Compras::findOrFail($id);

        $Compras->delete();

        \Session::flash('message', $Compras->id.' Fue eliminado.');

        return redirect('/compra');
    }
}
