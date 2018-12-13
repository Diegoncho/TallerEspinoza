<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Vehiculos;
use App\Empleados;

class VehiculoController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request){

        $Vehiculos = Vehiculos::name($request->get('name'))->orderby('id','ASC')->paginate(7);

        return view('CrudVehiculos.vehiculo' , compact('Vehiculos'));
    }

    public function create(){
        
        $Empleados = Empleados::all();

        return view('CrudVehiculos.vehiculoAdd', compact('Empleados'));
    }

    public function post(Request $request){

        $validator = Validator::make($request->all(),[
            'tipo_vehiculo' => 'required|max:255',
            'marca' => 'required|max:255',
            'modelo' => 'required|max:255',
            'numero_placa' => 'required|max:20',
            'capacidad' => 'required|max:100',
            'color' => 'required|max:100',
            'empleado_id' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/vehiculoAdd')
            ->withInput()
            ->withErrors($validator);
        }

            $Vehiculos = new Vehiculos;

            $Vehiculos->tipo_vehiculo = $request->tipo_vehiculo;
            $Vehiculos->marca = $request->marca;
            $Vehiculos->modelo = $request->modelo;
            $Vehiculos->numero_placa = $request->numero_placa;
            $Vehiculos->capacidad = $request->capacidad;
            $Vehiculos->color = $request->color;
            $Vehiculos->empleado_id = $request->empleado_id;

            $Vehiculos->save();

            return redirect('/vehiculo');
    }
}
