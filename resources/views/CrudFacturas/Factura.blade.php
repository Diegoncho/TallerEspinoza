@extends('layouts.app')

@section('content')

@include('layouts.navbar')

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default" style="min-width: 800px">
                <div class="panel-heading" style="background:#f9f9f9">
                    <h2 class="page-header">
                        Comprobantes
                    </h2>

                    <a href="{{ route('facturaAdd') }}" class="btn btn-default btn-lg btn-block">Nuevo Comprobante</a>
                </div>

                <div class="panel-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Cliente</th>
                            <th style="width:100px;" class="text-right">IVA</th>
                            <th style="width:160px;" class="text-right">Sub Total</th>
                            <th style="width:160px;" class="text-right">Total</th>
                            <th style="width:100px;" class="text-right">Creado</th>
                        </tr>
                    </thead>

                    <tbody>
                        @for ($i = 1; $i < 10; $i++)
                        @php
                            $total    = 1180 * $i;
                            $subtotal = $total / 1.18;
                            $iva      = $total - $subtotal;
                        @endphp
                        <tr>
                            <td>Clientes {{$i}}</td>
                            <td class="text-right">{{ number_format($iva, 2) }}</td>
                            <td class="text-right">{{ number_format($subtotal, 2) }}</td>
                            <td class="text-right">{{ number_format($total, 2) }}</td>
                            <td class="text-right">02/02/2016</td>
                        </tr>
                        @endfor
                    </tbody>
                </table>
                </div>
            </div>
        </div>  
    </div>

@endsection