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
</html>