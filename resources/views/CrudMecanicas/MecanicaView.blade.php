@extends('layouts.app')

@section('content')

@include('layouts.navbar')

<link rel="stylesheet" href="{{ asset('css/reporte.css') }}">

    <div class="row">
        <div class="col-md-8 col-md-offset-plus">

            <div class="module-reporte" id="module-reporte">

                <div class="header-reporte flexbox">
                    <div class="hash-report">
                        <h1>REPORTE <b>MECANICA</b></h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </div>
                    <div class="logo-reporte"></div>
                </div> 

                <div class="title-reporte">Información de Mecanica</div>
                <div class="panel-reporte">
                    <div class="reporte-unity flex">
                        <div class="reporte-post">Diagnostico:</div>
                        <div class="reporte-text">{{ $Mecanicas->diagnostico }}</div>
                    </div>

                    <div class="reporte-unity flex">
                        <div class="reporte-post" style="width:27%">Repuestos a Reemplazar:</div>
                        <div class="reporte-text">{{ $Mecanicas->cambios_repuestos }}</div>
                    </div>

                    <div class="group-reporte flex">
                        <div class="reporte-unity flex" style="width:50%">
                            <div class="reporte-post" style="width:37%">Fecha Recibido:</div>
                            <div class="reporte-text">{{ $Mecanicas->fecha_recibido }}</div>
                        </div>

                        <div class="reporte-unity flex" style="width:50%">
                            <div class="reporte-post" style="width:34%">Fecha Entrega:</div>
                            <div class="reporte-text">{{ $Mecanicas->fecha_entrega }}</div>
                        </div>
                    </div>
                </div>

                <div class="title-reporte">Empleado Asignado</div>
                <div class="panel-reporte">
                        <div class="reporte-unity flex">
                            <div class="reporte-post">Nombre Completo:</div>
                            <div class="reporte-text">{{ $VistaMecanicas->nombres }} {{ $VistaMecanicas->apellidos }}</div>
                        </div>
                </div>

                <div class="title-reporte">Total del Servicio</div>
                <div class="panel-reporte">
                    <div class="group-reporte flex">
                        <div class="reporte-unity flex" style="width:50%">
                            <div class="reporte-post" style="width:36%">Total Repuesto:</div>
                            <div class="reporte-text">${{ $Mecanicas->total_repuesto }}</div>
                        </div>

                        <div class="reporte-unity flex" style="width:50%">
                            <div class="reporte-post" style="width:54%">Total Mano de Obra:</div>
                            <div class="reporte-text">${{ $Mecanicas->total_mano_obra }}</div>
                        </div>
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
            doc.save('Mecanica{{ $Mecanicas->id }}.pdf');
        }
    });
}

</script>
@endsection