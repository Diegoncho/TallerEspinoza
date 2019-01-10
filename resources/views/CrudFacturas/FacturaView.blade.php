<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Taller</title>
    <link rel="stylesheet" href="{{ asset('css/imprimir.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/style.css') }}">
</head>
<body>

<div class="print-report">
    <a href="javascript:void(0);" onclick="javascript:print();"><i class="icon-print"></i> Imprimir</a>
</div>

<div class="container" id="container">
    <table border="1">
        <thead>
            <tr>
                <td colspan="4">
                    <h4>East Repair Inc.</h4>
                    <p>485 Amsterdam Avenue</p>
                    <p>New York, NY 1023</p>
                </td>

                </td>

                <td rowspan="2" colspan="3">
                    <h2>-Factura-</h2>

                    <img src="../img/report-logo.png">
                </td>
            </tr>

            <tr>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td colspan="4">
                    <p><b>FACTURAR A</b></p>
                </td>

                <td colspan="2">
                    <p style="text-align: right;"><b>N° DE FACTURA</b> #{{ $VistaFacturas->id }}</p>
                </td>
            </tr>

            <tr>
                <td colspan="4">
                    <p>{{ $VistaFacturas->nombres }} {{ $VistaFacturas->apellidos }}.</p>
                    <p>{{ $VistaFacturas->direccion }}, <b> Teléfono:</b> {{ $VistaFacturas->telefono }}</p>
                </td>

                <td colspan="2">
                    <p style="text-align: right;"><b>FECHA</b> {{ $VistaFacturas->fecha }}</p>
                </td>
            </tr>

        </tbody>
    
    </table>

    <table border="1" class="table-data" style="margin-top: 10px;">
        <thead class="table-info">
                <tr>
                    <td>
                        <b>CANT.</b>
                    </td>

                    <td>
                        <b>DESCRIPCIÓN.</b>
                    </td>

                    <td>
                        <b>PRECIO UNITARIO.</b>
                    </td>
                    
                    <td>
                        <b>IMPORTE.</b>
                    </td>
                </tr>
        </thead>

            <tbody>
                @if($VistaFacturas->producto_id != null)
                <tr>
                    <td style="text-align: center;"> {{ $VistaFacturas->cantidad }}</td>
                    <td> {{ $VistaFacturas->producto }} {{ $VistaFacturas->marca }}</td>
                    <td style="text-align: center;"> ${{ $VistaFacturas->precio_costo }}</td>
                    <td style="text-align: center;"> ${{ $VistaFacturas->precio_costo }}</td>
                </tr>
                @endif

                @if($VistaFacturas->mecanica_id != null)
                <tr>
                    <td></td>
                    <td> {{ $VistaFacturas->diagnostico }}</td>
                    <td style="text-align: center;" id="resultadoMeca"></td>
                    <td style="text-align: center;" id="resultadoMeca2"></td>
                </tr>
                @endif
                <tr>
                    <td style="text-align: right; border-left: none; border-bottom: none; border-bottom: none; font-size: 17px;" colspan="3"><b>Subtotal</b> </td>
                    <td style="text-align: center;">
                        $<strong id="resultadoSub"></strong>
                    </td>
                </tr>

                <tr>
                    <td style="text-align: right; border-left: none; border-bottom: none; border-top: none; font-size: 20px;" colspan="3"><b>TOTAL</b> </td>
                    <td style="text-align: center; background: #F7F7F7;">
                        $<strong id="resultadoTo"></strong>
                    </td>
                </tr>
            </tbody>
    
    </table>
</div>

</body>
</html>

@if($VistaFacturas->producto_id != null && $VistaFacturas->mecanica_id != null)
<script language="javascript">

  function CalcularTotal(a,b,c,d){
    var result = (a + b) + (c * d);

    document.getElementById('resultadoTo').innerHTML = result.toFixed(2);
  };

  CalcularTotal({{ $VistaFacturas->total_repuesto }},{{ $VistaFacturas->total_mano_obra }},{{ $VistaFacturas->precio_costo }},{{ $VistaFacturas->cantidad }});
  
  function CalcularSubtotal(a,b,c,d){
    var result = (a + b) + (c * d);

    document.getElementById('resultadoSub').innerHTML = result.toFixed(2);
  };

  CalcularSubtotal({{ $VistaFacturas->total_repuesto }},{{ $VistaFacturas->total_mano_obra }},{{ $VistaFacturas->precio_costo }},{{ $VistaFacturas->cantidad }});

  function CalcularMecanica(a,b){
    var result = a + b;

    document.getElementById('resultadoMeca').innerHTML = '$'+result.toFixed(2);
    document.getElementById('resultadoMeca2').innerHTML = '$'+result.toFixed(2);
    };

  CalcularMecanica({{ $VistaFacturas->total_repuesto }},{{ $VistaFacturas->total_mano_obra }});

</script>

@elseif($VistaFacturas->producto_id != null)

<script language="javascript">

  function CalcularTotal(a,b){
    var result = a * b;

    document.getElementById('resultadoTo').innerHTML = result.toFixed(2);
  };

  CalcularTotal({{ $VistaFacturas->precio_costo }},{{ $VistaFacturas->cantidad }});
  
  function CalcularSubtotal(a,b){
    var result = a * b;

    document.getElementById('resultadoSub').innerHTML = result.toFixed(2);
  };

  CalcularSubtotal({{ $VistaFacturas->precio_costo }},{{ $VistaFacturas->cantidad }});

</script>


@elseif($VistaFacturas->mecanica_id != null)

<script language="javascript">

  function CalcularTotal(a,b){
    var result = a + b;

    document.getElementById('resultadoTo').innerHTML = result.toFixed(2);
  };

  CalcularTotal({{ $VistaFacturas->total_repuesto }},{{ $VistaFacturas->total_mano_obra }});
  
  function CalcularSubtotal(a,b){
    var result = a + b;

    document.getElementById('resultadoSub').innerHTML = result.toFixed(2);
  };

  CalcularSubtotal({{ $VistaFacturas->total_repuesto }},{{ $VistaFacturas->total_mano_obra }});

  function CalcularMecanica(a,b){
    var result = a + b;

    document.getElementById('resultadoMeca').innerHTML = '$'+result.toFixed(2);
    document.getElementById('resultadoMeca2').innerHTML = '$'+result.toFixed(2);
    };

  CalcularMecanica({{ $VistaFacturas->total_repuesto }},{{ $VistaFacturas->total_mano_obra }});

</script>


@else

<script language="javascript">
  function CalcularTotal(a,b){
    var result = a * b;

    document.getElementById('resultadoTo').innerHTML = result.toFixed(2);
  };

  CalcularTotal({{ $VistaFacturas->precio_costo }},{{ $VistaFacturas->cantidad }});
  
  function CalcularSubtotal(a,b){
    var result = a * b;

    document.getElementById('resultadoSub').innerHTML = result.toFixed(2);
  };

  CalcularSubtotal({{ $VistaFacturas->precio_costo }},{{ $VistaFacturas->cantidad }});

</script>

@endif