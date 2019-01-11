@extends('layouts.app')

@section('content')

@include('layouts.navbar')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Insertar Mecanica</div>

                    <div class="panel-body">
                        <form class="form-horizontal" action="{{ route('mecanicaAdd') }}" method="POST" autocomplete="off">
                        {{ csrf_field() }}

                        <div class="form-group {{ $errors->has('fecha_recibido') ? 'has-error' : ''}}">
                            <div class="posting-read">Información de Mecanica <i class="icon-info"></i></div>

                            <label for="fecha_recibido" class="col-md-4 control-label">Fecha Recibido</label>

                            <div class="col-md-6">
                                <input id="fecha_recibido" readonly type="text" class="form-control" name="fecha_recibido" value="{{ old('fecha_recibido') }}">
                                {!! $errors->first('fecha_recibido','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('fecha_entrega') ? 'has-error' : ''}}">
                            <label for="fecha_entrega" class="col-md-4 control-label">Fecha Entrega</label>

                            <div class="col-md-6">
                                <input id="fecha_entrega" readonly type="text" class="form-control" name="fecha_entrega" value="{{ old('fecha_entrega') }}">       
                                {!! $errors->first('fecha_entrega','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('diagnostico') ? 'has-error' : ''}}">
                            <label for="diagnostico" class="col-md-4 control-label">Diagnostico</label>

                            <div class="col-md-6">
                                <input id="diagnostico" type="text" class="form-control" name="diagnostico" value="{{ old('diagnostico') }}"> 
                                {!! $errors->first('diagnostico','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                       
                        <div class="form-group {{ $errors->has('cambios_repuestos') ? 'has-error' : ''}}">
                            <label for="cambios_repuestos" class="col-md-4 control-label">Repuestos a Cambiar</label>

                            <div class="col-md-6">
                                <input id="cambios_repuestos" type="text" class="form-control" name="cambios_repuestos" value="{{ old('cambios_repuestos') }}"> 
                                {!! $errors->first('cambios_repuestos','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('empleado_id') ? 'has-error' : ''}}">
                            <div class="posting-read">Empleado Asignado <i class="icon-person"></i></div>

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

                        <div class="form-group {{ $errors->has('total_repuesto') ? 'has-error' : ''}}">
                            <label for="total_repuesto" class="col-md-4 control-label">Total Repuesto</label>

                            <div class="col-md-6">
                                <input id="total_repuesto" type="number" min="0.00" step="0.01" class="form-control" name="total_repuesto" value="{{ old('total_repuesto') }}">
                                {!! $errors->first('total_repuesto','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                         <div class="form-group {{ $errors->has('total_mano_obra') ? 'has-error' : ''}}">
                            <label for="total_mano_obra" class="col-md-4 control-label">Total Mano de Obra</label>

                            <div class="col-md-6">
                                <input id="total_mano_obra" type="number" min="0.00" step="0.01" class="form-control" name="total_mano_obra" value="{{ old('total_mano_obra') }}">                              
                                {!! $errors->first('total_mano_obra','<span class="help-block">:message</span>') !!}
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