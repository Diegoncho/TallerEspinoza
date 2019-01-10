@extends('layouts.app')

@section('content')

@include('layouts.navbar')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Editar Factura: {{ $VistaFacturas->id }}</div>

                    <div class="panel-body">
                        <form class="form-horizontal" action="{{ route('facturaEdit', $VistaFacturas->id) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="form-group {{ $errors->has('fecha') ? 'has-error' : ''}}">
                            <label for="fecha" class="col-md-1">Fecha</label>

                            <div class="col-md-12">
                                <input id="fecha" readonly type="text" class="form-control" name="fecha" value="{{ $VistaFacturas->fecha }}">
                                {!! $errors->first('fecha','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('producto_id') ? 'has-error' : ''}}">
                            <label for="idproducto" class="col-md-1">Producto</label>

                            <div class="col-md-12">
                                <select name="producto_id" id="producto_id" class="form-control">      
                                    <option value="{{ $VistaFacturas->producto_id }}">{{ $VistaFacturas->producto }}</option>
                                    
                                @foreach($Productos as $row)
                                    <option value="{{ $row->id }}">{{ $row->nombre }}</option>
                                @endforeach
                                    <option value="">Ningún Producto</option>

                                </select>
                                {!! $errors->first('producto_id','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('marca') ? 'has-error' : ''}}">
                            <label for="marca" class="col-md-3">Marca</label>

                            <div class="col-md-12">
                                <input id="marca" readonly type="text" class="form-control" name="marca" value="{{ $VistaFacturas->marca }}">
                                {!! $errors->first('marca','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('precio_costo') ? 'has-error' : ''}}">
                            <label for="precio_costo" class="col-md-3">Precio Costo</label>

                            <div class="col-md-12">
                                <input id="precio_costo" readonly type="text" class="form-control" name="precio_costo" value="{{ $VistaFacturas->precio_costo }}">
                                {!! $errors->first('precio_costo','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('mecanica_id') ? 'has-error' : ''}}">
                            <label for="id_mecanica" class="col-md-3">Diagnostico</label>

                            <div class="col-md-12">
                                <select name="mecanica_id" id="mecanica_id" class="form-control">       
                                    <option value="{{ $VistaFacturas->mecanica_id }}">{{ $VistaFacturas->diagnostico }}</option>

                                @foreach($Mecanicas as $row)
                                    <option value="{{ $row->id }}">{{ $row->diagnostico }}</option>
                                @endforeach
                                    <option value="">Ningúna Mecanica</option>

                                </select>
                                {!! $errors->first('mecanica_id','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('total_repuesto') ? 'has-error' : ''}}">
                            <label for="total_repuesto" class="col-md-3">Total Repuesto</label>

                            <div class="col-md-12">
                                <input id="total_repuesto" readonly type="text" class="form-control" name="total_repuesto" value="{{ $VistaFacturas->total_repuesto }}">
                                {!! $errors->first('total_repuesto','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('total_mano_obra') ? 'has-error' : ''}}">
                            <label for="total_mano_obra" class="col-md-3">Total Mano Obra</label>

                            <div class="col-md-12">
                                <input id="total_mano_obra" readonly type="text" class="form-control" name="total_mano_obra" value="{{ $VistaFacturas->total_mano_obra }}">
                                {!! $errors->first('total_mano_obra','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('cliente_id') ? 'has-error' : ''}}">
                            <label for="idcliente" class="col-md-1">Cliente</label>

                            <div class="col-md-12">
                                <select name="cliente_id" id="cliente_id" class="form-control">       
                                    <option value="{{ $VistaFacturas->cliente_id }}">{{ $VistaFacturas->nombres }} {{ $VistaFacturas->apellidos }}</option>

                                @foreach($Clientes as $row)
                                    <option value="{{ $row->id }}">{{ $row->nombres }} {{ $row->apellidos }}</option>
                                @endforeach
                                </select>
                                {!! $errors->first('cliente_id','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('direccion ') ? 'has-error' : ''}}">
                            <label for="direccion" class="col-md-1">Dirección</label>

                            <div class="col-md-12">
                                <textarea name="direccion" readonly id="direccion" class="form-control ajuste" rows="5">{{ $VistaFacturas->direccion }}</textarea>
                                {!! $errors->first('direccion ','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('telefono') ? 'has-error' : ''}}">
                            <label for="telefono" class="col-md-1">Teléfono</label>

                            <div class="col-md-12">
                                <input id="telefono" readonly type="text" class="form-control" name="telefono" value="{{ $VistaFacturas->telefono }}">
                                {!! $errors->first('telefono','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('cantidad') ? 'has-error' : ''}}">
                            <label for="cantidad" class="col-md-1">Cantidad</label>

                            <div class="col-md-12">
                                <input id="cantidad" type="number" min="1" class="form-control" name="cantidad" value="{{ $VistaFacturas->cantidad }}">
                                {!! $errors->first('cantidad','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('precio_factura ') ? 'has-error' : ''}}">
                            <label for="precio_factura" class="col-md-3">Precio Facturación</label>

                            <div class="col-md-12">
                                <input id="precio_factura" type="number" min="0.00" step="0.01" class="form-control" name="precio_factura" value="{{ $VistaFacturas->precio_factura }}">                              
                                {!! $errors->first('precio_factura ','<span class="help-block">:message</span>') !!}
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

            <form action="{{ route('factura') }}/{{ $VistaFacturas->id }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}

            <button class="btn btn-danger">
                <i class="icon-delete_sweep"></i> Eliminar
            </button>
            </form>

        </div>
    </div>

<script type="text/javascript">

$(document).ready(function() {
    $("#fecha").datepicker({
    changeYear:true,
    yearRange: "1950:2100"
    });
});

$('#producto_id').on('change', function() {
    // Usaremos el método 'get' para obtener los 
    // datos del desarrollador mediante ajax.

    $.get(encodeURI('getProducto/'+ this.value), function(VistaProductos) {
        console.log(VistaProductos)
        // Con el método 'each' recorremos los datos.

        $.each(VistaProductos, function(key, data) {
            // Buscamos un input que tenga el mismo nombre
            // que nuestro campo, y establecemos su valor
            // con los datos del desarrollador.

            $("input[name="+ key +"]").val(data);
        });
    });
})

$('#mecanica_id').on('change', function() {
    // Usaremos el método 'get' para obtener los 
    // datos del desarrollador mediante ajax.

    $.get(encodeURI('getMecanica/'+ this.value), function(Mecanicas) {
        console.log(Mecanicas)
        // Con el método 'each' recorremos los datos.

        $.each(Mecanicas, function(key, data) {
            // Buscamos un input que tenga el mismo nombre
            // que nuestro campo, y establecemos su valor
            // con los datos del desarrollador.

            $("input[name="+ key +"]").val(data);
        });
    });
})

$('#cliente_id').on('change', function() {
    // Usaremos el método 'get' para obtener los 
    // datos del desarrollador mediante ajax.

    $.get(encodeURI('getCliente/'+ this.value), function(Clientes) {
        console.log(Clientes)
        // Con el método 'each' recorremos los datos.

        $.each(Clientes, function(key, data) {
            // Buscamos un input que tenga el mismo nombre
            // que nuestro campo, y establecemos su valor
            // con los datos del desarrollador.

            $("input[name="+ key +"]").val(data);
            $("textarea[name="+ key +"]").val(data); 
        });
    });
})

</script>

@endsection