@extends('layouts.app')

@section('content')

@include('layouts.navbar')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Insertar Proveedor</div>

                    <div class="panel-body">
                        <form class="form-horizontal" action="{{ route('proveedorAdd') }}" method="POST">
                        {{ csrf_field() }}
        
                        <div class="form-group {{ $errors->has('nombre_proveedor') ? 'has-error' : ''}}">
                            <div class="posting-read">Información del Proveedor <i class="icon-contacts"></i></div>

                            <label for="nombre_proveedor" class="col-md-4 control-label">Nombre Proveedor</label>

                            <div class="col-md-6">
                                <input id="nombre_proveedor" type="text" class="form-control" name="nombre_proveedor" value="{{ old('nombre_proveedor') }}">
                                {!! $errors->first('nombre_proveedor','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                        
                        <div class="form-group {{ $errors->has('nombre_contacto') ? 'has-error' : ''}}">
                            <label for="nombre_contacto" class="col-md-4 control-label">Nombre Contacto</label>

                            <div class="col-md-6">
                                <input id="nombre_contacto" type="text" class="form-control" name="nombre_contacto" value="{{ old('nombre_contacto') }}"> 
                                {!! $errors->first('nombre_contacto','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('cargo_contacto') ? 'has-error' : ''}}">
                            <label for="cargo_contacto" class="col-md-4 control-label">Cargo Contacto</label>

                            <div class="col-md-6">
                                <input id="cargo_contacto" type="text" class="form-control" name="cargo_contacto" value="{{ old('cargo_contacto') }}"> 
                                {!! $errors->first('cargo_contacto','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('direccion') ? 'has-error' : ''}}">
                            <label for="direccion" class="col-md-4 control-label">Dirección</label>

                            <div class="col-md-6">
                                <textarea name="direccion" id="direccion" class="form-control ajuste" rows="5">{{ old('direccion') }}</textarea>
                                {!! $errors->first('direccion','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                        
                        <div class="form-group {{ $errors->has('telefono') ? 'has-error' : ''}}">
                            <label for="telefono" class="col-md-4 control-label">Teléfono</label>

                            <div class="col-md-6">
                                <input id="telefono" type="tel" class="form-control" name="telefono" value="{{ old('telefono') }}">
                                {!! $errors->first('telefono','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('ciudad') ? 'has-error' : ''}}">
                            <label for="ciudad" class="col-md-4 control-label">Ciudad</label>

                            <div class="col-md-6">
                                <input id="ciudad" type="text" class="form-control" name="ciudad" value="{{ old('ciudad') }}">
                                {!! $errors->first('ciudad','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('pais') ? 'has-error' : ''}}">
                            <label for="pais" class="col-md-4 control-label">País</label>

                            <div class="col-md-6">
                                <input id="pais" type="text" class="form-control" name="pais" value="{{ old('pais') }}">
                                {!! $errors->first('pais','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary btn-block">
                                    <i class="icon-add_circle"></i> Insertar
                                </button>
                            </div>
                        </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

@endsection