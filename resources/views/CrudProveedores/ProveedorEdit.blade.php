@extends('layouts.app')

@section('content')

@include('layouts.navbar')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Editar Proveedor: {{ $Proveedores->nombre_proveedor }}</div>

                    <div class="panel-body">
                        <form class="form-horizontal" action="{{ route('proveedorEdit', $Proveedores->id) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="form-group {{ $errors->has('nombre_proveedor') ? 'has-error' : ''}}">
                            <label for="nombre_proveedor" class="col-md-3">Nombre Proveedor</label>

                            <div class="col-md-12">
                                <input id="nombre_proveedor" type="text" class="form-control" name="nombre_proveedor" value="{{ $Proveedores->nombre_proveedor }}">
                                {!! $errors->first('nombre_proveedor','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                        
                        <div class="form-group {{ $errors->has('nombre_contacto') ? 'has-error' : ''}}">
                            <label for="nombre_contacto" class="col-md-3">Nombre Contacto</label>

                            <div class="col-md-12">
                                <input id="nombre_contacto" type="text" class="form-control" name="nombre_contacto" value="{{ $Proveedores->nombre_contacto }}"> 
                                {!! $errors->first('nombre_contacto','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('cargo_contacto') ? 'has-error' : ''}}">
                            <label for="cargo_contacto" class="col-md-3">Cargo Contacto</label>

                            <div class="col-md-12">
                                <input id="cargo_contacto" type="text" class="form-control" name="cargo_contacto" value="{{ $Proveedores->cargo_contacto }}"> 
                                {!! $errors->first('cargo_contacto','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('direccion') ? 'has-error' : ''}}">
                            <label for="direccion" class="col-md-1">Dirección</label>

                            <div class="col-md-12">
                                <textarea name="direccion" id="direccion" class="form-control ajuste" rows="5">{{ $Proveedores->direccion }}</textarea>
                                {!! $errors->first('direccion','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                        
                        <div class="form-group {{ $errors->has('telefono') ? 'has-error' : ''}}">
                            <label for="telefono" class="col-md-1">Teléfono</label>

                            <div class="col-md-12">
                                <input id="telefono" type="tel" class="form-control" name="telefono" value="{{ $Proveedores->telefono }}">
                                {!! $errors->first('telefono','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('ciudad') ? 'has-error' : ''}}">
                            <label for="ciudad" class="col-md-1">Ciudad</label>

                            <div class="col-md-12">
                                <input id="ciudad" type="text" class="form-control" name="ciudad" value="{{ $Proveedores->ciudad }}">
                                {!! $errors->first('ciudad','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('pais') ? 'has-error' : ''}}">
                            <label for="pais" class="col-md-1">País</label>

                            <div class="col-md-12">
                                <input id="pais" type="text" class="form-control" name="pais" value="{{ $Proveedores->pais }}">
                                {!! $errors->first('pais','<span class="help-block">:message</span>') !!}
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

            <form action="{{ route('proveedor') }}/{{ $Proveedores->id }}" method="POST">
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
    });

</script>
@endsection

@endsection