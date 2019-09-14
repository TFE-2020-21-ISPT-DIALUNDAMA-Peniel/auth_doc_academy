<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Bil Wifi" content="{{ config('app.name') }} by KinDev">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href={{ asset('favicon.ico') }}>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ !empty ($title) ? $title .' | '. config('app.name') : config('app.name') }}  </title>

        <!-- Custom CSS -->
    <link href="{{ asset('backend/dist/css/style.min.css') }}" rel="stylesheet">
     <link href="{{ asset('dataTables/dataTables/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dataTables/buttons/css/buttons.dataTables.min.css') }}" rel="stylesheet">

  </head>

  <body class="bg-light">
    <div class="card">
        <div class="card-header bg-primary">
        @auth
        <a href="{{ route('home') }}" class="text-white">retour</a>
        @else
        <a href="/" class="text-white">retour</a>
        @endauth
        
            <p class=" h3 card-title text-center text-monospace text-white">DOCUMENT AUTHENTIQUE</p>
        </div>
    </div>
    <div id="bulletin" style="margin-top: -20px"></div>

    <script src={{ asset('backend/assets/libs/jquery/dist/jquery.min.js') }}></script>
    <!-- <script src="dist/js/jquery.ui.touch-punch-improved.js"></script>
    <script src="dist/js/jquery-ui.min.js"></script> -->
    <!-- Bootstrap tether Core JavaScript -->
    <script src={{ asset('backend/assets/libs/popper.js/dist/umd/popper.min.js') }}></script>
    <script src={{ asset('backend/assets/libs/bootstrap/dist/js/bootstrap.min.js') }}></script>
    <script src={{ asset('js/pdfObject.js') }}></script>
    <script>
      var options = {
        height: "600px",
        // pdfOpenParams: { view: 'FitV', page: '2' }
    };
      PDFObject.embed("{{ url(Storage::url($document->file)) }}", "#bulletin",options);
    </script>

  </body>

<!-- Mirrored from getbootstrap.com/docs/4.1/examples/floating-labels/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 07 Nov 2018 23:42:06 GMT -->
</html>
