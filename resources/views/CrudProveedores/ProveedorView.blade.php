@extends('layouts.app')

@section('content')

@include('layouts.navbar')

<link rel="stylesheet" href="{{ asset('css/reporte.css') }}">

    <div class="row">
        <div class="col-md-8 col-md-offset-plus">

            <div class="module-reporte" id="module-reporte">

                <div class="header-reporte flexbox">
                    <div class="hash-report">
                        <h1>REPORTE <b>PROVEEDOR</b></h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </div>
                    <div class="logo-reporte"></div>
                </div> 

                <div class="title-reporte">Información del Proveedor</div>
                <div class="panel-reporte">
                    <div class="reporte-unity flex">
                        <div class="reporte-post">Nombre Completo:</div>
                        <div class="reporte-text">{{ $Proveedores->nombre_proveedor }}</div>
                    </div>

                    <div class="reporte-unity flex">
                        <div class="reporte-post">Dirección:</div>
                        <div class="reporte-text">{{ $Proveedores->direccion }}</div>
                    </div>

                    <div class="reporte-unity flex">
                        <div class="reporte-post">Teléfono:</div>
                        <div class="reporte-text">{{ $Proveedores->telefono }}</div>
                    </div>

                    <div class="group-reporte flex">
                        <div class="reporte-unity flex" style="width:50%">
                            <div class="reporte-post" >País:</div>
                            <div class="reporte-text">{{ $Proveedores->pais }}</div>
                        </div>

                        <div class="reporte-unity flex" style="width:50%">
                            <div class="reporte-post" >Ciudad:</div>
                            <div class="reporte-text">{{ $Proveedores->ciudad }}</div>
                        </div>
                    </div>
                </div>

                <div class="title-reporte">Información de Contacto</div>
                <div class="panel-reporte">
                    <div class="reporte-unity flex">
                        <div class="reporte-post">Nombre Completo:</div>
                        <div class="reporte-text">{{ $Proveedores->nombre_contacto }}</div>
                    </div>

                    <div class="reporte-unity flex">
                        <div class="reporte-post">Cargo:</div>
                        <div class="reporte-text">{{ $Proveedores->cargo_contacto }}</div>
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
            doc.save('Proveedor{{ $Proveedores->id }}.pdf');
        }
    });
}

</script>
@endsection

@endsection