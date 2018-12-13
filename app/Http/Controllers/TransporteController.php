<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Vehiculos;
use App\Empleados;
use App\Transportes;

class TransporteController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request){

        $Transportes = Transportes::name($request->get('name'))->orderby('id','ASC')->paginate(7);

        return view('CrudTrasnportes.transporte' , compact('Transportes'));
    }

    public function create(){
        
        $Empleados = Empleados::all();
        $Vehiculos = Vehiculos::all();

        return view('CrudTransportes.transporteAdd', compact('Empleados','Vehiculos'));
    }

    public function post(Request $request){

        $validator = Validator::make($request->all(),[
            'empleado_id' => 'required',
            'destino' => 'required|max:255',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'date',
            'vehiculo_id' => 'required',
            'carga' => 'required|max:25',
            'tipo_ser' => 'required|max:25',
        ]);

        if ($validator->fails()) {
            return redirect('/transporteAdd')
            ->withInput()
            ->withErrors($validator);
        }

            $Transportes = new Trasnportes;

            $Transportes->empleado_id = $request->empleado_id;
            $Transportes->destino = $request->destino;
            $Transportes->fecha_inicio = $request->fecha_inicio;
            $Transportes->fecha_fin = $request->fecha_fin;
            $Transportes->vehiculo_id = $request->vehiculo_id;
            $Transportes->carga = $request->carga;
            $Transportes->tipo_ser = $request->tipo_ser;

            $Transportes->save();

            return redirect('/transporte');
    }
}
