@extends('layouts.app')

@section('content')

@include('layouts.navbar')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Insertar Compra</div>

                    <div class="panel-body">
                        <form class="form-horizontal" action="{{ route('compraAdd') }}" method="POST" autocomplete="off">
                        {{ csrf_field() }}

                        <div class="form-group {{ $errors->has('fecha_recibido') ? 'has-error' : ''}}">
                            <div class="posting-read">Información de Compra <i class="icon-info"></i></div>

                            <label for="fecha_recibido" class="col-md-4 control-label">Fecha de Compra</label>

                            <div class="col-md-6">
                                <input id="fecha_recibido" readonly type="text" class="form-control" name="fecha" value="{{ old('fecha') }}">
                                {!! $errors->first('fecha','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('proveedor_id') ? 'has-error' : ''}}">
                            <div class="posting-read">Tipo de Proveedor<i class="icon-person"></i></div>

                            <label for="proveedor_id" class="col-md-4 control-label">Proveedor</label>

                            <div class="col-md-6">
                                <select name="proveedor_id" id="proveedor_id" class="form-control selectpicker" data-show-subtext="true" data-live-search="true">       
                                    <option Selected disabled>Seleccione el Proveedor</option>
                                    
                                @foreach($Proveedores as $row)
                                    <option value="{{ $row->id }}">{{ $row->nombre_proveedor }} </option>
                                @endforeach
                                </select>
                                {!! $errors->first('proveedor_id','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('producto_id') ? 'has-error' : ''}}">
                            <div class="posting-read">Tipo de Producto<i class="icon-style"></i></div>

                            <label for="producto_id" class="col-md-4 control-label">Producto</label>

                            <div class="col-md-6">
                                <select name="producto_id" id="producto_id" class="form-control selectpicker" data-show-subtext="true" data-live-search="true">       
                                    <option Selected disabled>Seleccione el Producto</option>
                                    
                                @foreach($Productos as $row)
                                    <option value="{{ $row->id }}">{{ $row->nombre }} </option>
                                @endforeach
                                </select>
                                {!! $errors->first('producto_id','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('cantidad') ? 'has-error' : ''}}">
                            <label for="cantidad" class="col-md-4 control-label">Cantidad</label>

                            <div class="col-md-6">
                                <input id="cantidad" type="number" min="1" class="form-control" name="cantidad" value="{{ old('cantidad') }}">
                                {!! $errors->first('cantidad','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                         <div class="form-group {{ $errors->has('descuento') ? 'has-error' : ''}}">
                            <label for="descuento" class="col-md-4 control-label">Descuento</label>

                            <div class="col-md-6">
                                <input id="descuento" type="number" min="0.00" step="0.01" class="form-control" name="descuento" value="{{ old('descuento') }}">                              
                                {!! $errors->first('descuento','<span class="help-block">:message</span>') !!}
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

@section('scripts')
<script type="text/javascript">
    $( function() {
        var dateFormat = "mm/dd/yy",
        from = $( "#fecha_recibido" )
            .datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 3
            })
            .on( "change", function() {
            to.datepicker( "option", "minDate", getDate( this ) );
            }),
        to = $( "#fecha_entrega" ).datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 3
        })
        .on( "change", function() {
            from.datepicker( "option", "maxDate", getDate( this ) );
        });

        function getDate( element ) {
        var date;
        try {
            date = $.datepicker.parseDate( dateFormat, element.value );
        } catch( error ) {
            date = null;
        }

        return date;
        }
    });
</script>
@endsection

@endsection