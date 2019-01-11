@extends('layouts.app')

@section('content')

@include('layouts.navbar')

<link rel="stylesheet" href="{{ asset('css/reporte.css') }}">

    <div class="row">
        <div class="col-md-8 col-md-offset-plus">

            <div class="module-reporte" id="module-reporte">

                <div class="header-reporte flexbox">
                    <div class="hash-report">
                        <h1>REPORTE <b>TRANSPORTE</b></h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </div>
                    <div class="logo-reporte"></div>
                </div> 

                <div class="title-reporte">Información del Transporte</div>
                <div class="panel-reporte">
                    <div class="reporte-unity flex">
                        <div class="reporte-post">Destino:</div>
                        <div class="reporte-text">{{ $Transportes->destino }}</div>
                    </div>

                    <div class="reporte-unity flex">
                        <div class="reporte-post">Fecha Inicio:</div>
                        <div class="reporte-text">{{ $Transportes->fecha_inicio }}</div>
                    </div>

                    <div class="reporte-unity flex">
                        <div class="reporte-post">Fecha Fin:</div>
                        <div class="reporte-text">{{ $Transportes->fecha_fin }}</div>
                    </div>
                </div>

                <div class="title-reporte">Motorista Asignado</div>
                <div class="panel-reporte">
                    <div class="reporte-unity flex">
                        <div class="reporte-post">Nombre Completo:</div>
                        <div class="reporte-text">{{ $VistaTransportes->nombres }} {{ $VistaTransportes->nombres }}</div>
                    </div>
                </div>

                <div class="title-reporte">Vehiculo Asignado</div>
                <div class="panel-reporte">
                    <div class="reporte-unity flex">
                        <div class="reporte-post">Modelo:</div>
                        <div class="reporte-text">{{ $VistaTransportes->modelo }}</div>
                    </div>

                    <div class="reporte-unity flex">
                        <div class="reporte-post">Carga:</div>
                        <div class="reporte-text">{{ $VistaTransportes->carga }}</div>
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
            doc.save('Transporte{{ $Transportes->id }}.pdf');
        }
    });
}

</script>
@endsection

@endsection