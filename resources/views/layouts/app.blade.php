<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Taller</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/style.css') }}">
</head>
<body>
    <div class="container">

        @yield('content')
        
        @include('layouts.footer')
    </div>
</body>

<!-- jquery Principal-->
<script src="//code.jquery.com/jquery-2.1.4.min.js"></script>

<!-- Script para Riot -->
<script type="riot/tag" src="{{ asset('bower_components/riot/riot.min.js') }}"></script>
<script type="riot/tag" src="{{ asset('bower_components/riot/riot+compiler.min.js') }}"></script>

<!-- jquery para Sweetalert -->
<script src="{{ asset('sweetalert/sweetalert.min.js') }}"></script>

<!-- jquery para Datepicker -->
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<!-- jquery para LightBox -->
<script src="{{ asset('ligthbox/lightbox.js') }}"></script>
<link rel="stylesheet" href="{{ asset('ligthbox/lightbox.css') }}">

<!-- jquery para Html2canvas y Jspdf -->
<script src="https://unpkg.com/jspdf@latest/dist/jspdf.min.js"></script>
<script src="{{ asset('js/html2canvas.js') }}"></script>

@yield('scripts')
</html>