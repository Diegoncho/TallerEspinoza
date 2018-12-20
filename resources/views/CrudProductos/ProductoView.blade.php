@extends('layouts.app')

@section('content')

@include('layouts.navbar')

<link rel="stylesheet" href="{{ asset('css/reporte.css') }}">

    <div class="row">
        <div class="col-md-8 col-md-offset-plus">

            <div class="module-reporte" id="module-reporte">

                <div class="header-reporte flexbox">
                    <div class="hash-report">
                        <h1>REPORTE <b>PRODUCTO</b></h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </div>
                    <div class="logo-reporte"></div> 
                </div> 

                <div class="title-reporte">Información del Producto</div>
                <div class="panel-reporte">
                    <div class="reporte-unity flex">
                        <div class="reporte-post">Nombre :</div>
                        <div class="reporte-text">{{ $Productos->nombre }}</div>
                    </div>

                    <div class="reporte-unity flex">
                        <div class="reporte-post">Marca:</div>
                        <div class="reporte-text">{{ $VistaProductos->marca }}</div>
                    </div>

                    <div class="reporte-unity flex">
                        <div class="reporte-post">Descripción:</div>
                        <div class="reporte-text">{{ $Productos->descripcion }}</div>
                    </div>
                </div>

                <div class="title-reporte">Estado y Costos del Producto</div>
                <div class="panel-reporte">
                    <div class="reporte-unity flex">
                        <div class="reporte-post">Estado:</div>
                        <div class="reporte-text">{{ $Productos->estado }}</div>
                    </div>

                    <div class="reporte-unity flex">
                        <div class="reporte-post">Cantidad:</div>
                        <div class="reporte-text">{{ $Productos->cantidad }}</div>
                    </div>
                        
                    <div class="reporte-unity flex">
                        <div class="reporte-post">Precio De Compra:</div>
                        <div class="reporte-text">${{ $Productos->precio_costo }}</div>
                    </div>

                    <div class="reporte-unity flex">
                        <div class="reporte-post">Precio Mayoreo:</div>
                        <div class="reporte-text">${{ $Productos->precio_mayoreo }}</div>
                    </div>

                    <div class="reporte-unity flex">
                        <div class="reporte-post">Precio Regular:</div>
                        <div class="reporte-text">${{ $Productos->precio_regular }}</div>
                    </div>
                </div>

            </div>

            <a href="#" onclick="javascript:genPDF();" class="btn btn-link"><i class="icon-cloud_download"></i> Descargar PDF</a>
        </div>
    </div>

<script type="text/javascript">

function genPDF() {
    html2canvas(document.getElementById('module-reporte'), {
        onrendered: function (canvas) {
            var img = canvas.toDataURL('image/png');
            var doc = new jsPDF();
            doc.addImage(img, 'JPEG',20,20);
            doc.save('Producto{{ $Productos->id }}.pdf');
        }
    });
}

</script>
@endsection