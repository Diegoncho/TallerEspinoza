<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request,PDF;

use App\Repositories\ClienteRepository;
use App\Repositories\ProductoRepository;
use App\Repositories\ComprobanteRepository;



class ComprobanteController extends Controller
{
    private $_clienteRepo;
    private $_productoRepo;
    private $_comprobanteRepo;

    public function __construct(
        ClienteRepository $clienteRepo,
        ProductoRepository $productoRepo,
        ComprobanteRepository $comprobanteRepo
    )
    {
        $this->middleware('auth');

        $this->_clienteRepo = $clienteRepo;
        $this->_productoRepo = $productoRepo;
        $this->_comprobanteRepo = $comprobanteRepo;
    }

    public function index(){

        return view('CrudFacturas.factura', ['model' => $this->_comprobanteRepo->getAll()]);
    }

    public function edit($id){

        return view('CrudFacturas.facturaEdit', ['model' => $this->_comprobanteRepo->get($id)]);
    }
    
    public function pdf($id){
        $model = $this->_comprobanteRepo->get($id);
        $comprobante_name = sprintf('comprobante-%s.pdf', str_pad ($model->id, 7, '0', STR_PAD_LEFT));

        $pdf = PDF::loadView('CrudFacturas.facturaPdf', [
            'model' => $model
        ]);

        return $pdf->download($comprobante_name);
    }

    public function create(){

        return view('CrudFacturas.facturaAdd');
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
                'producto_id' => $d['id'],
                'cantidad' => $d['cantidad'],
                'precio_unitario' => $d['precio_unitario'],
                'total' => $d['total']
            ];
        }

        return $this->_comprobanteRepo->save($data);
    }

    public function findClient(Request $request){

        return $this->_clienteRepo->findByName($request->input('q'));
    }

    public function findProduct(Request $request){

        return $this->_productoRepo->findByName($request->input('q'));
    }

}
