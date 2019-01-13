@extends('layouts.app')

@section('content')

@include('layouts.navbar')

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default" style="min-width: 800px">
                <div class="panel-heading" style="background:#f9f9f9"><b>Listado de comprobantes</b></div>
                <div class="panel-body">
                    <form  action="{{ route('factura') }}" class="navbar-form navbar-left pull-right" method="GET" role="search">
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="Buscar # comprobante">
                        </div>
                        <button type="submit" class="btn btn-default">Buscar</button>
                    </form>

                    <a href="{{ route('facturaAdd') }}" class="btn btn-primary">Registrar nuevo comprobante</a>

                    <p>Hay {{ $model->total() }} comprobantes</p>
                    <hr>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
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
                            <td>{{ str_pad ($row->id, 7, '0', STR_PAD_LEFT)}}</td>
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