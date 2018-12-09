@extends('layouts.app')

@section('content')

@include('layouts.navbar')

    <div class="panel panel-default">
        <div class="panel-heading" style="background:#f9f9f9"><b>Listado de empleados</b></div>
        <div class="panel-body">
            <a href="{{ route('empleadoAdd') }}" class="btn btn-info">Registrar nuevo empleado</a>
            <hr>
            <table class="table table-striped">
            <thead>
                <th>ID</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Teléfono</th>
                <th>Correo Electrónico</th>
                <th>Acción</th>
            </thead>

            <tbody>
            @foreach($Empleados as $row)
                <tr>
                    <td>{{ $row->id }}</td>
                    <td>{{ $row->nombres }}</td>
                    <td>{{ $row->apellidos }}</td>
                    <td>{{ $row->telefono }}</td>
                    <td>{{ $row->email }}</td>
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

{{ $Empleados->render() }}

@endsection