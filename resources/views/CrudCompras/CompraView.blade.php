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
                        <div class="reporte-unity flex">
                            <div class="reporte-post">Fecha:</div>
                            <div class="reporte-text">{{ $VistaCompras->fecha }}</div>
                        </div>
                    </div>

                    <div class="reporte-unity flex">
                        <div class="reporte-post">Proveedor:</div>
                        <div class="reporte-text">{{ $VistaCompras->proveedor }}</div>
                    </div>

                    <div class="reporte-unity flex">
                        <div class="reporte-post">Producto:</div>
                        <div class="reporte-text">{{ $VistaCompras->producto }}</div>
                    </div>

                        <div class="reporte-unity flex">
                            <div class="reporte-post">Precio:</div>
                            <div class="reporte-text">${{ $VistaCompras->precio_costo }}</div>
                        </div>
                        <div class="reporte-unity flex">
                            <div class="reporte-post">Cantidad:</div>
                            <div class="reporte-text">${{ $VistaCompras->cantidad }}</div>
                        </div>
                        <div class="reporte-unity flex">
                            <div class="reporte-post">Sub total:</div>
                            <div class="reporte-text">${{ $VistaCompras->subtotal }}</div>
                        </div>
                </div>

                <div class="title-reporte">Total Compra</div>
                <div class="panel-reporte">
                    <div class="group-reporte flex">
                        <div class="reporte-unity flex" style="width:50%">
                            <div class="reporte-post">Descuento:</div>
                            <div class="reporte-text">${{ $VistaCompras->descuento }}</div>
                        </div>

                        <div class="reporte-unity flex" style="width:50%">
                            <div class="reporte-post">Total:</div>
                            <div class="reporte-text">${{ $VistaCompras->total }}</div>
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
            doc.save('Compra{{ $Compras->id }}.pdf');
        }
    });
}

</script>
@endsection

@endsection