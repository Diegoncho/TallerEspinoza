@extends('layouts.app')

@section('content')

@include('layouts.navbar')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Editar Mecanica: {{ $VistaMecanicas->diagnostico }}</div>

                    <div class="panel-body">
                        <form class="form-horizontal" action="{{ route('mecanicaEdit', $Mecanicas->id) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="form-group {{ $errors->has('fecha_recibido') ? 'has-error' : ''}}">
                            <label for="fecha_recibido" class="col-md-3">Fecha Recibido</label>

                            <div class="col-md-12">
                                <input id="fecha_recibido" type="date" class="form-control" name="fecha_recibido" value="{{ $VistaMecanicas->fecha_recibido }}">
                                {!! $errors->first('fecha_recibido','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('fecha_entrega') ? 'has-error' : ''}}">
                            <label for="fecha_entrega" class="col-md-3">Fecha Entrega</label>

                            <div class="col-md-12">
                                <input id="fecha_entrega" type="date" class="form-control" name="fecha_entrega" value="{{ $VistaMecanicas->fecha_entrega }}">       
                                {!! $errors->first('fecha_entrega','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('diagnostico') ? 'has-error' : ''}}">
                            <label for="diagnostico" class="col-md-1">Diagnostico</label>

                            <div class="col-md-12">
                                <input id="diagnostico" type="text" class="form-control" name="diagnostico" value="{{ $VistaMecanicas->diagnostico }}"> 
                                {!! $errors->first('diagnostico','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                       
                        <div class="form-group {{ $errors->has('cambios_repuestos') ? 'has-error' : ''}}">
                            <label for="cambios_repuestos" class="col-md-3">Repuestos a Cambiar</label>

                            <div class="col-md-12">
                                <input id="cambios_repuestos" type="text" class="form-control" name="cambios_repuestos" value="{{ $VistaMecanicas->cambios_repuestos }}"> 
                                {!! $errors->first('cambios_repuestos','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('empleado_id') ? 'has-error' : ''}}">
                            <label for="id_empleado" class="col-md-1">Empleado</label>

                            <div class="col-md-12">
                                <select name="empleado_id" id="empleado_id" class="form-control">       
                                    <option value="{{ $VistaMecanicas->empleado_id }}">{{ $VistaMecanicas->nombres }} {{ $VistaMecanicas->apellidos }}</option>
                                    
                                @foreach($Empleados as $row)
                                    <option value="{{ $row->id }}">{{ $row->nombres }} {{ $row->apellidos }}</option>
                                @endforeach
                                </select>
                                {!! $errors->first('empleado_id','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('total_repuesto') ? 'has-error' : ''}}">
                            <label for="total_repuesto" class="col-md-3">Total Repuesto</label>

                            <div class="col-md-12">
                                <input id="total_repuesto" type="number" min="0.00" step="0.01" class="form-control" name="total_repuesto" value="{{ $VistaMecanicas->total_repuesto }}">
                                {!! $errors->first('total_repuesto','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                         <div class="form-group {{ $errors->has('total_mano_obra') ? 'has-error' : ''}}">
                            <label for="total_mano_obra" class="col-md-3">Total Mano de Obra</label>

                            <div class="col-md-12">
                                <input id="total_mano_obra" type="number" min="0.00" step="0.01" class="form-control" name="total_mano_obra" value="{{ $VistaMecanicas->total_mano_obra }}">                              
                                {!! $errors->first('total_mano_obra','<span class="help-block">:message</span>') !!}
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

            <form action="{{ route('mecanica') }}/{{ $Mecanicas->id }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}

            <button class="btn btn-danger">
                <i class="icon-delete_sweep"></i> Eliminar
            </button>
            </form>

        </div>
    </div>

@endsection