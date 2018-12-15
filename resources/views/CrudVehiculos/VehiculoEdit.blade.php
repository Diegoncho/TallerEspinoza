@extends('layouts.app')

@section('content')

@include('layouts.navbar')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Editar Vehiculo: {{ $VistaVehiculos->modelo }}</div>

                    <div class="panel-body">
                        <form class="form-horizontal" action="{{ route('vehiculoEdit', $Vehiculos->id) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="form-group {{ $errors->has('marca_id') ? 'has-error' : ''}}">
                            <label for="idmarca" class="col-md-1">Marca</label>

                            <div class="col-md-12">
                                <select name="marca_id" id="marca_id" class="form-control">       
                                    <option value="{{ $VistaVehiculos->marca_id }}">{{ $VistaVehiculos->marca }}</option>
                                    
                                @foreach($Vmarcas as $row)
                                    <option value="{{ $row->id }}">{{ $row->marca }}</option>
                                @endforeach
                                </select>
                                {!! $errors->first('marca_id','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                        
                        <div class="form-group {{ $errors->has('modelo_id') ? 'has-error' : ''}}">
                            <label for="idmodelo" class="col-md-1">Modelo</label>

                            <div class="col-md-12">
                                <select name="modelo_id" id="modelo_id" class="form-control">       
                                    <option value="{{ $VistaVehiculos->modelo_id }}">{{ $VistaVehiculos->modelo }}</option>
                                    
                                @foreach($Modelos as $row)
                                    <option value="{{ $row->id }}">{{ $row->modelo }}</option>
                                @endforeach
                                </select>
                                {!! $errors->first('modelo_id','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('color') ? 'has-error' : ''}}">
                            <label for="color" class="col-md-1">Color</label>

                            <div class="col-md-12">
                                <input id="color" type="text" class="form-control" name="color" value="{{ $Vehiculos->color }}">       
                                {!! $errors->first('color','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('matricula') ? 'has-error' : ''}}">
                            <label for="matricula" class="col-md-1">Matricula</label>

                            <div class="col-md-12">
                                <input id="matricula" type="text" class="form-control" name="matricula" value="{{ $Vehiculos->matricula }}">
                                {!! $errors->first('matricula','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                         <div class="form-group {{ $errors->has('anio') ? 'has-error' : ''}}">
                            <label for="anio" class="col-md-1">Año</label>

                            <div class="col-md-12">
                                <input id="anio" class="form-control" name="anio" value="{{ $Vehiculos->anio }}">                              
                                {!! $errors->first('anio','<span class="help-block">:message</span>') !!}
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

            <form action="{{ route('vehiculo') }}/{{ $Vehiculos->id }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}

            <button class="btn btn-danger">
                <i class="icon-delete_sweep"></i> Eliminar
            </button>
            </form>

        </div>
    </div>

@endsection