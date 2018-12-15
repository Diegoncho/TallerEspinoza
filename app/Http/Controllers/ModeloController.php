<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use App\Modelos;

class ModeloController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request){

        $Modelos = Modelos::name($request->get('name'))->orderby('id','ASC')->paginate(7);

        return view('CrudModelos.modelo' , compact('Modelos'));
    }

    public function create(){

        return view('CrudModelos.modeloAdd');
    }

    public function edit($id){

        $Modelos = Modelos::findOrFail($id);

        return view('CrudModelos.modeloEdit', compact('Modelos'));
    }

    public function post(Request $request){

        $validator = Validator::make($request->all(),[
            'modelo' => 'required|max:50',
        ]);

        if ($validator->fails()) {
            return redirect('/modeloAdd')
            ->withInput()
            ->withErrors($validator);
        }

            $Modelos = new Modelos;

            $Modelos->modelo = $request->modelo;
            
            $Modelos->save(); 

            return redirect('/modelo');
    }

    public function put(Request $request, $id){

        $validator = Validator::make($request->all(),[
            'modelo' => 'required|max:50',
        ]);

        if ($validator->fails()) {
            return redirect("/modeloEdit/$id")
            ->withInput()
            ->withErrors($validator);
        }

            $Modelos = Modelos::findOrFail($id);

            $Modelos->modelo = $request->modelo;
            
            $Modelos->save(); 

            return redirect('/modelo');
    }

    public function delete($id){
        
        $Modelos = Modelos::findOrFail($id);

        $Modelos->delete();

        \Session::flash('message', $Modelos->modelo.' Fue eliminado.');

        return redirect('/modelo');
    }
}
