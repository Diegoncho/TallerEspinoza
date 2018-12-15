<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use App\Vmarcas;

class VmarcaController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request){

        $Vmarcas = Vmarcas::name($request->get('name'))->orderby('id','ASC')->paginate(7);

        return view('CrudVmarcas.vmarca' , compact('Vmarcas'));
    }

    public function create(){

        return view('CrudVmarcas.vmarcaAdd');
    }

    public function edit($id){

        $Vmarcas = Vmarcas::findOrFail($id);

        return view('CrudVmarcas.vmarcaEdit', compact('Vmarcas'));
    }

    public function post(Request $request){

        $validator = Validator::make($request->all(),[
            'marca' => 'required|max:50',
        ]);

        if ($validator->fails()) {
            return redirect('/vmarcaAdd')
            ->withInput()
            ->withErrors($validator);
        }

            $Vmarcas = new Vmarcas;

            $Vmarcas->marca = $request->marca;
            
            $Vmarcas->save(); 

            return redirect('/vmarca');
    }

    public function put(Request $request, $id){

        $validator = Validator::make($request->all(),[
            'marca' => 'required|max:50',
        ]);

        if ($validator->fails()) {
            return redirect("/vmarcaEdit/$id")
            ->withInput()
            ->withErrors($validator);
        }

            $Vmarcas = vmarcas::findOrFail($id);

            $Vmarcas->marca = $request->marca;
            
            $Vmarcas->save(); 

            return redirect('/vmarca');
    }

    public function delete($id){
        
        $Vmarcas = Vmarcas::findOrFail($id);

        $Vmarcas->delete();

        \Session::flash('message', $Vmarcas->marca.' Fue eliminado.');

        return redirect('/vmarca');
    }
}
