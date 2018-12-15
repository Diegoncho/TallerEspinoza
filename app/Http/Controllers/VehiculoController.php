<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Vehiculos;
use App\Vmarcas;
use App\Modelos;
use App\VistaVehiculos;

class VehiculoController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request){

        $VistaVehiculos = VistaVehiculos::name($request->get('name'))->orderby('id','ASC')->paginate(7);

        return view('CrudVehiculos.vehiculo' , compact('VistaVehiculos'));
    }

    public function create(){
        
        $Vmarcas = Vmarcas::all();
        $Modelos = Modelos::all();

        return view('CrudVehiculos.vehiculoAdd', compact('Vmarcas','Modelos'));
    }

    public function edit($id){

        $Vehiculos = Vehiculos::findOrFail($id);
        $VistaVehiculos = VistaVehiculos::findOrFail($id);
        $Vmarcas = Vmarcas::all();
        $Modelos = Modelos::all();

        return view('CrudVehiculos.vehiculoEdit', compact('Vehiculos','VistaVehiculos','Vmarcas','Modelos'));
    }

    public function post(Request $request){

        $validator = Validator::make($request->all(),[
            'marca_id' => 'required',
            'modelo_id' => 'required',
            'color' => 'required|max:255',
            'matricula' => 'required|max:255',
            'anio' => 'required|digits:4',
        ]);

        if ($validator->fails()) {
            return redirect('/vehiculoAdd')
            ->withInput()
            ->withErrors($validator);
        }

            $Vehiculos = new Vehiculos;

            $Vehiculos->marca_id = $request->marca_id;
            $Vehiculos->modelo_id = $request->modelo_id;
            $Vehiculos->color = $request->color;
            $Vehiculos->matricula = $request->matricula;
            $Vehiculos->anio = $request->anio;

            $Vehiculos->save();

            return redirect('/vehiculo');
    }

    public function put(Request $request, $id){

        $validator = Validator::make($request->all(),[
            'marca_id' => 'required',
            'modelo_id' => 'required',
            'color' => 'required|max:255',
            'matricula' => 'required|max:255',
            'anio' => 'required|max:10',
        ]);

        if ($validator->fails()) {
            return redirect("/vehiculoEdit/$id")
            ->withInput()
            ->withErrors($validator);
        }

            $Vehiculos = Vehiculos::findOrFail($id);

            $Vehiculos->marca_id = $request->marca_id;
            $Vehiculos->modelo_id = $request->modelo_id;
            $Vehiculos->color = $request->color;
            $Vehiculos->matricula = $request->matricula;
            $Vehiculos->anio = $request->anio;

            $Vehiculos->save();

            return redirect('/vehiculo');
    }

    public function delete($id){
        
        $Vehiculos = Vehiculos::findOrFail($id);
        $VistaVehiculos = VistaVehiculos::findOrFail($id);

        $Vehiculos->delete();

        \Session::flash('message', $VistaVehiculos->modelo.' Fue eliminado.');

        return redirect('/vehiculo');
    }
}
