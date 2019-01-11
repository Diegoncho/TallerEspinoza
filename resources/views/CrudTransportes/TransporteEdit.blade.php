@extends('layouts.app')

@section('content')

@include('layouts.navbar')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Editar Transporte: {{ $VistaTransportes->destino }}</div>

                    <div class="panel-body">
                        <form class="form-horizontal" action="{{ route('transporteEdit', $Transportes->id) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="form-group {{ $errors->has('fecha_inicio') ? 'has-error' : ''}}">
                            <label for="fecha_inicio" class="col-md-3">Fecha Inicio</label>

                            <div class="col-md-12">
                                <input id="fecha_inicio" readonly type="text" class="form-control" name="fecha_inicio" value="{{ $Transportes->fecha_inicio }}">
                                {!! $errors->first('fecha_inicio','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('fecha_fin') ? 'has-error' : ''}}">
                            <label for="fecha_fin" class="col-md-3">Fecha Fin</label>

                            <div class="col-md-12">
                                <input id="fecha_fin" readonly type="text" class="form-control" name="fecha_fin" value="{{ $Transportes->fecha_fin }}">       
                                {!! $errors->first('fecha_fin','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
        
                        <div class="form-group {{ $errors->has('destino') ? 'has-error' : ''}}">
                            <label for="destino" class="col-md-3">Destino</label>

                            <div class="col-md-12">
                                <input id="destino" type="text" class="form-control" name="destino" value="{{ $Transportes->destino }}"> 
                                {!! $errors->first('destino','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('empleado_id') ? 'has-error' : ''}}">
                            <label for="id_empleado" class="col-md-3">Empleado</label>

                            <div class="col-md-12">
                                <select name="empleado_id" id="empleado_id" class="form-control">       
                                    <option value="{{ $VistaTransportes->empleado_id }}">{{ $VistaTransportes->nombres }} {{ $VistaTransportes->apellidos }}</option>
                                    
                                @foreach($Empleados as $row)
                                    <option value="{{ $row->id }}">{{ $row->nombres }} {{ $row->apellidos }}</option>
                                @endforeach
                                </select>
                                {!! $errors->first('empleado_id','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('vehiculo_id') ? 'has-error' : ''}}">
                            <label for="id_vehiculo" class="col-md-3">Vehiculo</label>

                            <div class="col-md-12">
                                <select name="vehiculo_id" id="vehiculo_id" class="form-control">       
                                    <option value="{{ $VistaTransportes->vehiculo_id }}">{{ $VistaTransportes->modelo }}</option>
                                    
                                @foreach($VistaVehiculos as $row)
                                    <option value="{{ $row->id }}">{{ $row->modelo }}</option>
                                @endforeach
                                </select>
                                {!! $errors->first('vehiculo_id','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('carga') ? 'has-error' : ''}}">
                            <label for="carga" class="col-md-3">Carga</label>

                            <div class="col-md-12">
                                <input id="carga" type="text" class="form-control" name="carga" value="{{ $Transportes->carga }}">
                                {!! $errors->first('carga','<span class="help-block">:message</span>') !!}
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

            <form action="{{ route('transporte') }}/{{ $Transportes->id }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}

            <button class="btn btn-danger">
                <i class="icon-delete_sweep"></i> Eliminar
            </button>
            </form>

        </div>
    </div>

@section('scripts')
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

@endsection