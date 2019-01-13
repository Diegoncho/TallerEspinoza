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
                            <th style="width:180px;" class="text-right">Creado</th>
                            <th style="width:30px;"></th>
                        </tr>
                    </thead>

                    <tbody>
                    @foreach($model as $row)
                        <tr>
                            <td>
                                <a href="{{ route('facturaDetail', $row->id) }}">
                                    {{ $row->client->nombres }} {{ $row->client->apellidos }}
                                </a>
                            </td>
                            <td class="text-right">$ {{ number_format($row->iva, 2) }}</td>
                            <td class="text-right">$ {{ number_format($row->subtotal, 2) }}</td>
                            <td class="text-right">$ {{ number_format($row->total, 2) }}</td>
                            <td class="text-right">{{ $row->created_at  }}</td>
                            <td class="text-right">
                                <a href="{{ route('facturaPdf', $row->id) }}"class="btn btn-success btn-block btn-xs">
                                    <i class="icon-description"></i> Descargar
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                </div>
            </div>

            {{ $model->render() }}
        </div>  
    </div>

@endsection