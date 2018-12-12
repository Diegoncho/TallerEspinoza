@extends('layouts.app')

@section('content')

@include('layouts.navbar')

    <div class="panel panel-default" style="min-width: 800px">
        <div class="panel-heading" style="background:#f9f9f9"><b>Listado de productos</b></div>
        <div class="panel-body">
            <a href="{{ route('productoAdd') }}" class="btn btn-info">Registrar nuevo producto</a>
            <hr>
            <table class="table table-striped">
            <thead>
                <th>ID</th>
                <th>Nombres</th>
                <th>marca</th>
                <th>condicion</th>
                <th>precio</th>
                <th>existencia</th>
                <th>Acción</th>
            </thead>

            <tbody>
            @foreach($Productos as $row)
                <tr>
                    <td>{{ $row->id }}</td>
                    <td>{{ $row->nombres }}</td>
                    <td>{{ $row->marca }}</td>
                    <td>{{ $row->condicion }}</td>
                    <td>{{ $row->precio }}</td>
                    <td>{{ $row->existencia }}</td>
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

{{ $Productos->render() }}

@endsection