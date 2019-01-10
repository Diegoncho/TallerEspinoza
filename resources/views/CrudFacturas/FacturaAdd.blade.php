@extends('layouts.app')

@section('content')

@include('layouts.navbar')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Insertar Factura</div>

                    <div class="panel-body">
                        <form class="form-horizontal" action="{{ route('facturaAdd') }}" method="POST">
                        {{ csrf_field() }}
        
                        <div class="form-group {{ $errors->has('fecha') ? 'has-error' : ''}}">
                            <div class="posting-read">Información de Factura <i class="icon-info"></i></div>

                            <label for="fecha" class="col-md-4 control-label">Fecha</label>

                            <div class="col-md-6">
                                <input id="fecha" readonly type="text" class="form-control" name="fecha" value="{{ old('fecha') }}">
                                {!! $errors->first('fecha','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('producto_id') ? 'has-error' : ''}}">
                            <div class="posting-read">Agregar Producto <i class="icon-style"></i></div>

                            <label for="idproducto" class="col-md-4 control-label">Producto</label>

                            <div class="col-md-6">
                                <select name="producto_id" id="producto_id" class="form-control">       
                                    <option Selected disabled>Seleccione el Producto</option>
                                    
                                @foreach($Productos as $row)
                                    <option value="{{ $row->id }}">{{ $row->nombre }}</option>
                                @endforeach
                                </select>
                                {!! $errors->first('producto_id','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('marca') ? 'has-error' : ''}}">
                            <label for="marca" class="col-md-4 control-label">Marca</label>

                            <div class="col-md-6">
                                <input id="marca" readonly type="text" class="form-control" name="marca">
                                {!! $errors->first('marca','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('precio_costo') ? 'has-error' : ''}}">
                            <label for="precio_costo" class="col-md-4 control-label">Precio Costo</label>

                            <div class="col-md-6">
                                <input id="precio_costo" readonly type="text" class="form-control" name="precio_costo">
                                {!! $errors->first('precio_costo','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('mecanica_id') ? 'has-error' : ''}}">
                            <div class="posting-read">Agregar Mecanica <i class="icon-format_color_fill"></i></div>

                            <label for="id_mecanica" class="col-md-4 control-label">Diagnostico</label>

                            <div class="col-md-6">
                                <select name="mecanica_id" id="mecanica_id" class="form-control">       
                                    <option Selected disabled>Seleccione la Diagnostico</option>
                                    
                                @foreach($Mecanicas as $row)
                                    <option value="{{ $row->id }}">{{ $row->diagnostico }}</option>
                                @endforeach
                                </select>
                                {!! $errors->first('mecanica_id','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('total_repuesto') ? 'has-error' : ''}}">
                            <label for="total_repuesto" class="col-md-4 control-label">Total Repuesto</label>

                            <div class="col-md-6">
                                <input id="total_repuesto" readonly type="text" class="form-control" name="total_repuesto">
                                {!! $errors->first('total_repuesto','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('total_mano_obra') ? 'has-error' : ''}}">
                            <label for="total_mano_obra" class="col-md-4 control-label">Total Mano Obra</label>

                            <div class="col-md-6">
                                <input id="total_mano_obra" readonly type="text" class="form-control" name="total_mano_obra">
                                {!! $errors->first('total_mano_obra','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('cliente_id') ? 'has-error' : ''}}">
                            <div class="posting-read">Agregar Cliente <i class="icon-person"></i></div>

                            <label for="id_cliente" class="col-md-4 control-label">Cliente</label>

                            <div class="col-md-6">
                                <select name="cliente_id" id="cliente_id" class="form-control">       
                                    <option Selected disabled>Seleccione el Cliente</option>
                                    
                                @foreach($Clientes as $row)
                                    <option value="{{ $row->id }}">{{ $row->nombres }} {{ $row->apellidos }}</option>
                                @endforeach
                                </select>
                                {!! $errors->first('cliente_id','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('direccion') ? 'has-error' : ''}}">
                            <label for="direccion" class="col-md-4 control-label">Dirección</label>

                            <div class="col-md-6">
                                <textarea name="direccion" readonly id="direccion" class="form-control ajuste" rows="5"></textarea>
                                {!! $errors->first('direccion','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('telefono') ? 'has-error' : ''}}">
                            <label for="telefono" class="col-md-4 control-label">Teléfono</label>

                            <div class="col-md-6">
                                <input id="telefono" readonly type="text" class="form-control" name="telefono">
                                {!! $errors->first('telefono','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('cantidad') ? 'has-error' : ''}}">
                            <label for="cantidad" class="col-md-4 control-label">Cantidad</label>

                            <div class="col-md-6">
                                <input id="cantidad" type="number" min="1" class="form-control" name="cantidad" value="{{ old('cantidad') }}">
                                {!! $errors->first('cantidad','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('precio_factura') ? 'has-error' : ''}}">
                            <label for="precio_factura" class="col-md-4 control-label">Precio Facturación</label>

                            <div class="col-md-6">
                                <input id="precio_factura" type="number" min="0.00" step="0.01" class="form-control" name="precio_factura" value="{{ old('precio_factura') }}">                              
                                {!! $errors->first('precio_factura','<span class="help-block">:message</span>') !!}
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