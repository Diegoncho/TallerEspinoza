@extends('layouts.app')

@section('content')

@include('layouts.navbar')

    <div class="panel panel-default" style="min-width: 800px">
        <div class="panel-heading" style="background:#f9f9f9"><b>Listado de compras</b></div>
        <div class="panel-body">
            @if (Session::has('message'))
                <div class="alert alert-success">
                    <i class="icon-check_circle"></i> {{ Session::get('message') }}
                </div>
            @endif

            <form  action="{{ route('compra') }}" class="navbar-form navbar-left pull-right" method="GET" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" name="name" placeholder="fecha de la compra">
                </div>
                <button type="submit" class="btn btn-default">Buscar</button>
            </form>

            <a href="{{ route('compraAdd') }}" class="btn btn-primary">Registrar nueva compra</a>
            
            <p>Hay {{ $Compras->total() }} compras</p>
            <hr>

            <table class="table table-striped">
            <thead>
                <th>#</th>
                <th>Proveedor</th>
                <th>Fecha</th>
                <th>Producto</th>
                <th>Acción</th>
            </thead>

            <tbody>
            @foreach($Compras as $row)
                <tr data-id="{{ $row->id }}">
                    <td>{{ $row->id }}</td>
                    <td>{{ $row->proveedor_id }}</td>
                    <td>{{ $row->fecha }}</td>
                    <td>{{ $row->producto_id }}</td>
                    <td>
                        <a href="{{ route('compraView', $row->id) }}" class="btn btn-info"><span class="icon-visibility"></span></a>
                        <a href="#" class="btn btn-danger"><span class="icon-highlight_off"></span></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
            </table>
        </div>
    </div>

{{ $Compras->render() }}

<form action="{{ route('compra') }}/id" method="POST" id="form-delete">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}                           
</form>

@section('scripts')
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

@endsection