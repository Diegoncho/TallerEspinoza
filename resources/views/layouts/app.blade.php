<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="<?php echo csrf_token() ?>"/>
    <title>Taller</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/style.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/EasyAutocomplete/dist/easy-autocomplete.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-select.min.css') }}">
</head>
<body>
    <div class="container">

        @yield('content')
        
        @include('layouts.footer')
    </div>
</body>

<!-- jquery Principal-->
<script src="//code.jquery.com/jquery-2.1.4.min.js"></script>

<!-- jquery para Sweetalert -->
<script src="{{ asset('sweetalert/sweetalert.min.js') }}"></script>

<!-- jquery para Datepicker -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<!-- jquery para LightBox -->
<script src="{{ asset('ligthbox/lightbox.js') }}"></script>
<link rel="stylesheet" href="{{ asset('ligthbox/lightbox.css') }}">

<!-- jquery para Html2canvas y Jspdf -->
<script src="https://unpkg.com/jspdf@latest/dist/jspdf.min.js"></script>
<script src="{{ asset('js/html2canvas.js') }}"></script>

<!-- jquery para Masked-Input -->
<script src="{{ asset('js/jquery.maskedinput.min.js') }}"></script>

<!-- jquery para Select-Complete -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.js') }}"></script>
<script src="{{ asset('js/bootstrap-select.js') }}"></script>

<!-- Script para Inicialización -->
<script src="{{asset('ini.js')}}"></script>

<!-- Script para Riot -->
<script src="{{ asset('bower_components/riot/riot.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/riot@3.7/riot+compiler.min.js"></script>

<!-- Script para EasyAutocomplete -->
<script src="{{ asset('bower_components/EasyAutocomplete/dist/jquery.easy-autocomplete.min.js') }}"></script>


@yield('scripts')
@yield('navbar-script')

<script type="text/javascript">
    function baseUrl(url){
        return '{{ url('') }}/' + url;
    }
</script>
</html>

