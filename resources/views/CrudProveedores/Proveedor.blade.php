@extends('layouts.app')

@section('content')

@include('layouts.navbar')

    <div class="panel panel-default" style="min-width: 800px">
        <div class="panel-heading" style="background:#f9f9f9"><b>Listado de proveedor</b></div>
        <div class="panel-body">
            <a href="{{ route('proveedorAdd') }}" class="btn btn-info">Registrar nuevo proveedor</a>
            <hr>
            <table class="table table-striped">
            <thead>
                <th>ID</th>
                <th>Nombres</th>
                <th>Nombre del Contacto</th>
                <th>Cargo del Contacto</th>
                <th>Teléfono</th>
                <th>Ciudad</th>
                <th>Pais</th>
                <th>Direccion</th>
                <th>Acción</th>
            </thead>

            <tbody>
            @foreach($Clientes as $row)
                <tr>
                    <td>{{ $row->id }}</td>
                    <td>{{ $row->nombres_proveedor }}</td>
                    <td>{{ $row->nombres_contacto }}</td>
                    <td>{{ $row->cargo_contacto }}</td>
                    <td>{{ $row->telefono }}</td>
                    <td>{{ $row->ciudad }}</td>
                    <td>{{ $row->pais }}</td>
                    <td>{{ $row->direccion }}</td>
                    <td>
                        <a href="" class="btn btn-info"><span class="icon-visibility"></span></a>
                        <a href="" class="btn btn-warning"><span class="icon-mode_edit"></span></a>
                        <a href="" class="btn btn-danger"><span class="icon-highlight_off"></span></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
            </table>
        </div>
    </div>

{{ $Proveedores->render() }}

@endsection