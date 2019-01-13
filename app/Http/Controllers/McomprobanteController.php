<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request,PDF;

use App\Repositories\ClienteRepository;
use App\Repositories\MecanicaRepository;
use App\Repositories\McomprobanteRepository;

use App\Mcomprobantes;

class McomprobanteController extends Controller
{
    private $_clienteRepo;
    private $_mecanicaRepo;
    private $_McomprobanteRepo;

    public function __construct(
        ClienteRepository $clienteRepo,
        MecanicaRepository $mecanicaRepo,
        McomprobanteRepository $McomprobanteRepo
    )
    {
        $this->middleware('auth');

        $this->_clienteRepo = $clienteRepo;
        $this->_mecanicaRepo = $mecanicaRepo;
        $this->_McomprobanteRepo = $McomprobanteRepo;
    }

    public function index(Request $request){

        $model = Mcomprobantes::name($request->get('name'))->orderby('id','DESC')->paginate(7);

        return view('CrudMfacturas.Mfactura', compact('model'));
    }

    public function detail($id){

        return view('CrudMfacturas.MfacturaDetail', ['model' => $this->_McomprobanteRepo->get($id)]);
    }
    
    public function pdf($id){
        $model = $this->_McomprobanteRepo->get($id);
        $Mcomprobante_name = sprintf('comprobante-%s.pdf', str_pad ($model->id, 7, '0', STR_PAD_LEFT));

        $pdf = PDF::loadView('CrudMfacturas.MfacturaPdf', [
            'model' => $model
        ]);

        return $pdf->download($Mcomprobante_name);
    }

    public function create(){

        return view('CrudMfacturas.MfacturaAdd');
    }

    public function post(Request $request){

        $data = (object)[
            'iva' => $request->input('iva'),
            'subtotal' => $request->input('subtotal'),
            'total' => $request->input('total'),
            'cliente_id' => $request->input('cliente_id'),
            'detail' => []
        ];

        foreach($request->input('detail') as $d){
            $data->detail[] = (object)[
                'mecanica_id' => $d['id'],
                'precio_unitario' => $d['precio_unitario'],
                'total' => $d['total']
            ];
        }

        return $this->_McomprobanteRepo->save($data);
    }

    public function findClient(Request $request){

        return $this->_clienteRepo->findByName($request->input('q'));
    }

    public function findMecanica(Request $request){

        return $this->_mecanicaRepo->findByName($request->input('q'));
    }

}
