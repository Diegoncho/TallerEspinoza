@extends('layouts.app')

@section('content')

@include('layouts.navbar')

    <div class="panel panel-default" style="min-width: 800px">
        <div class="panel-heading" style="background:#f9f9f9"><b>Listado de clientes</b></div>
        <div class="panel-body">

            <form  action="{{ route('cliente') }}" class="navbar-form navbar-left pull-right" method="GET" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" name="name" placeholder="Nombre de cliente">
                </div>
                <button type="submit" class="btn btn-default">Buscar</button>
            </form>

            <a href="{{ route('clienteAdd') }}" class="btn btn-info">Registrar nuevo cliente</a>

            <p>Hay {{ $Clientes->total() }} clientes</p>
            <hr>

            <table class="table table-striped">
            <thead>
                <th>#</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Teléfono</th>
                <th>Acción</th>
            </thead>

            <tbody>
            @foreach($Clientes as $row)
                <tr>
                    <td>{{ $row->id }}</td>
                    <td>{{ $row->nombres }}</td>
                    <td>{{ $row->apellidos }}</td>
                    <td>{{ $row->telefono }}</td>
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

{{ $Clientes->render() }}

@endsection