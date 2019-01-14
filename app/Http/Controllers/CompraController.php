<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request,PDF;

use App\Proveedores;
use App\Productos;
use App\Compras;

class CompraController extends Controller
{
      public function __construct(){
        $this->middleware('auth');
    }

    public function index(){

        $Compras = Compras::orderby('id','ASC')->paginate(7);

        return view('CrudCompras.compra' , compact('Compras'));
    }

    public function view($id){

        $Proveedores = Proveedores::findOrFail($id);
        $Producto = Producto::findOrFail($id);
    
        return view('CrudCompra.CompraView', compact('Proveedores','Producto'));
    }

    public function create(){
        
        $Proveedores = Proveedores::all();
        $Producto = Producto::all();

        return view('CrudCompras.compraAdd', compact('Proveedores','Producto'));
    }

    public function post(Request $request){

        $validator = Validator::make($request->all(),[
            'proveedor_id' => 'required',
            'fecha' => 'required|date',
            'producto_id' => 'required',
            'cantidad' => 'required',
            'precio_unitario' => 'required',
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
            $Producto = Producto::findOrFail($id);
            $Compras->cantidad = $request->cantidad;
            $Compras->precio_unitario = $Producto->precio_costo;
            $Compras->subtotal = $Compras->cantidad * $Compras->precio_unitario;
            $Compras->descuento = $request->descuento;
            $Compras->total = $Compras->subtotal - ($Compras->subtotal / $Compras->descuento);

            $Compras->save();

            $Producto->cantidad = $Producto->cantidad + $Compras->cantidad;
            $Producto->save();

            return redirect('/compra');
    }
}
