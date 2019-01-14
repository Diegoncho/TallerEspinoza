@extends('layouts.app')

@section('content')

@include('layouts.navbar')

<link rel="stylesheet" href="{{ asset('css/reporte.css') }}">

    <div class="row">
        <div class="col-md-8 col-md-offset-plus">

            <div class="module-reporte" id="module-reporte">

                <div class="header-reporte flexbox">
                    <div class="hash-report">
                        <h1>REPORTE <b>COMPRA</b></h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </div>
                    <div class="logo-reporte"></div>
                </div> 

                <div class="title-reporte">Información de Compra</div>
                <div class="panel-reporte">

                    <div class="group-reporte flex">
                        <div class="reporte-unity flex" style="width:50%">
                            <div class="reporte-post" style="width:37%">Fecha:</div>
                            <div class="reporte-text">{{ $Compras->fecha }}</div>
                        </div>
                    </div>

                    <div class="reporte-unity flex">
                        <div class="reporte-post">Proveedor:</div>
                        <div class="reporte-text">{{ $Proveedores->nombre_proveedor }}</div>
                    </div>

                    <div class="reporte-unity flex">
                        <div class="reporte-post" style="width:27%">Producto:</div>
                        <div class="reporte-text">{{ $Productos->nombre }}</div>
                    </div>

                        <div class="reporte-unity flex" style="width:50%">
                            <div class="reporte-post" style="width:54%">Precio:</div>
                            <div class="reporte-text">${{ $Productos->precio_costo }}</div>
                        </div>
                        <div class="reporte-unity flex" style="width:50%">
                            <div class="reporte-post" style="width:54%">Cantidad:</div>
                            <div class="reporte-text">${{ $Proveedores->cantidad }}</div>
                        </div>
                        <div class="reporte-unity flex" style="width:50%">
                            <div class="reporte-post" style="width:54%">Sub total:</div>
                            <div class="reporte-text">${{ $Proveedores->sub_total }}</div>
                        </div>
                </div>

                <div class="title-reporte">Total de la compra</div>
                <div class="panel-reporte">
                    <div class="group-reporte flex">
                        <div class="reporte-unity flex" style="width:50%">
                            <div class="reporte-post" style="width:36%">descuento:</div>
                            <div class="reporte-text">${{ $Proveedores->descuento }}</div>
                        </div>

                        <div class="reporte-unity flex" style="width:50%">
                            <div class="reporte-post" style="width:54%">Total:</div>
                            <div class="reporte-text">${{ $Proveedores->total }}</div>
                        </div>
                    </div>
                </div>

            </div>

            <a href="#" onclick="javascript:genPDF();" class="btn btn-link"><i class="icon-cloud_download"></i> Descargar PDF</a>
        </div>
    </div>

@section('scripts')
<script type="text/javascript">

function genPDF() {
    html2canvas(document.getElementById('module-reporte'), {
        onrendered: function (canvas) {
            var img = canvas.toDataURL('image/png');
            var doc = new jsPDF();
            doc.addImage(img, 'JPEG',20,20);
            doc.save('Mecanica{{ $Mecanicas->id }}.pdf');
        }
    });
}

</script>
@endsection

@endsection