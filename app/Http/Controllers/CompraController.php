<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Proveedor;
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
    
        return view('CrudProveedores.proveedorView', compact('Proveedores'));
    }

    public function create(){
        
        $Proveedores = Proveedores::all();

        return view('CrudCompras.compraAdd', compact('Proveedores'));
    }

    public function post(Request $request){

        $validator = Validator::make($request->all(),[
            'proveedor_id' => 'required',
            'fecha' => 'required|date',
            'nombre_producto' => 'required|max:255',
            'cantidad' => 'required',
            'precio_unitario' => 'required',
            'iva' => 'required',
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
            $Compras->nombre_producto = $request->nombre_producto;
            $Compras->cantidad = $request->cantidad;
            $Compras->precio_unitario = $request->precio_unitario;
            $Compras->iva = $request->iva;
            $Compras->subtotal = $request->cantidad * $request->precio_unitario;
            $Compras->descuento = $request->descuento;
            $Compras->total = $request->subtotal + ($request->subtotal / $request->descuento);

            $Compras->save();

            return redirect('/compra');
    }
}
