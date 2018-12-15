@extends('layouts.app')

@section('content')

@include('layouts.navbar')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Insertar Producto</div>

                    <div class="panel-body">
                        <form class="form-horizontal" action="{{ route('productoAdd') }}" method="POST">
                        {{ csrf_field() }}
        
                        <div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
                            <div class="posting-read">Información del Producto <i class="icon-contacts"></i></div>

                            <label for="nombre" class="col-md-4 control-label">Nombre</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control" name="nombre" value="{{ old('nombre') }}">
                                {!! $errors->first('nombre','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                        
                        <div class="form-group {{ $errors->has('marca_id') ? 'has-error' : ''}}">
                            <label for="idmarca" class="col-md-4 control-label">Marca</label>

                            <div class="col-md-6">
                                <select name="marca_id" id="marca_id" class="form-control">       
                                    <option Selected disabled>Seleccione la Marca</option>
                                    
                                @foreach($Pmarcas as $row)
                                    <option value="{{ $row->id }}">{{ $row->marca }}</option>
                                @endforeach
                                </select>
                                {!! $errors->first('marca_id','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('descripcion') ? 'has-error' : ''}}">
                            <label for="descripcion" class="col-md-4 control-label">Descripción</label>

                            <div class="col-md-6">
                                <textarea name="descripcion" id="descripcion" class="form-control ajuste" rows="5">{{ old('descripcion') }}</textarea>
                                {!! $errors->first('descripcion','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('estado') ? 'has-error' : ''}}">
                            <label for="estado" class="col-md-4 control-label">Estado</label>

                            <div class="col-md-6">
                                <input id="estado" type="text" class="form-control" name="estado" value="{{ old('estado') }}">                                                       
                                {!! $errors->first('estado','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                        
                        <div class="form-group {{ $errors->has('cantidad') ? 'has-error' : ''}}">
                            <label for="cantidad" class="col-md-4 control-label">Cantidad</label>

                            <div class="col-md-6">
                                <input id="cantidad" type="number" min="1" class="form-control" name="cantidad" value="{{ old('cantidad') }}">
                                {!! $errors->first('cantidad','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                         <div class="form-group {{ $errors->has('precio_costo') ? 'has-error' : ''}}">
                            <label for="precio_costo" class="col-md-4 control-label">Precio Costo</label>

                            <div class="col-md-6">
                                <input id="precio_costo" type="number" min="0.00" step="0.01" class="form-control" name="precio_costo" value="{{ old('precio_costo') }}">                              
                                {!! $errors->first('precio_costo','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('precio_mayoreo') ? 'has-error' : ''}}">
                            <label for="precio_mayoreo" class="col-md-4 control-label">Precio Mayoreo</label>

                            <div class="col-md-6">
                                <input id="precio_mayoreo" type="number" min="0.00" step="0.01" class="form-control" name="precio_mayoreo" value="{{ old('precio_mayoreo') }}">                                                       
                                {!! $errors->first('precio_mayoreo','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('precio_regular') ? 'has-error' : ''}}">
                            <label for="precio_regular" class="col-md-4 control-label">Precio Regular</label>

                            <div class="col-md-6">
                                <input id="precio_regular" type="number" min="0.00" step="0.01" class="form-control" name="precio_regular" value="{{ old('precio_regular') }}">                                                       
                                {!! $errors->first('precio_regular','<span class="help-block">:message</span>') !!}
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