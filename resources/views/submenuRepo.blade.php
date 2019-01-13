@extends('layouts.app')

@section('content')

@include('layouts.navbar')

<link rel="stylesheet" href="{{ asset('css/menu.css') }}">

    <div class="menu-icons">

    <a href="{{ route('facturaAdd') }}">
        <div class="panel-module" id="panel-module-1">
            <div class="module-icon">
                <i class="icon-style"></i>
            </div>

            <div class="module-title" id="module-title-1">Reporte de Producto.</div>

            <div class="module-footer">
                Personalizado a tus necesidades.
            </div>
        </div>
    </a>

    <a href="{{ route('MfacturaAdd') }}">
        <div class="panel-module" id="panel-module-2">
            <div class="module-icon">
                <i class="icon-format_color_fill"></i>
            </div>

            <div class="module-title" id="module-title-2">Reporte de Mecanica.</div>

            <div class="module-footer">
                Personalizado a tus necesidades.
            </div>
        </div>
    </a>
</div>

@section('scripts')
<script type="text/javascript">
        $(function() {
          $('#panel-module-1').hover(function() {
            $('#module-title-1').css('color', '#019ACF');
          }, function() {
            // vuelve a dejar el <div> como estaba al hacer el "mouseout"
            $('#module-title-1').css('color', '');
          });
        });

        $(function() {
          $('#panel-module-2').hover(function() {
            $('#module-title-2').css('color', '#019ACF');
          }, function() {
            // vuelve a dejar el <div> como estaba al hacer el "mouseout"
            $('#module-title-2').css('color', '');
          });
        });
</script>
@endsection

@endsection