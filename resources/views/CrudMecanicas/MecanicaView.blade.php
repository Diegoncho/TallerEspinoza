@extends('layouts.app')

@section('content')

@include('layouts.navbar')

<link rel="stylesheet" href="{{ asset('css/reporte.css') }}">

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="module-reporte">

                <div class="header-reporte flexbox">
                    <div class="hash-report">
                        <h1>REPORTE <b>MECANICA</b></h1>
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
                        <div class="reporte-post">Repuestos a Reemplazar:</div>
                        <div class="reporte-text">{{ $Mecanicas->cambios_repuestos }}</div>
                    </div>

                    <div class="group-reporte flex">
                        <div class="reporte-unity flex" style="width:50%">
                            <div class="reporte-post" style="width:47%">Fecha Recibido:</div>
                            <div class="reporte-text">{{ $Mecanicas->fecha_recibido }}</div>
                        </div>

                        <div class="reporte-unity flex" style="width:50%">
                            <div class="reporte-post" style="width:47%">Fecha Entrega:</div>
                            <div class="reporte-text">{{ $Mecanicas->fecha_entrega }}</div>
                        </div>
                    </div>
                </div>

                <div class="title-reporte">Datos Mecanico</div>
                <div class="panel-reporte">
                    <div class="group-reporte flex">
                        <div class="reporte-unity flex" style="width:50%">
                            <div class="reporte-post" style="width:26%">Nombre:</div>
                            <div class="reporte-text">{{ $VistaMecanicas->nombres } { $VistaMecanicas->apellidos }}</div>
                        </div>
                </div>

                <div class="title-reporte">Total</div>
                <div class="panel-reporte">
                    <div class="group-reporte flex">
                        <div class="reporte-unity flex" style="width:50%">
                            <div class="reporte-post" style="width:26%">Total Repuesto:</div>
                            <div class="reporte-text">{{ $Mecanicas->total_repuesto }}</div>
                        </div>
                        <div class="reporte-unity flex" style="width:50%">
                            <div class="reporte-post" style="width:26%">Total Mano de Obra:</div>
                            <div class="reporte-text">{{ $Mecanicas->total_mano_obra }}</div>
                        </div>
                </div>
            </div>

            <a href="#" class="btn btn-link"><i class="icon-cloud_download"></i> Descargar PDF</a>
        </div>
    </div>
@endsection