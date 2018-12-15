@extends('layouts.app')

@section('content')

@include('layouts.navbar')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Editar Producto: {{ $Productos->nombre }}</div>

                    <div class="panel-body">
                        <form class="form-horizontal" action="{{ route('productoEdit', $Productos->id) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
                            <label for="nombre" class="col-md-1">Nombre</label>

                            <div class="col-md-12">
                                <input id="nombre" type="text" class="form-control" name="nombre" value="{{ $Productos->nombre }}">
                                {!! $errors->first('nombre','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                        
                        <div class="form-group {{ $errors->has('marca_id') ? 'has-error' : ''}}">
                            <label for="idmarca" class="col-md-1">Marca</label>

                            <div class="col-md-12">
                                <select name="marca_id" id="marca_id" class="form-control">       
                                    <option value="{{ $VistaProductos->marca_id }}">{{ $VistaProductos->marca }}</option>
                                    
                                @foreach($Pmarcas as $row)
                                    <option value="{{ $row->id }}">{{ $row->marca }}</option>
                                @endforeach
                                </select>
                                {!! $errors->first('marca_id','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('descripcion') ? 'has-error' : ''}}">
                            <label for="descripcion" class="col-md-1">Descripción</label>

                            <div class="col-md-12">
                                <textarea name="descripcion" id="descripcion" class="form-control ajuste" rows="5">{{ $Productos->descripcion }}</textarea>
                                {!! $errors->first('descripcion','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('estado') ? 'has-error' : ''}}">
                            <label for="estado" class="col-md-1">Estado</label>

                            <div class="col-md-12">
                                <input id="estado" type="text" class="form-control" name="estado" value="{{ $Productos->estado }}">                                                       
                                {!! $errors->first('estado','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                        
                        <div class="form-group {{ $errors->has('cantidad') ? 'has-error' : ''}}">
                            <label for="cantidad" class="col-md-1">Cantidad</label>

                            <div class="col-md-12">
                                <input id="cantidad" type="number" min="1" class="form-control" name="cantidad" value="{{ $Productos->cantidad }}">
                                {!! $errors->first('cantidad','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                         <div class="form-group {{ $errors->has('precio_costo') ? 'has-error' : ''}}">
                            <label for="precio_costo" class="col-md-3">Precio Costo</label>

                            <div class="col-md-12">
                                <input id="precio_costo" type="number" min="0.00" step="0.01" class="form-control" name="precio_costo" value="{{ $Productos->precio_costo }}">                              
                                {!! $errors->first('precio_costo','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('precio_mayoreo') ? 'has-error' : ''}}">
                            <label for="precio_mayoreo" class="col-md-3">Precio Mayoreo</label>

                            <div class="col-md-12">
                                <input id="precio_mayoreo" type="number" min="0.00" step="0.01" class="form-control" name="precio_mayoreo" value="{{ $Productos->precio_mayoreo }}">                                                       
                                {!! $errors->first('precio_mayoreo','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('precio_regular') ? 'has-error' : ''}}">
                            <label for="precio_regular" class="col-md-3">Precio Regular</label>

                            <div class="col-md-12">
                                <input id="precio_regular" type="number" min="0.00" step="0.01" class="form-control" name="precio_regular" value="{{ $Productos->precio_regular }}">                                                       
                                {!! $errors->first('precio_regular','<span class="help-block">:message</span>') !!}
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

            <form action="{{ route('producto') }}/{{ $Productos->id }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}

            <button class="btn btn-danger">
                <i class="icon-delete_sweep"></i> Eliminar
            </button>
            </form>

        </div>
    </div>
@endsection