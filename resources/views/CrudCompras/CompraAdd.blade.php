@extends('layouts.app')

@section('content')

@include('layouts.navbar')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Insertar Compra</div>

                    <div class="panel-body">
                        <form class="form-horizontal" action="{{ route('compraAdd') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
        
                        <div class="form-group {{ $errors->has('nombre_producto') ? 'has-error' : ''}}">
                            <div class="posting-read">Información de la Compra <i class="icon-contacts"></i></div>

                            <label for="nombre_producto" class="col-md-4 control-label">Nombre del producto</label>

                            <div class="col-md-6">
                                <input id="nombre_producto" type="text" class="form-control" name="nombre_producto" value="{{ old('nombres') }}">
                                {!! $errors->first('nombre_producto','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('departamento_id') ? 'has-error' : ''}}">
                            <div class="posting-read">Datos Del Proveedor <i class="icon-folder_shared"></i></div>
                            <label for="iddepartamento" class="col-md-4 control-label">Departamento</label>

                            <div class="col-md-6">
                                <select name="proveedor_id" id="proveedor_id" class="form-control">       
                                    <option Selected disabled>Seleccione el Proveedor</option>
                                    
                                @foreach($Proveedor as $row)
                                    <option value="{{ $row->id }}">{{ $row->nombres }}</option>
                                @endforeach
                                </select>
                                {!! $errors->first('proveedor_id','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                        
                        <div class="form-group {{ $errors->has('fecha') ? 'has-error' : ''}}">
                            <label for="fecha" class="col-md-4 control-label">Fecha</label>

                            <div class="col-md-6">
                                <input id="fecha" type="date" class="form-control" name="fecha" value="{{ old('fecha') }}"> 
                                {!! $errors->first('fecha','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
 
                        <div class="form-group {{ $errors->has('cantidad') ? 'has-error' : ''}}">
                            <label for="cantidad" class="col-md-4 control-label">Cantidad</label>

                            <div class="col-md-6">
                                <input id="cantidad" type="text" class="form-control" name="cantidad" value="{{ old('cantidad') }}">
                                {!! $errors->first('cantidad','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('precio_unitario') ? 'has-error' : ''}}">
                            <label for="precio_unitario" class="col-md-4 control-label">Precio Unitario</label>

                            <div class="col-md-6">
                                <input id="precio_unitario" type="text" class="form-control" name="precio_unitario" value="{{ old('precio_unitario') }}">       
                                {!! $errors->first('precio_unitario','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('iva') ? 'has-error' : ''}}">
                            <label for="iva" class="col-md-4 control-label">IVA</label>

                            <div class="col-md-6">
                                <input id="iva" type="text" class="form-control" name="iva" value="{{ old('iva') }}">                      
                                {!! $errors->first('iva','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                         <div class="form-group {{ $errors->has('descuento') ? 'has-error' : ''}}">
                            <label for="descuento" class="col-md-4 control-label">Descuento</label>

                            <div class="col-md-6">
                                <input id="descuento" type="text" class="form-control" name="descuento" value="{{ old('descuento') }}">                              
                                {!! $errors->first('descuento','<span class="help-block">:message</span>') !!}
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