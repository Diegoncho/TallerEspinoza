@extends('layouts.app')

@section('content')

@include('layouts.navbar')

<link rel="stylesheet" href="{{ asset('css/reporte.css') }}"  media="all">

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="module-reporte">

                <div class="header-reporte flexbox">
                    <div class="hash-report">
                        <h1>REPORTE <b>PRODUCTO </b></h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </div>
                    <div class="logo-reporte"></div>
                </div> 

                <div class="title-reporte">Información del Producto</div>
                <div class="panel-reporte">
                    <div class="reporte-unity flex">
                        <div class="reporte-post">Nombre :</div>
                        <div class="reporte-text">{{ $Producto->nombres }} {{ $Empleados->apellidos }}</div>
                    </div>

                    <div class="reporte-unity flex">
                        <div class="reporte-post">Marca:</div>
                        <div class="reporte-text">{{ $VistaProducto->marca }}</div>
                    </div>

                    <div class="reporte-unity flex">
                        <div class="reporte-post">Descripcion:</div>
                        <div class="reporte-text">{{ $Producto->descripcion }}</div>
                    </div>

                    <div class="group-reporte flex">
                        <div class="reporte-unity flex" style="width:50%">
                            <div class="reporte-post" style="width:47%">Estado:</div>
                            <div class="reporte-text">{{ $Producto->estado }}</div>
                        </div>

                        <div class="reporte-unity flex" style="width:50%">
                            <div class="reporte-post">Cantida:</div>
                            <div class="reporte-text">{{ $Productos->cantidad }}</div>
                        </div>
                        
                        <div class="reporte-unity flex" style="width:50%">
                            <div class="reporte-post">Precio De Compra:</div>
                            <div class="reporte-text">{{ $Productos->precio_costo }}</div>
                        </div>

                        <div class="reporte-unity flex" style="width:50%">
                            <div class="reporte-post">Precio Mayoreo:</div>
                            <div class="reporte-text">{{ $Productos->precio_mayoreo }}</div>
                        </div>

                        <div class="reporte-unity flex" style="width:50%">
                            <div class="reporte-post">Precio Regular:</div>
                            <div class="reporte-text">{{ $Productos->Precio_regular }}</div>
                        </div>
                    </div>
                </div>


            </div>

            <a href="#" class="btn btn-link"><i class="icon-cloud_download"></i> Descargar PDF</a>
        </div>
    </div>
@endsection