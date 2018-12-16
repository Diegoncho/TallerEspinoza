<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Mecanicas;
use App\Empleados;
use App\VistaMecanicas;

class MecanicaController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request){

        $VistaMecanicas = VistaMecanicas::name($request->get('name'))->orderby('id','ASC')->paginate(7);

        return view('CrudMecanicas.mecanica' , compact('VistaMecanicas'));
    }

    public function create(){
        
        $Empleados = Empleados::all();

        return view('CrudMecanicas.mecanicaAdd', compact('Empleados'));
    }

    public function edit($id){

        $Mecanicas = Mecanicas::findOrFail($id);
        $VistaMecanicas = VistaMecanicas::findOrFail($id);
        $Empleados = Empleados::all();

        return view('CrudMecanicas.mecanicaEdit', compact('Mecanicas','VistaMecanicas','Empleados'));
    }

    public function post(Request $request){

        $validator = Validator::make($request->all(),[
            'fecha_recibido' => 'required|date',
            'fecha_entrega' => 'date',
            'diagnostico' => 'required|max:100',
            'cambios_repuestos' => 'required',
            'empleado_id' => 'required',
            'total_repuesto' => 'required',
            'total_mano_obra' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/mecanicaAdd')
            ->withInput()
            ->withErrors($validator);
        }

            $Mecanicas = new Mecanicas;

            $Mecanicas->fecha_recibido = $request->fecha_recibido;
            $Mecanicas->fecha_entrega = $request->fecha_entrega;
            $Mecanicas->diagnostico = $request->diagnostico;
            $Mecanicas->cambios_repuestos = $request->cambios_repuestos;
            $Mecanicas->empleado_id = $request->empleado_id;
            $Mecanicas->total_repuesto = $request->total_repuesto;
            $Mecanicas->total_mano_obra = $request->total_mano_obra;

            $Mecanicas->save();

            return redirect('/mecanica');
    }

    public function put(Request $request, $id){

        $validator = Validator::make($request->all(),[
            'fecha_recibido' => 'required|date',
            'fecha_entrega' => 'date',
            'diagnostico' => 'required|max:100',
            'cambios_repuestos' => 'required',
            'empleado_id' => 'required',
            'total_repuesto' => 'required',
            'total_mano_obra' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect("/mecanicaEdit/$id")
            ->withInput()
            ->withErrors($validator);
        }

            $Mecanicas = Mecanicas::findOrFail($id);

            $Mecanicas->fecha_recibido = $request->fecha_recibido;
            $Mecanicas->fecha_entrega = $request->fecha_entrega;
            $Mecanicas->diagnostico = $request->diagnostico;
            $Mecanicas->cambios_repuestos = $request->cambios_repuestos;
            $Mecanicas->empleado_id = $request->empleado_id;
            $Mecanicas->total_repuesto = $request->total_repuesto;
            $Mecanicas->total_mano_obra = $request->total_mano_obra;

            $Mecanicas->save();

            return redirect('/mecanica');
    }

    public function delete($id){
        
        $Mecanicas = Mecanicas::findOrFail($id);

        $Mecanicas->delete();

        \Session::flash('message', $Mecanicas->diagnostico.' Fue eliminado.');

        return redirect('/mecanica');
    }
}
