@extends('layouts.app')

@section('content')

@include('layouts.navbar')

    <div class="panel panel-default" style="min-width: 800px">
        <div class="panel-heading" style="background:#f9f9f9"><b>Listado de compras</b></div>
        <div class="panel-body">
            <a href="{{ route('compraAdd') }}" class="btn btn-info">Registrar nueva compra</a>
            <hr>
            <table class="table table-striped">
            <thead>
                <th>ID</th>
                <th>Nombre</th>
                <th>Fecha</th>
                <th>Cantidad</th>
                <th>Total</th>
                <th>Acción</th>
            </thead>

            <tbody>
            @foreach($Compras as $row)
                <tr>
                    <td>{{ $row->id }}</td>
                    <td>{{ $row->nombre_producto }}</td>
                    <td>{{ $row->fecha }}</td>
                    <td>{{ $row->cantidad }}</td>
                    <td>{{ $row->total }}</td>
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

{{ $Compras->render() }}

@endsection