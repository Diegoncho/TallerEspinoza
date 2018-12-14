<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Departamentos;
use App\Empleados;
use App\VistaEmpleados;

class EmpleadoController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request){

        $Empleados = Empleados::name($request->get('name'))->orderby('id','ASC')->paginate(7);

        return view('CrudEmpleados.empleado' , compact('Empleados'));
    }

    public function create(){
        
        $Departamentos = Departamentos::all();

        return view('CrudEmpleados.empleadoAdd', compact('Departamentos'));
    }

    public function edit($id){

        $Empleados = Empleados::findOrFail($id);
        $VistaEmpleados = VistaEmpleados::findOrFail($id);
        $Departamentos = Departamentos::all();

        return view('CrudEmpleados.empleadoEdit', compact('Empleados','VistaEmpleados','Departamentos'));
    }

    public function post(Request $request){

        $validator = Validator::make($request->all(),[
            'nombres' => 'required|max:255',
            'apellidos' => 'required|max:255',
            'direccion' => 'required',
            'telefono' => 'required|max:10',
            'estado_civil' => 'required|max:255',
            'fecha_nac' => 'required|date',
            'edad' => 'required|max:5',
            'sexo' => 'required',
            'departamento_id' => 'required',
            'dui' => 'required|max:20',
            'nit' => 'required|max:20',
            'afp' => 'required|max:255',
            'email' => 'required|email',
            'img' => 'required|image',
        ]);

        if ($validator->fails()) {
            return redirect('/empleadoAdd')
            ->withInput()
            ->withErrors($validator);
        }

            $file = $request->file('img');
    
            //obtenemos el nombre del archivo
            $nombre = 'default'.time().'.'.$file->getClientOriginalExtension();

            //indicamos que queremos guardar un nuevo archivo en el disco local
            \Storage::disk('local')->put($nombre,  \File::get($file));

            $Empleados = new Empleados;

            $Empleados->nombres = $request->nombres;
            $Empleados->apellidos = $request->apellidos;
            $Empleados->direccion = $request->direccion;
            $Empleados->telefono = $request->telefono;
            $Empleados->estado_civil = $request->estado_civil;
            $Empleados->fecha_nac = $request->fecha_nac;
            $Empleados->edad = $request->edad;
            $Empleados->sexo = $request->sexo;
            $Empleados->departamento_id = $request->departamento_id;
            $Empleados->dui = $request->dui;
            $Empleados->nit = $request->nit;
            $Empleados->afp = $request->afp;
            $Empleados->email = $request->email;
            $Empleados->img = $nombre;

            $Empleados->save();

            return redirect('/empleado');
    }

    public function put(Request $request, $id){

        $validator = Validator::make($request->all(),[
            'nombres' => 'required|max:255',
            'apellidos' => 'required|max:255',
            'direccion' => 'required',
            'telefono' => 'required|max:10',
            'estado_civil' => 'required|max:255',
            'fecha_nac' => 'required|date',
            'edad' => 'required|max:5',
            'sexo' => 'required',
            'departamento_id' => 'required',
            'dui' => 'required|max:20',
            'nit' => 'required|max:20',
            'afp' => 'required|max:255',
            'email' => 'required|email',
            'img' => 'image',
        ]);

        if ($validator->fails()) {
            return redirect("/empleadoEdit/$id")
            ->withInput()
            ->withErrors($validator);
        }

        $file =$request->file('img');

        if ($file != null){
            
            $file = $request->file('img');
    
            //obtenemos el nombre del archivo
            $nombre = 'default'.time().'.'.$file->getClientOriginalExtension();

            //indicamos que queremos guardar un nuevo archivo en el disco local
            \Storage::disk('local')->put($nombre,  \File::get($file));

            $Empleados = Empleados::findOrFail($id);

            $Empleados->nombres = $request->nombres;
            $Empleados->apellidos = $request->apellidos;
            $Empleados->direccion = $request->direccion;
            $Empleados->telefono = $request->telefono;
            $Empleados->estado_civil = $request->estado_civil;
            $Empleados->fecha_nac = $request->fecha_nac;
            $Empleados->edad = $request->edad;
            $Empleados->sexo = $request->sexo;
            $Empleados->departamento_id = $request->departamento_id;
            $Empleados->dui = $request->dui;
            $Empleados->nit = $request->nit;
            $Empleados->afp = $request->afp;
            $Empleados->email = $request->email;
            $Empleados->img = $nombre;

            $Empleados->save();

            return redirect('/empleado');
        }

        else{

            $Empleados = Empleados::findOrFail($id);

            $Empleados->nombres = $request->nombres;
            $Empleados->apellidos = $request->apellidos;
            $Empleados->direccion = $request->direccion;
            $Empleados->telefono = $request->telefono;
            $Empleados->estado_civil = $request->estado_civil;
            $Empleados->fecha_nac = $request->fecha_nac;
            $Empleados->edad = $request->edad;
            $Empleados->sexo = $request->sexo;
            $Empleados->departamento_id = $request->departamento_id;
            $Empleados->dui = $request->dui;
            $Empleados->nit = $request->nit;
            $Empleados->afp = $request->afp;
            $Empleados->email = $request->email;

            $Empleados->save();

            return redirect('/empleado');
        }
    }

    public function delete($id){
        
        $Empleados = Empleados::findOrFail($id);

        $Empleados->delete();

        \Session::flash('message', $Empleados->nombres.' '. $Empleados->apellidos.' Fue eliminado.');

        return redirect('/empleado');
    }
}
