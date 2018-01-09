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
        <!-- <link href="https://fonts.googleapis.com/css?family=Dancing+Script:700" rel="stylesheet"> -->
        
        <!-- Styles -->
        <link href="{{ asset('css/materialize.min.css') }}" rel="stylesheet" type="text/css">
        @yield('styles')
        <link href="https://fonts.googleapis.com/css?family=Asap+Condensed:500i" rel="stylesheet">
        <style>
            .logo-text{
                font-family: 'Asap Condensed', sans-serif;
            }
        </style>
    </head>
    <body @yield('body-attr')>
        @yield('content')
        
        <!-- // <script src="{{ mix('js/manifest.js') }}"></script> -->
        <!-- // <script src="{{ mix('js/vendor.js') }}"></script> -->
        <script type="text/javascript" src="{{ asset('js/jquery-3.2.1.js') }}"></script>
        <script src="{{ asset('js/materialize.min.js') }}"></script>
        @yield('scripts')
        <!-- <script src="js/materialize.min.js"></script> -->
    </body>
</html>
