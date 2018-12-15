<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use App\Pmarcas;

class PmarcaController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request){

        $Pmarcas = Pmarcas::name($request->get('name'))->orderby('id','ASC')->paginate(7);

        return view('CrudPmarcas.pmarca' , compact('Pmarcas'));
    }

    public function create(){

        return view('CrudPmarcas.pmarcaAdd');
    }

    public function edit($id){

        $Pmarcas = Pmarcas::findOrFail($id);

        return view('CrudPmarcas.pmarcaEdit', compact('Pmarcas'));
    }

    public function post(Request $request){

        $validator = Validator::make($request->all(),[
            'marca' => 'required|max:50',
        ]);

        if ($validator->fails()) {
            return redirect('/pmarcaAdd')
            ->withInput()
            ->withErrors($validator);
        }

            $Pmarcas = new Pmarcas;

            $Pmarcas->marca = $request->marca;
            
            $Pmarcas->save(); 

            return redirect('/pmarca');
    }

    public function put(Request $request, $id){

        $validator = Validator::make($request->all(),[
            'marca' => 'required|max:50',
        ]);

        if ($validator->fails()) {
            return redirect("/pmarcaEdit/$id")
            ->withInput()
            ->withErrors($validator);
        }

            $Pmarcas = Pmarcas::findOrFail($id);

            $Pmarcas->marca = $request->marca;
            
            $Pmarcas->save(); 

            return redirect('/pmarca');
    }

    public function delete($id){
        
        $Pmarcas = Pmarcas::findOrFail($id);

        $Pmarcas->delete();

        \Session::flash('message', $Pmarcas->marca.' Fue eliminado.');

        return redirect('/pmarca');
    }
}
