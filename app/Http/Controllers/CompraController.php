<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request,PDF;

use App\Repositories\ProveedorRepository;
use App\Repositories\ProductoRepository;
use App\Repositories\CompraRepository;

use App\Compras;
use App\Productos;

class CompraController extends Controller
{
    private $_proveedorRepo;
    private $_productoRepo;
    private $_compraRepo;

    public function __construct(
        ProveedorRepository $proveedorRepo,
        ProductoRepository $productoRepo,
        CompraRepository $compraRepo
    )
    {
        $this->middleware('auth');

        $this->_proveedorRepo = $proveedorRepo;
        $this->_productoRepo = $productoRepo;
        $this->_compraRepo = $compraRepo;
    }

    public function index(Request $request){

        $model = Compras::name($request->get('name'))->orderby('id','DESC')->paginate(7);

        return view('CrudCompras.compra', compact('model'));
    }

    public function detail($id){

        return view('CrudCompras.compraDetail', ['model' => $this->_compraRepo->get($id)]);
    }
    
    public function pdf($id){
        $model = $this->_compraRepo->get($id);
        $compra_name = sprintf('compra-%s.pdf', str_pad ($model->id, 7, '0', STR_PAD_LEFT));

        $pdf = PDF::loadView('CrudCompras.compraPdf', [
            'model' => $model
        ]);

        return $pdf->download($compra_name);
    }

    public function create(){

        return view('CrudCompras.compraAdd');
    }

    public function post(Request $request){

        $data = (object)[
            'iva' => $request->input('iva'),
            'subtotal' => $request->input('subtotal'),
            'total' => $request->input('total'),
            'proveedor_id' => $request->input('proveedor_id'),
            'detail' => []
        ];

        foreach($request->input('detail') as $d){
            $data->detail[] = (object)[
                'producto_id' => $d['id'],
                'cantidad' => $d['cantidad'],
                'precio_unitario' => $d['precio_unitario'],
                'total' => $d['total']
            ];

            $Productos = Productos::findOrFail($d['id']);

            $Productos->cantidad = $Productos->cantidad + $d['cantidad'];
            $Productos->save();
               
        }
        return $this->_compraRepo->save($data);
    }

    public function findProveedor(Request $request){

        return $this->_proveedorRepo->findByName($request->input('q'));
    }

    public function findProduct(Request $request){

        return $this->_productoRepo->findByName($request->input('q'));
    }

}
