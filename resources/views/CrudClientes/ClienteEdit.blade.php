@extends('layouts.app')

@section('content')

@include('layouts.navbar')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Editar Cliente: {{ $Clientes->nombres }}</div>

                    <div class="panel-body">
                        <form class="form-horizontal" action="{{ route('clienteEdit', $Clientes->id) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="form-group {{ $errors->has('nombres') ? 'has-error' : ''}}">
                            <label for="nombres" class="col-md-1">Nombres</label>

                            <div class="col-md-12">
                                <input id="nombres" type="text" class="form-control" name="nombres" value="{{ $Clientes->nombres }}">
                                {!! $errors->first('nombres','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                        
                        <div class="form-group {{ $errors->has('apellidos') ? 'has-error' : ''}}">
                            <label for="apellidos" class="col-md-1">Apellidos</label>

                            <div class="col-md-12">
                                <input id="apellidos" type="text" class="form-control" name="apellidos" value="{{ $Clientes->apellidos }}"> 
                                {!! $errors->first('apellidos','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('direccion') ? 'has-error' : ''}}">
                            <label for="direccion" class="col-md-1">Dirección</label>

                            <div class="col-md-12">
                                <textarea name="direccion" id="direccion" class="form-control ajuste" rows="5">{{ $Clientes->direccion }}</textarea>
                                {!! $errors->first('direccion','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                        
                        <div class="form-group {{ $errors->has('telefono') ? 'has-error' : ''}}">
                            <label for="telefono" class="col-md-1">Teléfono</label>

                            <div class="col-md-12">
                                <input id="telefono" type="tel" class="form-control" name="telefono" value="{{ $Clientes->telefono }}">
                                {!! $errors->first('telefono','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                         <div class="form-group {{ $errors->has('dui') ? 'has-error' : ''}}">
                            <label for="dui" class="col-md-1">DUI</label>

                            <div class="col-md-12">
                                <input id="dui" type="text" class="form-control" name="dui" value="{{ $Clientes->dui }}">                              
                                {!! $errors->first('dui','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('nit') ? 'has-error' : ''}}">
                            <label for="nit" class="col-md-1">NIT</label>

                            <div class="col-md-12">
                                <input id="nit" type="text" class="form-control" name="nit" value="{{ $Clientes->nit }}">                                                       
                                {!! $errors->first('nit','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <button type="submit" class="btn btn-success btn-block">
                                   <i class="icon-sync"></i> Actualizar
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>

            <form action="{{ route('cliente') }}/{{ $Clientes->id }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}

            <button class="btn btn-danger">
                <i class="icon-delete_sweep"></i> Eliminar
            </button>
            </form>

        </div>
    </div>

@section('scripts')
<script type="text/javascript">

    $(document).ready(function(){
        $('#telefono').mask("9999-9999")
        $('#dui').mask("99999999-9")
        $('#nit').mask("9999-999999-999-9")
    });

</script>
@endsection

@endsection