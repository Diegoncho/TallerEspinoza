@extends('layouts.app')

@section('content')

@include('layouts.navbar')

    <div class="row">
        <div class="col-md-12">

        <a href="{{ route('Mfactura') }}" class="btn btn-link"><i class="icon-description"></i> Listado de Comprobantes</a>

            <div class="panel panel-default" style="min-width: 830px">
                <div class="panel-heading">
                    Nuevo comprobante
                </div>

                <div class="panel-body">
                    <invoiceM></invoiceM>
                </div>
            </div>
        </div>
    </div>

@section('scripts')
<script type="riot/tag" src="{{ asset('components/invoiceM.tag') }}"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            riot.mount('invoiceM');
        });
    </script>
@endsection

@endsection