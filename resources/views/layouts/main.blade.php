<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ env('APP_DISPLAY_NAME') }} @yield('title')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Dancing+Script:700" rel="stylesheet">
        
        <!-- Styles -->
        <link href="{{ mix('css/materialize.css') }}" rel="stylesheet" type="text/css">
        @yield('styles')
    </head>
    <body>
        @yield('content')
        
        <script src="{{ mix('js/manifest.js') }}"></script>
        <script src="{{ mix('js/vendor.js') }}"></script>
        @yield('scripts')
        <script src="{{ mix('js/materialize.min.js') }}"></script>
        <!-- <script src="js/materialize.min.js"></script> -->
    </body>
</html>
