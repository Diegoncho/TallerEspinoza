@extends('layouts.app')

@section('content')

@include('layouts.navbar')

    <div class="panel panel-default" style="min-width: 800px">
        <div class="panel-heading" style="background:#f9f9f9"><b>Listado de proveedor</b></div>
        <div class="panel-body">
            @if (Session::has('message'))
                <div class="alert alert-success">
                    <i class="icon-check_circle"></i> {{ Session::get('message') }}
                </div>
            @endif 

            <form  action="{{ route('proveedor') }}" class="navbar-form navbar-left pull-right" method="GET" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" name="name" placeholder="Nombre de proveedor">
                </div>
                <button type="submit" class="btn btn-default">Buscar</button>
            </form>

            <a href="{{ route('proveedorAdd') }}" class="btn btn-primary">Registrar nuevo proveedor</a>
            
            <p>Hay {{ $Proveedores->total() }} proveedores</p>
            <hr>

            <table class="table table-striped">
            <thead>
                <th>#</th>
                <th>Nombre</th>
                <th>Nombre Contacto</th>
                <th>Cargo Contacto</th>
                <th>Teléfono</th>
                <th>País</th>
                <th>Acción</th>
            </thead>

            <tbody>
            @foreach($Proveedores as $row)
                <tr data-id="{{ $row->id }}">
                    <td>{{ $row->id }}</td>
                    <td>{{ $row->nombre_proveedor }}</td>
                    <td>{{ $row->nombre_contacto }}</td>
                    <td>{{ $row->cargo_contacto }}</td>
                    <td>{{ $row->telefono }}</td>
                    <td>{{ $row->pais }}</td>
                    <td>
                        <a href="{{ route('proveedorView', $row->id) }}" class="btn btn-info"><span class="icon-visibility"></span></a>
                        <a href="{{ route('proveedorEdit', $row->id) }}" class="btn btn-warning"><span class="icon-mode_edit"></span></a>
                        <a href="#" class="btn btn-danger"><span class="icon-highlight_off"></span></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
            </table>
        </div>
    </div>

{{ $Proveedores->render() }}

<form action="{{ route('proveedor') }}/id" method="POST" id="form-delete">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}                           
</form>

<script type="text/javascript">
        $(document).ready(function (){
            $('.btn-danger').click(function (e){
                e.preventDefault();

                var row = $(this).parents('tr');
                var id = row.data('id');
                var form = $('#form-delete');
                var url = form.attr('action').replace('id', id);
                var data = form.serialize();

                row.fadeOut();

                $.post(url, data, function(result){
                }).fail(function (){
                    alert('El registro no fue eliminado');
                    row.show();
                });
                
            });
        });
</script>

@endsection