@extends('layouts.app')

@section('content')

@include('layouts.navbar')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Insertar Transporte</div>

                    <div class="panel-body">
                        <form class="form-horizontal" action="{{ route('transporteAdd') }}" method="POST" autocomplete="off">
                        {{ csrf_field() }}

                        <div class="form-group {{ $errors->has('fecha_inicio') ? 'has-error' : ''}}">
                            <div class="posting-read">Información del Transporte <i class="icon-info"></i></div>

                            <label for="fecha_inicio" class="col-md-4 control-label">Fecha Inicio</label>

                            <div class="col-md-6">
                                <input id="fecha_inicio" readonly type="text" class="form-control" name="fecha_inicio" value="{{ old('fecha_inicio') }}">
                                {!! $errors->first('fecha_inicio','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('fecha_fin') ? 'has-error' : ''}}">
                            <label for="fecha_fin" class="col-md-4 control-label">Fecha Fin</label>

                            <div class="col-md-6">
                                <input id="fecha_fin" readonly type="text" class="form-control" name="fecha_fin" value="{{ old('fecha_fin') }}">       
                                {!! $errors->first('fecha_fin','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
        
                        <div class="form-group {{ $errors->has('destino') ? 'has-error' : ''}}">
                            <label for="destino" class="col-md-4 control-label">Destino</label>

                            <div class="col-md-6">
                                <input id="destino" type="text" class="form-control" name="destino" value="{{ old('destino') }}"> 
                                {!! $errors->first('destino','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('empleado_id') ? 'has-error' : ''}}">
                            <div class="posting-read">Motorista Asignado <i class="icon-person"></i></div>

                            <label for="id_empleado" class="col-md-4 control-label">Empleado</label>

                            <div class="col-md-6">
                                <select name="empleado_id" id="empleado_id" class="form-control">       
                                    <option Selected disabled>Seleccione el Empleado</option>
                                    
                                @foreach($Empleados as $row)
                                    <option value="{{ $row->id }}">{{ $row->nombres }} {{ $row->apellidos }}</option>
                                @endforeach
                                </select>
                                {!! $errors->first('empleado_id','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('vehiculo_id') ? 'has-error' : ''}}">
                            <div class="posting-read">Vehiculo Asignado <i class="icon-local_taxi"></i></div>
                            
                            <label for="id_vehiculo" class="col-md-4 control-label">Vehiculo</label>

                            <div class="col-md-6">
                                <select name="vehiculo_id" id="vehiculo_id" class="form-control">       
                                    <option Selected disabled>Seleccione el Vehiculo</option>
                                    
                                @foreach($VistaVehiculos as $row)
                                    <option value="{{ $row->id }}">{{ $row->modelo }}</option>
                                @endforeach
                                </select>
                                {!! $errors->first('vehiculo_id','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('carga') ? 'has-error' : ''}}">
                            <label for="carga" class="col-md-4 control-label">Carga</label>

                            <div class="col-md-6">
                                <input id="carga" type="text" class="form-control" name="carga" value="{{ old('carga') }}">
                                {!! $errors->first('carga','<span class="help-block">:message</span>') !!}
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
    $( function() {
        var dateFormat = "mm/dd/yy",
        from = $( "#fecha_inicio" )
            .datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 3
            })
            .on( "change", function() {
            to.datepicker( "option", "minDate", getDate( this ) );
            }),
        to = $( "#fecha_fin" ).datepicker({
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