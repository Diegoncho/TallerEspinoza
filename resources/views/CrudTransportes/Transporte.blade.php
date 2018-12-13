@extends('layouts.app')

@section('content')

@include('layouts.navbar')

    <div class="panel panel-default" style="min-width: 800px">
        <div class="panel-heading" style="background:#f9f9f9"><b>Listado de Transportes</b></div>
        <div class="panel-body">

            <form  action="{{ route('transporte') }}" class="navbar-form navbar-left pull-right" method="GET" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" name="name" placeholder="Destino del Transporte">
                </div>
                <button type="submit" class="btn btn-default">Buscar</button>
            </form>

            <a href="{{ route('transporteAdd') }}" class="btn btn-info">Registrar nuevo transporte</a>
            
            <p>Hay {{ $Transportes->total() }} transportes</p>
            <hr>

            <table class="table table-striped">
            <thead>
                <th>#</th>
                <th>Destino</th>
                <th>Fecha Inicio</th>
                <th>Fecha Fin</th>
                <th>Carga</th>
                <th>Acción</th>
            </thead>

            <tbody>
            @foreach($Transportes as $row)
                <tr>
                    <td>{{ $row->id }}</td>
                    <td>{{ $row->destino }}</td>
                    <td>{{ $row->fecha_inicio }}</td>
                    <td>{{ $row->fecha_fin }}</td>
                    <td>{{ $row->carga }}</td>
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

{{ $Transportes->render() }}

@endsection