<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request,PDF;

use App\Repositories\ProveedorRepository;
use App\Repositories\ProductoRepository;
use App\Repositories\CompraRepository;

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

    public function index(){

        return view('CrudCompras.Compra', ['model' => $this->_compraRepo->getAll()]);
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
            'Proveedor_id' => $request->input('proveedor_id'),
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

        return $this->_compraRepo->save($data);
    }

    public function findProveedor(Request $request){

        return $this->_proveedorRepo->findByName($request->input('q'));
    }

    public function findProduct(Request $request){

        return $this->_productoRepo->findByName($request->input('q'));
    }



/*    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){

        $Compras = Compras::orderby('id','ASC')->paginate(7);

        return view('CrudCompras.compra' , compact('Compras'));
    }

    public function view($id){

        $Proveedores = Proveedores::findOrFail($id);
    
        return view('CrudProveedores.proveedorView', compact('Proveedores'));
    }

    public function create(){
        
        $Proveedores = Proveedores::all();

        return view('CrudCompras.compraAdd', compact('Proveedores'));
    }

    public function post(Request $request){

        $validator = Validator::make($request->all(),[
            'proveedor_id' => 'required',
            'fecha' => 'required|date',
            'nombre_producto' => 'required|max:255',
            'cantidad' => 'required',
            'precio_unitario' => 'required',
            'iva' => 'required',
            'descuento' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/compraAdd')
            ->withInput()
            ->withErrors($validator);
        }

            $Compras = new Compras;

            $Compras->proveedor_id = $request->proveedor_id;
            $Compras->fecha = $request->fecha;
            $Compras->nombre_producto = $request->nombre_producto;
            $Compras->cantidad = $request->cantidad;
            $Compras->precio_unitario = $request->precio_unitario;
            $Compras->iva = $request->iva;
            $Compras->subtotal = $request->cantidad * $request->precio_unitario;
            $Compras->descuento = $request->descuento;
            $Compras->total = $request->subtotal + ($request->subtotal / $request->descuento);

            $Compras->save();

            return redirect('/compra');
    }*/
}
