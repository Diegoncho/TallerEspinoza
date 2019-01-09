@extends('layouts.app')

@section('content')

@include('layouts.navbar')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Editar Empleado: {{ $Empleados->nombres }}</div>

                    <div class="panel-body">
                        <form class="form-horizontal" action="{{ route('empleadoEdit', $Empleados->id) }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="form-group {{ $errors->has('nombres') ? 'has-error' : ''}}">
                            <label for="nombres" class="col-md-1">Nombres</label>

                            <div class="col-md-12">
                                <input id="nombres" type="text" class="form-control" name="nombres" value="{{ $Empleados->nombres }}">
                                {!! $errors->first('nombres','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('apellidos') ? 'has-error' : ''}}">
                            <label for="apellidos" class="col-md-1">Apellidos</label>

                            <div class="col-md-12">
                                <input id="apellidos" type="text" class="form-control" name="apellidos" value="{{ $Empleados->apellidos }}"> 
                                {!! $errors->first('apellidos','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('direccion') ? 'has-error' : ''}}">
                            <label for="direccion" class="col-md-1">Dirección</label>

                            <div class="col-md-12">
                                <textarea name="direccion" id="direccion" class="form-control ajuste" rows="5">{{ $Empleados->direccion }}</textarea>
                                {!! $errors->first('direccion','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                        
                        <div class="form-group {{ $errors->has('telefono') ? 'has-error' : ''}}">
                            <label for="telefono" class="col-md-1">Teléfono</label>

                            <div class="col-md-12">
                                <input id="telefono" type="tel" class="form-control" name="telefono" value="{{ $Empleados->telefono }}">
                                {!! $errors->first('telefono','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('estado_civil') ? 'has-error' : ''}}">
                            <label for="estado_civil" class="col-md-3">Estado Civil</label>

                            <div class="col-md-12">
                                <input id="estado_civil" type="text" class="form-control" name="estado_civil" value="{{ $Empleados->estado_civil }}">       
                                {!! $errors->first('estado_civil','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('fecha_nac') ? 'has-error' : ''}}">
                            <label for="fecha_nac" class="col-md-3">Fecha Nacimiento</label>

                            <div class="col-md-12">
                                <input id="fecha_nac" readonly type="text" class="form-control" name="fecha_nac" value="{{ $Empleados->fecha_nac }}">                      
                                {!! $errors->first('fecha_nac','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('edad') ? 'has-error' : ''}}">
                            <label for="edad" class="col-md-1">Edad</label>

                            <div class="col-md-12">
                                <input id="edad" type="number" class="form-control" name="edad" value="{{ $Empleados->edad }}">
                                {!! $errors->first('edad','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('sexo') ? 'has-error' : ''}}">
                            <label for="sexo" class="col-md-1">Sexo</label>

                            <div class="col-md-12">
                            @if ($Empleados->sexo == "Masculino")
                                <input id="sexo" value="Masculino" type="radio" name="sexo" checked> Masculino 
                                <input id="sexo" value="Femenino" type="radio" name="sexo"> Femenino 
                            @elseif ($Empleados->sexo == "Femenino")
                                <input id="sexo" value="Masculino" type="radio" name="sexo"> Masculino 
                                <input id="sexo" value="Femenino" type="radio" name="sexo" checked> Femenino
                                {!! $errors->first('sexo','<span class="help-block">:message</span>') !!}
                            @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('departamento_id') ? 'has-error' : ''}}">
                            <label for="iddepartamento" class="col-md-1">Departamento</label>

                            <div class="col-md-12">
                                <select name="departamento_id" id="departamento_id" class="form-control">       
                                    <option value="{{ $VistaEmpleados->departamento_id }}">{{ $VistaEmpleados->nombre }}</option>
                                    
                                @foreach($Departamentos as $row)
                                    <option value="{{ $row->id }}">{{ $row->nombre }}</option>
                                @endforeach
                                </select>
                                {!! $errors->first('departamento_id','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                         <div class="form-group {{ $errors->has('dui') ? 'has-error' : ''}}">
                            <label for="dui" class="col-md-1">DUI</label>

                            <div class="col-md-12">
                                <input id="dui" type="text" class="form-control" name="dui" value="{{ $Empleados->dui }}">                              
                                {!! $errors->first('dui','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('nit') ? 'has-error' : ''}}">
                            <label for="nit" class="col-md-1">NIT</label>

                            <div class="col-md-12">
                                <input id="nit" type="text" class="form-control" name="nit" value="{{ $Empleados->nit }}">                                                       
                                {!! $errors->first('nit','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('afp') ? 'has-error' : ''}}">
                            <label for="afp" class="col-md-1">AFP</label>

                            <div class="col-md-12">
                                <input id="afp" type="text" class="form-control" name="afp" value="{{ $Empleados->afp }}">
                                {!! $errors->first('afp','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                            <label for="email" class="col-md-3">Correo Electronico</label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $Empleados->email }}">                     
                                {!! $errors->first('email','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('img') ? 'has-error' : ''}}">
                            <label for="img" class="col-md-1">Img</label>

                            <div class="col-md-12">
                                <input id="img" type="file" class="fileinput fileinput-new" name="img">
                                {!! $errors->first('img','<span class="help-block">:message</span>') !!}
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
            
            <form action="{{ route('empleado') }}/{{ $Empleados->id }}" method="POST">
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
        $("#fecha_nac").datepicker({
        changeYear:true,
        yearRange: "1950:2100"
        });
    });

</script>
@endsection