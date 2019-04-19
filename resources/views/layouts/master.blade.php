<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Bil Wifi" content="{{ config('app.name') }} by KinDev">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ !empty ($title) ? $title .' | '. config('app.name') : config('app.name') }}  </title>
    <!-- Fonts -->
    {{-- <link href = "https://fonts.googleapis.com/css?family= Roboto " rel = "stylesheet"> --}}
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    {{-- Styles --}}
    {{-- <link href="{{ asset('bootstrap/css/style.css') }}" rel="stylesheet"> --}}

    @yield('stylesheet')

</head>

<body >
     
    {{-- Container   --}}
    @yield('container')
    {{-- Session Flash --}}
    @yield('msg_flash')
    <footer class="footer">
        @yield('footer')
         {{-- Script Jquery --}}
        <script src="{{ asset('js/app.js') }}"></script> 
        {{-- Script Parsley --}}
        {{-- <script src="{{ asset('js/parsley/parsley.min.js') }}"></script>  --}}
        @yield('script')
    </footer>
</body>
</html>