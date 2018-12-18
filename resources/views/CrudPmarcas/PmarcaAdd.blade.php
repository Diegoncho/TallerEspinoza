@extends('layouts.app')

@section('content')

@include('layouts.navbar')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Insertar Marca</div>

                    <div class="panel-body">
                        <form class="form-horizontal" action="{{ route('pmarcaAdd') }}" method="POST">
                        {{ csrf_field() }}
        
                        <div class="form-group {{ $errors->has('marca') ? 'has-error' : ''}}">
                            <div class="posting-read">Información de la Marca <i class="icon-info"></i></div>

                            <label for="marca" class="col-md-4 control-label">Marca</label>

                            <div class="col-md-6">
                                <input id="marca" type="text" class="form-control" name="marca" value="{{ old('marca') }}">
                                {!! $errors->first('marca','<span class="help-block">:message</span>') !!}
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