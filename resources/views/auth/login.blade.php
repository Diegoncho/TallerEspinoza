@extends('layouts.app')

@section('content')
<hr>
@if (session()->has('flash'))
    <div class="alert alert-info">{{ session('flash') }}</div>
@endif
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="panel-title">Acceso a la aplicación</h1>
                </div>

                <div class="panel-body">
                    <form action="{{ route('login') }}" method="POST">
                        
                        {{ csrf_field() }}    

                        <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                            <label for="name"><i class="icon-person_outline"></i> UserName</label>
                            <input class="form-control" type="text" name="name" placeholder="Ingrese Username" value="{{ old('name') }}">

                        {!! $errors->first('name','<span class="help-block">:message</span>') !!}
                        </div>

                         <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
                            <label for="password"><i class="icon-lock_outline"></i> Password</label>
                            <input class="form-control" type="password" name="password" placeholder="Ingrese Password">

                        {!! $errors->first('password','<span class="help-block">:message</span>') !!}
                        </div>

                        <button class="btn btn-primary btn-block">Acceder</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection