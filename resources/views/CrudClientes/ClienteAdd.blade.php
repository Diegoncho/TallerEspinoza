@extends('layouts.app')

@section('content')

@include('layouts.navbar')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Insertar Cliente</div>

                    <div class="panel-body">
                        <form class="form-horizontal" action="{{ route('clienteAdd') }}" method="POST">
                        {{ csrf_field() }}
        
                        <div class="form-group {{ $errors->has('nombres') ? 'has-error' : ''}}">
                            <div class="posting-read">Información del Cliente <i class="icon-contacts"></i></div>

                            <label for="nombres" class="col-md-4 control-label">Nombres</label>

                            <div class="col-md-6">
                                <input id="nombres" type="text" class="form-control" name="nombres" value="{{ old('nombres') }}">
                                {!! $errors->first('nombres','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                        
                        <div class="form-group {{ $errors->has('apellidos') ? 'has-error' : ''}}">
                            <label for="apellidos" class="col-md-4 control-label">Apellidos</label>

                            <div class="col-md-6">
                                <input id="apellidos" type="text" class="form-control" name="apellidos" value="{{ old('apellidos') }}"> 
                                {!! $errors->first('apellidos','<span class="help-block">:message</span>') !!}
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
                                <input id="telefono" type="text" class="form-control" name="telefono" value="{{ old('telefono') }}">
                                {!! $errors->first('telefono','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                         <div class="form-group {{ $errors->has('dui') ? 'has-error' : ''}}">
                            <label for="dui" class="col-md-4 control-label">DUI</label>

                            <div class="col-md-6">
                                <input id="dui" type="text" class="form-control" name="dui" value="{{ old('dui') }}">                              
                                {!! $errors->first('dui','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('nit') ? 'has-error' : ''}}">
                            <label for="nit" class="col-md-4 control-label">NIT</label>

                            <div class="col-md-6">
                                <input id="nit" type="text" class="form-control" name="nit" value="{{ old('nit') }}">                                                       
                                {!! $errors->first('nit','<span class="help-block">:message</span>') !!}
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