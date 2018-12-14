@extends('layouts.app')

@section('content')

@include('layouts.navbar')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Insertar Mecanica</div>

                    <div class="panel-body">
                        <form class="form-horizontal" action="{{ route('mecanicaAdd') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
        
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

                        <div class="form-group {{ $errors->has('vehiculo_id') ? 'has-error' : ''}}">
                            <div class="posting-read">Vehiculo Asignado <i class="icon-folder_shared"></i></div>
                            <label for="id_vehiculo" class="col-md-4 control-label">Vehiculo</label>

                            <div class="col-md-6">
                                <select name="vehiculo_id" id="vehiculo_id" class="form-control">       
                                    <option Selected disabled>Seleccione el Vehiculo</option>
                                    
                                @foreach($Vehiculos as $row)
                                    <option value="{{ $row->id }}">{{ $row->modelo }}</option>
                                @endforeach
                                </select>
                                {!! $errors->first('vehiculo_id','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                        
                        <div class="form-group {{ $errors->has('fecha_recibido') ? 'has-error' : ''}}">
                            <label for="fecha_recibido" class="col-md-4 control-label">Fecha Recibido</label>

                            <div class="col-md-6">
                                <input id="fecha_recibido" type="date" class="form-control" name="fecha_recibido" value="{{ old('fecha_recibido') }}">
                                {!! $errors->first('fecha_recibido','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                       
                        <div class="form-group {{ $errors->has('diagnostico') ? 'has-error' : ''}}">
                            <label for="diagnostico" class="col-md-4 control-label">Diagnostico</label>

                            <div class="col-md-6">
                                <input id="diagnostico" type="text" class="form-control" name="diagnostico" value="{{ old('diagnostico') }}"> 
                                {!! $errors->first('diagnostico','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                       
                        <div class="form-group {{ $errors->has('cambios_repuestos') ? 'has-error' : ''}}">
                            <label for="cambios_repuestos" class="col-md-4 control-label">Repuestos Cambiar</label>

                            <div class="col-md-6">
                                <input id="cambios_repuestos" type="text" class="form-control" name="cambios_repuestos" value="{{ old('cambios_repuestos') }}"> 
                                {!! $errors->first('cambios_repuestos','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('fecha_entrega') ? 'has-error' : ''}}">
                            <label for="fecha_entrega" class="col-md-4 control-label">Fecha Entrega</label>

                            <div class="col-md-6">
                                <input id="fecha_entrega" type="date" class="form-control" name="fecha_entrega" value="{{ old('fecha_entrega') }}">       
                                {!! $errors->first('fecha_entrega','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>


                        <div class="form-group {{ $errors->has('total_repuestos') ? 'has-error' : ''}}">
                            <label for="total_repuestos" class="col-md-4 control-label">Total Repuestos</label>

                            <div class="col-md-6">
                                <input id="total_repuestos" type="text" class="form-control" name="total_repuestos" value="{{ old('total_repuestos') }}">
                                {!! $errors->first('total_repuestos','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                         <div class="form-group {{ $errors->has('total_mano_obra') ? 'has-error' : ''}}">
                            <label for="total_mano_obra" class="col-md-4 control-label">Total Mano de Obra</label>

                            <div class="col-md-6">
                                <input id="total_mano_obra" type="text" class="form-control" name="total_mano_obra" value="{{ old('total_mano_obra') }}">                              
                                {!! $errors->first('total_mano_obra','<span class="help-block">:message</span>') !!}
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