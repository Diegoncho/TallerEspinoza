@extends('layouts.app')

@section('content')

@include('layouts.navbar')
<div class="row">
        <div class="col-md-12">
        
        <a href="{{ route('compra') }}" class="btn btn-link"><i class="icon-description"></i> Listado de Compras</a>

            <div class="panel panel-default" style="min-width: 830px">
                <div class="panel-heading">
                    Nueva compra
                </div>

                <div class="panel-body">
                    <invoiceC></invoiceC>
                </div>
            </div>
        </div>
    </div>

@section('scripts')
<script type="riot/tag" src="{{ asset('components/invoiceC.tag') }}"></script>

    <script type="text/javascript">
        $(document).ready(function(){ 
            riot.mount('invoiceC');
        });
    </script>
@endsection

@endsection