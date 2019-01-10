<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\CabeceraFactura;
use App\DetalleFactura;
use App\Productos;
use App\Clientes;
use App\Mecanicas;
use App\VistaProductos;
use App\VistaMecanicas;
use App\VistaFacturas;

class FacturaController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request){

        $VistaFacturas = VistaFacturas::name($request->get('name'))->orderby('id','ASC')->paginate(7);

        return view('CrudFacturas.factura', compact('VistaFacturas'));
    }

    public function getProducto($id){
        
        $VistaProductos = VistaProductos::FindOrFail($id);

        return $VistaProductos->only('marca','precio_costo','precio_mayoreo','precio_regular');
    }

    public function getMecanica($id){
        
        $Mecanicas = Mecanicas::FindOrFail($id);

        return $Mecanicas->only('total_repuesto','total_mano_obra');
    }
    
    public function getCliente($id){
        
        $Clientes = Clientes::FindOrFail($id);

        return $Clientes->only('direccion', 'telefono');
    }

    public function create(){

        $Productos = Productos::all();
        $Mecanicas = Mecanicas::all();
        $Clientes = Clientes::all();
 
        return view('CrudFacturas.facturaAdd', compact('Productos','Clientes','Mecanicas'));
    }

    public function view($id){

        $CabeceraFactura = CabeceraFactura::findOrFail($id);
        $DetalleFactura = DetalleFactura::findOrFail($id);
        $VistaFacturas = VistaFacturas::findOrFail($id);

        return view('CrudFacturas.facturaView', compact('CabeceraFactura','DetalleFactura','VistaFacturas'));
    }

    public function edit($id){

        $VistaFacturas = VistaFacturas::findOrFail($id);
        $CabeceraFactura = CabeceraFactura::findOrFail($id);
        $DetalleFactura = DetalleFactura::findOrFail($id);
        $Productos = Productos::all();
        $Mecanicas = Mecanicas::all();
        $Clientes = Clientes::all();
        

        return view('CrudFacturas.facturaEdit', compact('CabeceraFactura','DetalleFactura','Productos','Mecanicas','Clientes','VistaFacturas'));
    }

    public function post(Request $request){

        $validator = Validator::make($request->all(),[
            'fecha' => 'required|date',
            'producto_id',
            'mecanica_id',
            'cliente_id' => 'required',
            'cantidad' => 'required',
            'precio_factura' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/facturaAdd')
            ->withInput()
            ->withErrors($validator);
        }

            $CabeceraFactura = new CabeceraFactura;

            $CabeceraFactura->fecha = $request->fecha;
            $CabeceraFactura->cliente_id = $request->cliente_id;
            
            $CabeceraFactura->save(); 

            $DetalleFactura = new DetalleFactura;

            $DetalleFactura->producto_id = $request->producto_id;
            $DetalleFactura->precio_factura = $request->precio_factura;
            $DetalleFactura->mecanica_id = $request->mecanica_id;
            $DetalleFactura->factura_id = $CabeceraFactura->id;
            $DetalleFactura->cantidad = $request->cantidad;

            $DetalleFactura->save();

            return redirect('/factura');
    }

    public function put(Request $request, $id){

        $validator = Validator::make($request->all(),[
            'fecha' => 'required|date',
            'producto_id',
            'mecanica_id',
            'cliente_id' => 'required',
            'cantidad' => 'required',
            'precio_factura' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect("/facturaEdit/$id")
            ->withInput()
            ->withErrors($validator);
        }

            $CabeceraFactura = CabeceraFactura::findOrFail($id);

            $CabeceraFactura->fecha = $request->fecha;
            $CabeceraFactura->cliente_id = $request->cliente_id;
            
            $CabeceraFactura->save(); 

            $DetalleFactura = DetalleFactura::findOrFail($id);

            $DetalleFactura->producto_id = $request->producto_id;
            $DetalleFactura->precio_factura = $request->precio_factura;
            $DetalleFactura->mecanica_id = $request->mecanica_id;
            $DetalleFactura->factura_id = $CabeceraFactura->id;
            $DetalleFactura->cantidad = $request->cantidad;

            $DetalleFactura->save();

            return redirect('/factura');
    }

    public function delete($id){

        $CabeceraFactura = CabeceraFactura::findOrFail($id);

        $CabeceraFactura->delete();
    
        \Session::flash('message-delete', 'Factura '.$CabeceraFactura->id.' ha sido eliminada.');

        return redirect('/factura');
    }
}
