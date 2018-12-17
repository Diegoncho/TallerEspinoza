@extends('layouts.app')

@section('content')

@include('layouts.navbar')

<link rel="stylesheet" href="{{ asset('css/reporte.css') }}"  media="all">

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="module-reporte">

                <div class="header-reporte flexbox">
                    <div class="hash-report">
                        <h1>REPORTE <b>EMPLEADO</b></h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </div>
                    <div class="logo-reporte"></div>
                </div> 

                <div class="p">
                    <div class="img-reporte" style="background:url('../img/{{ $Empleados->img }}');
                                background-size:cover;
                                background-position:center;
                                width:100px;
                                height:120px;
                                margin:10px 0px 10px 0px;">
                    </div>
                </div>

                <div class="title-reporte">Información del Empleado</div>
                <div class="panel-reporte">
                    <div class="reporte-unity flex">
                        <div class="reporte-post">Nombre Completo:</div>
                        <div class="reporte-text">{{ $Empleados->nombres }} {{ $Empleados->apellidos }}</div>
                    </div>

                    <div class="reporte-unity flex">
                        <div class="reporte-post">Dirección:</div>
                        <div class="reporte-text">{{ $Empleados->direccion }}</div>
                    </div>

                    <div class="reporte-unity flex">
                        <div class="reporte-post">Teléfono:</div>
                        <div class="reporte-text">{{ $Empleados->telefono }}</div>
                    </div>

                    <div class="group-reporte flex">
                        <div class="reporte-unity flex" style="width:50%">
                            <div class="reporte-post" style="width:47%">Fecha Nacimiento:</div>
                            <div class="reporte-text">{{ $Empleados->fecha_nac }}</div>
                        </div>

                        <div class="reporte-unity flex" style="width:50%">
                            <div class="reporte-post">Edad:</div>
                            <div class="reporte-text">{{ $Empleados->edad }}</div>
                        </div>
                    </div>
                </div>

                <div class="title-reporte">Datos Personales</div>
                <div class="panel-reporte">
                    <div class="group-reporte flex">
                        <div class="reporte-unity flex" style="width:50%">
                            <div class="reporte-post" style="width:26%">Estado Civil:</div>
                            <div class="reporte-text">{{ $Empleados->estado_civil }}</div>
                        </div>

                        <div class="reporte-unity flex" style="width:50%">
                            <div class="reporte-post">Sexo:</div>
                            <div class="reporte-text">{{ $Empleados->sexo }}</div>
                        </div>
                    </div>
                    <div class="reporte-unity flex">
                        <div class="reporte-post">AFP:</div>
                        <div class="reporte-text">{{ $Empleados->afp }}</div>
                    </div>
 
                    <div class="reporte-unity flex">
                        <div class="reporte-post">DUI:</div>
                        <div class="reporte-text">{{ $Empleados->dui }}</div>
                    </div>

                    <div class="reporte-unity flex">
                        <div class="reporte-post">NIT:</div>
                        <div class="reporte-text">{{ $Empleados->nit }}</div>
                    </div>

                    <div class="reporte-unity flex">
                        <div class="reporte-post">Correo Electronico:</div>
                        <div class="reporte-text">{{ $Empleados->email }}</div>
                    </div>
                </div>

            </div>

            <a href="#" class="btn btn-link"><i class="icon-cloud_download"></i> Descargar PDF</a>
        </div>
    </div>
@endsection