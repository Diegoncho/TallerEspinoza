<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Transportes;
use App\Vehiculos;
use App\Empleados;
use App\VistaVehiculos;
use App\VistaTransportes;

class TransporteController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request){

        $VistaTransportes = VistaTransportes::name($request->get('name'))->orderby('id','ASC')->paginate(7);

        return view('CrudTransportes.transporte' , compact('VistaTransportes'));
    }

    public function create(){
        
        $Empleados = Empleados::all();
        $VistaVehiculos = VistaVehiculos::all();

        return view('CrudTransportes.transporteAdd', compact('Empleados','VistaVehiculos'));
    }

    public function edit($id){

        $Transportes = Transportes::findOrFail($id);
        $VistaTransportes = VistaTransportes::findOrFail($id);
        $Empleados = Empleados::all();
        $VistaVehiculos = VistaVehiculos::all();

        return view('CrudTransportes.transporteEdit', compact('Transportes','VistaTransportes','Empleados','VistaVehiculos'));
    }

    public function post(Request $request){

        $validator = Validator::make($request->all(),[
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'date',
            'destino' => 'required|max:255',
            'empleado_id' => 'required',
            'vehiculo_id' => 'required',
            'carga' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('/transporteAdd')
            ->withInput()
            ->withErrors($validator);
        }

            $Transportes = new Transportes;

            $Transportes->fecha_inicio = $request->fecha_inicio;
            $Transportes->fecha_fin = $request->fecha_fin;
            $Transportes->destino = $request->destino;
            $Transportes->empleado_id = $request->empleado_id;
            $Transportes->vehiculo_id = $request->vehiculo_id;
            $Transportes->carga = $request->carga;

            $Transportes->save();

            return redirect('/transporte');
    }

    public function put(Request $request, $id){

        $validator = Validator::make($request->all(),[
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'date',
            'destino' => 'required|max:255',
            'empleado_id' => 'required',
            'vehiculo_id' => 'required',
            'carga' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect("/transporteEdit/$id")
            ->withInput()
            ->withErrors($validator);
        }

            $Transportes = Transportes::findOrFail($id);

            $Transportes->fecha_inicio = $request->fecha_inicio;
            $Transportes->fecha_fin = $request->fecha_fin;
            $Transportes->destino = $request->destino;
            $Transportes->empleado_id = $request->empleado_id;
            $Transportes->vehiculo_id = $request->vehiculo_id;
            $Transportes->carga = $request->carga;

            $Transportes->save();

            return redirect('/transporte');
    }

    public function delete($id){
        
        $Transportes = Transportes::findOrFail($id);

        $Transportes->delete();

        \Session::flash('message', $Transportes->destino.' Fue eliminado.');

        return redirect('/transporte');
    }
}
