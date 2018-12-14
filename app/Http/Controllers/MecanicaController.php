<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Vehiculos;
use App\Empleados;
use App\Mecanicas;

class MecanicaController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request){

        $Mecanicas = Mecanicas::name($request->get('name'))->orderby('id','ASC')->paginate(7);

        return view('CrudMecanicas.mecanica' , compact('Mecanicas'));
    }

    public function create(){
        
        $Empleados = Empleados::all();
        $Vehiculos = Vehiculos::all();

        return view('CrudMecanicas.mecanicaAdd', compact('Empleados','Vehiculos'));
    }

    public function post(Request $request){

        $validator = Validator::make($request->all(),[
            'vehiculo_id' => 'required',
            'empleado_id' => 'required',
            'fecha_recibido' => 'required|date',
            'diagnostico' => 'required|max:50',
            'cambios_repuestos' => 'required|max:20',
            'fecha_entrega' => 'date',
            'total_repuestos' => 'required',
            'total_mano_obra' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/mecanicaAdd')
            ->withInput()
            ->withErrors($validator);
        }

            $Mecanicas = new Mecanicas;

            $Mecanicas->vehiculo_id = $request->vehiculo_id;
            $Mecanicas->empleado_id = $request->empleado_id;
            $Mecanicas->fecha_recibido = $request->fecha_recibido;
            $Mecanicas->diagnostico = $request->diagnostico;
            $Mecanicas->cambios_repuestos = $request->cambios_repuesto;
            $Mecanicas->fecha_entrega = $request->fecha_entrega;
            $Mecanicas->total_repuestos = $request->total_repuestos;
            $Mecanicas->color = $request->total_mano_obra;

            $Mecanicas->save();

            return redirect('/mecanica');
    }
}
