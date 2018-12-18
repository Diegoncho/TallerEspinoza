@extends('layouts.app')

@section('content')

@include('layouts.navbar')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Insertar Modelo</div>

                    <div class="panel-body">
                        <form class="form-horizontal" action="{{ route('modeloAdd') }}" method="POST">
                        {{ csrf_field() }}
        
                        <div class="form-group {{ $errors->has('modelo') ? 'has-error' : ''}}">
                            <div class="posting-read">Información del modelo <i class="icon-info"></i></div>

                            <label for="modelo" class="col-md-4 control-label">Modelo</label>

                            <div class="col-md-6">
                                <input id="modelo" type="text" class="form-control" name="modelo" value="{{ old('modelo') }}">
                                {!! $errors->first('modelo','<span class="help-block">:message</span>') !!}
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

@endsection