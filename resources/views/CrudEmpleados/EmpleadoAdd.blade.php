@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading flexbox">
            <div class="auth">
                Bienvenido: <b>{{ auth()->user()->name }}</b> 
            </div>

            <div class="options">
                <a href="{{ route('menu') }}"><i class="icon-build"></i> Menu</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Insertar Empleado</div>

                    <div class="panel-body">
                        <form class="form-horizontal" action="{{ route('empleadoAdd') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
        
                        <div class="form-group {{ $errors->has('nombres') ? 'has-error' : ''}}">
                            <div class="posting-read">Información del Empleado <i class="icon-contacts"></i></div>

                            <label for="nombres" class="col-md-4 control-label">Nombres</label>

                            <div class="col-md-6">
                                <input id="nombres" type="text" class="form-control" name="nombres" value="{{ old('nombres') }}">
                                {!! $errors->first('nombres','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                        
                        <div class="form-group {{ $errors->has('apellidos') ? 'has-error' : ''}}">
                            <label for="apellidos" class="col-md-4 control-label">Apellidos</label>

                            <div class="col-md-6">
                                <input id="apellidos" type="text" class="form-control" name="apellidos" value="{{ old('apellidos') }}"> 
                                {!! $errors->first('apellidos','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('direccion') ? 'has-error' : ''}}">
                            <label for="direccion" class="col-md-4 control-label">Dirección</label>

                            <div class="col-md-6">
                                <textarea name="direccion" id="direccion" class="form-control ajuste" rows="5">{{ old('direccion') }}</textarea>
                                {!! $errors->first('direccion','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                        
                        <div class="form-group {{ $errors->has('telefono') ? 'has-error' : ''}}">
                            <label for="telefono" class="col-md-4 control-label">Teléfono</label>

                            <div class="col-md-6">
                                <input id="telefono" type="text" class="form-control" name="telefono" value="{{ old('telefono') }}">
                                {!! $errors->first('telefono','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('estado_civil') ? 'has-error' : ''}}">
                            <label for="estado_civil" class="col-md-4 control-label">Estado Civil</label>

                            <div class="col-md-6">
                                <input id="estado_civil" type="text" class="form-control" name="estado_civil" value="{{ old('estado_civil') }}">       
                                {!! $errors->first('estado_civil','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('fecha_nac') ? 'has-error' : ''}}">
                            <label for="fecha_nac" class="col-md-4 control-label">Fecha Nacimiento</label>

                            <div class="col-md-6">
                                <input id="fecha_nac" type="date" class="form-control" name="fecha_nac" value="{{ old('fecha_nac') }}">                      
                                {!! $errors->first('fecha_nac','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('edad') ? 'has-error' : ''}}">
                            <label for="edad" class="col-md-4 control-label">Edad</label>

                            <div class="col-md-6">
                                <input id="edad" type="text" class="form-control" name="edad" value="{{ old('edad') }}">
                                {!! $errors->first('edad','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('sexo') ? 'has-error' : ''}}">
                            <label for="sexo" class="col-md-4 control-label">Sexo</label>

                            <div class="col-md-6">
                                <input id="sexo" value="Masculino" type="radio" name="sexo" checked> Masculino 
                                <input id="sexo" value="Femenino" type="radio" name="sexo"> Femenino 
                                {!! $errors->first('sexo','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('departamento_id') ? 'has-error' : ''}}">
                            <div class="posting-read">Datos Personales Basicos <i class="icon-folder_shared"></i></div>
                            <label for="iddepartamento" class="col-md-4 control-label">Departamento</label>

                            <div class="col-md-6">
                                <select name="departamento_id" id="departamento_id" class="form-control">       
                                    <option Selected disabled>Seleccione el Departamento</option>
                                    
                                @foreach($Departamentos as $row)
                                    <option value="{{ $row->id }}">{{ $row->nombre }}</option>
                                @endforeach
                                </select>
                                {!! $errors->first('departamento_id','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                         <div class="form-group {{ $errors->has('dui') ? 'has-error' : ''}}">
                            <label for="dui" class="col-md-4 control-label">DUI</label>

                            <div class="col-md-6">
                                <input id="dui" type="text" class="form-control" name="dui" value="{{ old('dui') }}">                              
                                {!! $errors->first('dui','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('nit') ? 'has-error' : ''}}">
                            <label for="nit" class="col-md-4 control-label">NIT</label>

                            <div class="col-md-6">
                                <input id="nit" type="text" class="form-control" name="nit" value="{{ old('nit') }}">                                                       
                                {!! $errors->first('nit','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('afp') ? 'has-error' : ''}}">
                            <label for="afp" class="col-md-4 control-label">AFP</label>

                            <div class="col-md-6">
                                <input id="afp" type="text" class="form-control" name="afp" value="{{ old('afp') }}">
                                {!! $errors->first('afp','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                            <label for="email" class="col-md-4 control-label">Correo Electronico</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">                     
                                {!! $errors->first('email','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('img') ? 'has-error' : ''}}">
                            <label for="img" class="col-md-4 control-label">Img</label>

                            <div class="col-md-6">
                                <input id="img" type="file" class="fileinput fileinput-new" name="img" value="{{ old('img') }}">
                                {!! $errors->first('img','<span class="help-block">:message</span>') !!}
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
    </div>
@endsection