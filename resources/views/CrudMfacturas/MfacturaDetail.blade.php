@extends('layouts.app')

@section('content')

@include('layouts.navbar')

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default" style="min-width: 830px">
                <div class="panel-heading">
                    Comprobante #{{ str_pad ($model->id, 7, '0', STR_PAD_LEFT)}}
                </div>

                <div class="panel-body">
                    <div class="well well-sm">
                        <div class="row">
                            <div class="col-xs-6">
                                <input class="form-control" type="hidden" value="{{ $model->client->id }}"/>
                                <input class="form-control typeahead" type="text"  readonly value="{{ $model->client->nombres }} {{ $model->client->apellidos }}" />
                            </div>
                            <div class="col-xs-2">
                                <input class="form-control" type="text" readonly value="{{ $model->client->telefono }}" />
                            </div>
                            <div class="col-xs-4">
                                <input class="form-control" type="text" readonly value="{{ $model->client->direccion }}" />
                            </div>
                        </div>
                    </div>

                    <hr />

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Mecanica</th>
                            <th style="width:100px;"></th>
                            <th style="width:100px;">P.U</th>
                            <th style="width:100px;">Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($model->detail as $row)
                        <tr>
                            <td>{{ $row->mecanica->diagnostico }}</td>
                            <td class="text-right"></td>
                            <td class="text-right">$ {{number_format($row->precio_unitario, 2)}}</td>
                            <td class="text-right">$ {{number_format($row->total, 2)}}</td>
                        </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="3" class="text-right"><b>IVA</b></td>
                            <td class="text-right">$ {{ number_format($model->iva, 2) }}</td>
                        </tr>
                        <tr>
                            <td colspan="3" class="text-right"><b>Sub Total</b></td>
                            <td class="text-right">$ {{ number_format($model->subtotal, 2) }}</td>
                        </tr>
                        <tr>
                            <td colspan="3" class="text-right"><b>Total</b></td>
                            <td class="text-right">$ {{ number_format($model->total, 2) }}</td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div> 

@endsection