@extends('layouts.app')

@section('content')

@include('layouts.navbar')

<link rel="stylesheet" href="{{ asset('css/reporte.css') }}"  media="all">

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="module-reporte">

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
                        <div class="reporte-post">Nombre Completo:</div>
                        <div class="reporte-text">{{ $VistaTransportes->nombres }} {{ $VistaTransportes->apellidos }}</div>
                    </div>

                    <div class="reporte-unity flex">
                        <div class="reporte-post">Fecha Inicio:</div>
                        <div class="reporte-text">{{ $Transportes->fecha_inicio }}</div>
                    </div>

                    <div class="reporte-unity flex">
                        <div class="reporte-post">Fecha Fin:</div>
                        <div class="reporte-text">{{ $Transportes->fecha_fin }}</div>
                    </div>

                    <div class="group-reporte flex">
                        <div class="reporte-unity flex" style="width:50%">
                            <div class="reporte-post" style="width:47%">Destino:</div>
                            <div class="reporte-text">{{ $Transportes->destino }}</div>
                        </div>

                        <div class="reporte-unity flex" style="width:50%">
                            <div class="reporte-post">Modelo Del Vehiculo:</div>
                            <div class="reporte-text">{{ $VistaTransportes->modelo }}</div>
                        </div>

                        <div class="reporte-unity flex" style="width:50%">
                            <div class="reporte-post">Carga:</div>
                            <div class="reporte-text">{{ $Transportes->carga }}</div>
                        </div>
                    </div>
                </div>

            </div>

            <a href="#" class="btn btn-link"><i class="icon-cloud_download"></i> Descargar PDF</a>
        </div>
    </div>
@endsection