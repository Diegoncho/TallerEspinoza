@extends('layouts.app')

@section('content')

@include('layouts.navbar')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Editar Modelo: {{ $Modelos->modelo }}</div>

                    <div class="panel-body">
                        <form class="form-horizontal" action="{{ route('modeloEdit', $Modelos->id) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="form-group {{ $errors->has('modelo') ? 'has-error' : ''}}">
                            <label for="modelo" class="col-md-1">Modelo</label>

                            <div class="col-md-12">
                                <input id="modelo" type="text" class="form-control" name="modelo" value="{{ $Modelos->modelo }}">
                                {!! $errors->first('modelo','<span class="help-block">:message</span>') !!}
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

            <form action="{{ route('modelo') }}/{{ $Modelos->id }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}

            <button class="btn btn-danger">
                <i class="icon-delete_sweep"></i> Eliminar
            </button>
            </form>

        </div>
    </div>

@endsection