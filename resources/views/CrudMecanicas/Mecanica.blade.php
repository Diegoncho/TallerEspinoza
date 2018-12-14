@extends('layouts.app')

@section('content')

@include('layouts.navbar')

    <div class="panel panel-default" style="min-width: 800px">
        <div class="panel-heading" style="background:#f9f9f9"><b>Listado de Mecanicas</b></div>
        <div class="panel-body">

            <form  action="{{ route('mecanicas') }}" class="navbar-form navbar-left pull-right" method="GET" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" name="name" placeholder="Buscar diagnostico">
                </div>
                <button type="submit" class="btn btn-default">Buscar</button>
            </form>

            <a href="{{ route('mecanicaAdd') }}" class="btn btn-info">Registrar nuevo mecanica</a>
            
           <hr>

            <table class="table table-striped">
            <thead>
                <th>#</th>
                <th>Fecha Recibido</th>
                <th>Diagnostico</th>
                <th>Cambios Repuesto</th>
                <th>Fecha Entrega</th>
                <th>Acción</th>
            </thead>

            <tbody>
            @foreach($Mecanicas as $row)
                <tr>
                    <td>{{ $row->id }}</td>
                    <td>{{ $row->fecha_recibido }}</td>
                    <td>{{ $row->diagnostico }}</td>
                    <td>{{ $row->cambios_repuestos }}</td>
                    <td>{{ $row->fecha_entrega }}</td>
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

{{ $Mecanicas->render() }}

@endsection