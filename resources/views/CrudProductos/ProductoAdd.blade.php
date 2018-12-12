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
        
                        <div class="form-group {{ $errors->has('nombres') ? 'has-error' : ''}}">
                            <div class="posting-read">Información del Producto <i class="icon-contacts"></i></div>

                            <label for="nombres" class="col-md-4 control-label">Nombres</label>

                            <div class="col-md-6">
                                <input id="nombres" type="text" class="form-control" name="nombres" value="{{ old('nombres') }}">
                                {!! $errors->first('nombres','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                        
                        <div class="form-group {{ $errors->has('marca') ? 'has-error' : ''}}">
                            <label for="marca" class="col-md-4 control-label">Marca</label>

                            <div class="col-md-6">
                                <input id="marca" type="text" class="form-control" name="marca" value="{{ old('apellidos') }}"> 
                                {!! $errors->first('marca','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('descripcion') ? 'has-error' : ''}}">
                            <label for="descripcion" class="col-md-4 control-label">Descripción</label>

                            <div class="col-md-6">
                                <textarea name="descripcion" id="descripcion" class="form-control ajuste" rows="5">{{ old('descripcion') }}</textarea>
                                {!! $errors->first('descripcion','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                        
                        <div class="form-group {{ $errors->has('condicion') ? 'has-error' : ''}}">
                            <label for="condicon" class="col-md-4 control-label">Condición</label>

                            <div class="col-md-6">
                                <input id="condicion" type="text" class="form-control" name="condicion" value="{{ old('telefono') }}">
                                {!! $errors->first('condicion','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                         <div class="form-group {{ $errors->has('vl_precio_compra') ? 'has-error' : ''}}">
                            <label for="vl_precio_compra" class="col-md-4 control-label">Valor de compra</label>

                            <div class="col-md-6">
                                <input id="vl_precio_compra" type="text" class="form-control" name="vl_precio_compra" value="{{ old('vl_precio_compra') }}">                              
                                {!! $errors->first('vl_precio_compra','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('precio_unitario') ? 'has-error' : ''}}">
                            <label for="precio_unitario" class="col-md-4 control-label">Precio por unidad</label>

                            <div class="col-md-6">
                                <input id="precio_unitario" type="text" class="form-control" name="precio_unitario" value="{{ old('precio_unitario') }}">                                                       
                                {!! $errors->first('precio_unitario','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('c_existencia') ? 'has-error' : ''}}">
                            <label for="c_existencia" class="col-md-4 control-label">Cantidad del producto</label>

                            <div class="col-md-6">
                                <input id="c_existencia" type="text" class="form-control" name="c_existencia" value="{{ old('c_existencia') }}">                                                       
                                {!! $errors->first('c_existencia','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>


                        <div class="form-group {{ $errors->has('estado') ? 'has-error' : ''}}">
                            <label for="estado" class="col-md-4 control-label">Estado</label>

                            <div class="col-md-6">
                                <input id="estado" type="text" class="form-control" name="estado" value="{{ old('estado') }}">                                                       
                                {!! $errors->first('estado','<span class="help-block">:message</span>') !!}
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