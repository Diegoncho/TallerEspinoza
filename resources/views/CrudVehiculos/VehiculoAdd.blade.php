@extends('layouts.app')

@section('content')

@include('layouts.navbar')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Insertar Vehiculo</div>

                    <div class="panel-body">
                        <form class="form-horizontal" action="{{ route('vehiculoAdd') }}" method="POST">
                        {{ csrf_field() }}

                        <div class="form-group {{ $errors->has('marca_id') ? 'has-error' : ''}}">
                            <div class="posting-read">Información del Vehiculo <i class="icon-info"></i></div>

                            <label for="idmarca" class="col-md-4 control-label">Marca</label>

                            <div class="col-md-6">
                                <select name="marca_id" id="marca_id" class="form-control">       
                                    <option Selected disabled>Seleccione la Marca</option>
                                    
                                @foreach($Vmarcas as $row)
                                    <option value="{{ $row->id }}">{{ $row->marca }}</option>
                                @endforeach
                                </select>
                                {!! $errors->first('marca_id','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                        
                        <div class="form-group {{ $errors->has('modelo_id') ? 'has-error' : ''}}">
                            <label for="idmodelo" class="col-md-4 control-label">Modelo</label>

                            <div class="col-md-6">
                                <select name="modelo_id" id="modelo_id" class="form-control">       
                                    <option Selected disabled>Seleccione el Modelo</option>
                                    
                                @foreach($Modelos as $row)
                                    <option value="{{ $row->id }}">{{ $row->modelo }}</option>
                                @endforeach
                                </select>
                                {!! $errors->first('modelo_id','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('color') ? 'has-error' : ''}}">
                            <label for="color" class="col-md-4 control-label">Color</label>

                            <div class="col-md-6">
                                <input id="color" type="text" class="form-control" name="color" value="{{ old('color') }}">       
                                {!! $errors->first('color','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('matricula') ? 'has-error' : ''}}">
                            <label for="matricula" class="col-md-4 control-label">Matricula</label>

                            <div class="col-md-6">
                                <input id="matricula" type="text" class="form-control" name="matricula" value="{{ old('matricula') }}">
                                {!! $errors->first('matricula','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                         <div class="form-group {{ $errors->has('anio') ? 'has-error' : ''}}">
                            <label for="anio" class="col-md-4 control-label">Año</label>

                            <div class="col-md-6">
                                <input id="anio" class="form-control" name="anio" value="{{ old('anio') }}">                              
                                {!! $errors->first('anio','<span class="help-block">:message</span>') !!}
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