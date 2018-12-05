@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Insertar Empleado</div>

                    <div class="panel-body">
                        <form class="form-horizontal" action="" method="POST">
                        {{ csrf_field() }}
        
                        <div class="form-group">
                            <label for="nombres" class="col-md-4 control-label">Nombres</label>

                            <div class="col-md-6">
                                <input id="nombres" type="text" class="form-control" name="nombres">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="apellidos" class="col-md-4 control-label">Apellidos</label>

                            <div class="col-md-6">
                                <input id="apellidos" type="text" class="form-control" name="apellidos">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="direccion" class="col-md-4 control-label">Dirección</label>

                            <div class="col-md-6">
                                <textarea name="direccion" id="direccion" class="form-control ajuste" rows="5"></textarea>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="telefono" class="col-md-4 control-label">Teléfono</label>

                            <div class="col-md-6">
                                <input id="telefono" type="text" class="form-control" name="telefono">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="estado_civil" class="col-md-4 control-label">Estado Civil</label>

                            <div class="col-md-6">
                                <input id="estado_civil" type="text" class="form-control" name="estado_civil">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="fecha_nac" class="col-md-4 control-label">Fecha Nacimiento</label>

                            <div class="col-md-6">
                                <input id="fecha_nac" type="date" class="form-control" name="fecha_nac">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="edad" class="col-md-4 control-label">Edad</label>

                            <div class="col-md-6">
                                <input id="edad" type="text" class="form-control" name="edad">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="sexo" class="col-md-4 control-label">Sexo</label>

                            <div class="col-md-6">
                                <input id="sexo" value="Masculino" type="radio" name="sexo" checked> Masculino 
                                <input id="sexo" value="Femenino" type="radio" name="sexo"> Femenino 
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="iddepartamento" class="col-md-4 control-label">Departamento</label>

                            <div class="col-md-6">
                                <select name="iddepartamento" id="iddepartamento" class="form-control">       
                                    <option Selected disabled>Seleccione el Departamento</option>
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>

                         <div class="form-group">
                            <label for="dui" class="col-md-4 control-label">DUI</label>

                            <div class="col-md-6">
                                <input id="dui" type="text" class="form-control" name="dui">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="nit" class="col-md-4 control-label">NIT</label>

                            <div class="col-md-6">
                                <input id="nit" type="text" class="form-control" name="nit">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="afp" class="col-md-4 control-label">AFP</label>

                            <div class="col-md-6">
                                <input id="afp" type="text" class="form-control" name="afp">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">Correo Electronico</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email">
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