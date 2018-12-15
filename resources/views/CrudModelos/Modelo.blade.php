@extends('layouts.app')

@section('content')

@include('layouts.navbar')

    <div class="panel panel-default" style="min-width: 800px">
        <div class="panel-heading" style="background:#f9f9f9"><b>Listado de modelos</b></div>
        <div class="panel-body">
            @if (Session::has('message'))
                <div class="alert alert-success">
                    <i class="icon-check_circle"></i> {{ Session::get('message') }}
                </div>
            @endif 

            <form  action="{{ route('modelo') }}" class="navbar-form navbar-left pull-right" method="GET" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" name="name" placeholder="Buscar modelo">
                </div>
                <button type="submit" class="btn btn-default">Buscar</button>
            </form>

            <a href="{{ route('modeloAdd') }}" class="btn btn-primary">Registrar nuevo modelo</a>

            <p>Hay {{ $Modelos->total() }} modelos</p>
            <hr>

            <table class="table table-striped">
            <thead>
                <th>#</th>
                <th>Modelo</th>
                <th>Acción</th>
            </thead>

            <tbody>
            @foreach($Modelos as $row)
                <tr data-id="{{ $row->id }}">
                    <td>{{ $row->id }}</td>
                    <td>{{ $row->modelo }}</td>
                    <td>
                        <a href="" class="btn btn-info"><span class="icon-visibility"></span></a>
                        <a href="{{ route('modeloEdit', $row->id) }}" class="btn btn-warning"><span class="icon-mode_edit"></span></a>
                        <a href="#" class="btn btn-danger"><span class="icon-highlight_off"></span></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
            </table>
        </div>
    </div>

{{ $Modelos->render() }}

<form action="{{ route('modelo') }}/id" method="POST" id="form-delete">
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