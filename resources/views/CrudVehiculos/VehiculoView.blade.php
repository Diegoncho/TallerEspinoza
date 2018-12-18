@extends('layouts.app')

@section('content')

@include('layouts.navbar')

<link rel="stylesheet" href="{{ asset('css/reporte.css') }}"  media="all">

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="module-reporte">

                <div class="header-reporte flexbox">
                    <div class="hash-report">
                        <h1>REPORTE <b>VEHICULO</b></h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </div>
                    <div class="logo-reporte"></div>
                </div> 

                <div class="title-reporte">Información del Vehiculo</div>
                <div class="panel-reporte">
                    <div class="reporte-unity flex">
                        <div class="reporte-post">Modelo:</div>
                        <div class="reporte-text">{{ $VistaVehiculos->modelo }} {{ $Empleados->apellidos }}</div>
                    </div>

                    <div class="reporte-unity flex">
                        <div class="reporte-post">Marca:</div>
                        <div class="reporte-text">{{ $VistaVehiculos->marca }}</div>
                    </div>

                    <div class="reporte-unity flex">
                        <div class="reporte-post">Color:</div>
                        <div class="reporte-text">{{ $Vehiculos->color }}</div>
                    </div>

                    <div class="group-reporte flex">

                        <div class="reporte-unity flex" style="width:50%">
                            <div class="reporte-post">Matricula:</div>
                            <div class="reporte-text">{{ $Vehiculos->matricula }}</div>
                        </div>

                        <div class="reporte-unity flex" style="width:50%">
                            <div class="reporte-post">Año:</div>
                            <div class="reporte-text">{{ $Vehiculos->anio }}</div>
                        </div>
                    </div>
                </div>

            </div>

            <a href="#" class="btn btn-link"><i class="icon-cloud_download"></i> Descargar PDF</a>
        </div>
    </div>
@endsection