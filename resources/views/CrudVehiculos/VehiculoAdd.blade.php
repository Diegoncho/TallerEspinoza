@extends('layouts.app')

@section('content')

@include('layouts.navbar')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Insertar Vehiculo</div>

                    <div class="panel-body">
                        <form class="form-horizontal" action="{{ route('vehiculoAdd') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
        
                        <div class="form-group {{ $errors->has('tipo_vehiculo') ? 'has-error' : ''}}">
                            <div class="posting-read">Información del Vehiculo <i class="icon-contacts"></i></div>

                            <label for="tipo_vehiculo" class="col-md-4 control-label">Tipo de Vehiculo</label>

                            <div class="col-md-6">
                                <input id="tipo_vehiculo" type="text" class="form-control" name="tipo_vehiculo" value="{{ old('tipo_vehiculo') }}">
                                {!! $errors->first('tipo_vehiculo','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                        
                        <div class="form-group {{ $errors->has('marca') ? 'has-error' : ''}}">
                            <label for="marca" class="col-md-4 control-label">Marca</label>

                            <div class="col-md-6">
                                <input id="marca" type="text" class="form-control" name="marca" value="{{ old('marca') }}"> 
                                {!! $errors->first('marca','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('modelo') ? 'has-error' : ''}}">
                            <label for="modelo" class="col-md-4 control-label">Modelo</label>

                            <div class="col-md-6">
                                <input id="modelo" type="text" class="form-control" name="modelo" value="{{ old('modelo') }}">
                                {!! $errors->first('modelo','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('numero_placa') ? 'has-error' : ''}}">
                            <label for="numero_placa" class="col-md-4 control-label">Numero de Placa</label>

                            <div class="col-md-6">
                                <input id="numero_placa" type="text" class="form-control" name="numero_placa" value="{{ old('numero_placa') }}">       
                                {!! $errors->first('numero_placa','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('capacidad') ? 'has-error' : ''}}">
                            <label for="capacidad" class="col-md-4 control-label">Capacidad</label>

                            <div class="col-md-6">
                                <input id="capacidad" type="text" class="form-control" name="capacidad" value="{{ old('capacidad') }}">
                                {!! $errors->first('capacidad','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                         <div class="form-group {{ $errors->has('color') ? 'has-error' : ''}}">
                            <label for="color" class="col-md-4 control-label">Color</label>

                            <div class="col-md-6">
                                <input id="color" type="text" class="form-control" name="color" value="{{ old('color') }}">                              
                                {!! $errors->first('color','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('empleado_id') ? 'has-error' : ''}}">
                            <div class="posting-read">Motorista Asignado <i class="icon-folder_shared"></i></div>
                            <label for="id_empleado" class="col-md-4 control-label">Empleado</label>

                            <div class="col-md-6">
                                <select name="empleado_id" id="empleado_id" class="form-control">       
                                    <option Selected disabled>Seleccione el Empleado</option>
                                    
                                @foreach($Empleados as $row)
                                    <option value="{{ $row->id }}">{{ $row->nombre }}</option>
                                @endforeach
                                </select>
                                {!! $errors->first('empleado_id','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary btn-block">
                                    Insertar
                                </button>
                            </div>
                        </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

@endsection