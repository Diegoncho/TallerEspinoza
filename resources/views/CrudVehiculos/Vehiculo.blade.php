@extends('layouts.app')

@section('content')

@include('layouts.navbar')

    <div class="panel panel-default" style="min-width: 800px">
        <div class="panel-heading" style="background:#f9f9f9"><b>Listado de vehiculos</b></div>
        <div class="panel-body">

            <form  action="{{ route('vehiculo') }}" class="navbar-form navbar-left pull-right" method="GET" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" name="name" placeholder="Marca del vehiculo">
                </div>
                <button type="submit" class="btn btn-default">Buscar</button>
            </form>

            <a href="{{ route('vehiculoAdd') }}" class="btn btn-info">Registrar nuevo vehiculo</a>
            
            <p>Hay {{ $Empleados->total() }} vehiculos</p>
            <hr>

            <table class="table table-striped">
            <thead>
                <th>#</th>
                <th>Marca</th>
                <th>Tipo de Vehiculo</th>
                <th>Capacidad</th>
                <th>Numero de Placa</th>
                <th>Color</th>
                <th>Acción</th>
            </thead>

            <tbody>
            @foreach($Vehiculos as $row)
                <tr>
                    <td>{{ $row->id }}</td>
                    <td>{{ $row->marca }}</td>
                    <td>{{ $row->tipo_vehiculo }}</td>
                    <td>{{ $row->capacidad }}</td>
                    <td>{{ $row->numero_placa }}</td>
                    <td>{{ $row->color }}</td>
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

{{ $Vehiculos->render() }}

@endsection