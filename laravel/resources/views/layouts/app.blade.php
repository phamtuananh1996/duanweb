<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Material Design Icons -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <!-- Bootstrap Material Design -->
        <link rel="stylesheet" type="text/css" href="{{asset('mdb/css/bootstrap.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('mdb/css/mdb.css')}}">
        <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap-material-design.css') }}">    
        <link rel="stylesheet" type="text/css" href="{{asset('pmd-1.1.0/dist/css/propeller.css')}}">
        <!--App CSS -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{asset('css/validate/screen.css')}}">
        <script type="text/javascript" src="{{asset('mdb/js/jquery-3.1.1.min.js')}}"></script>
         <script type="text/javascript" src="{{asset('mdb/js/bootstrap.min.js')}}"></script>
        @yield('extend_header')
        <title>Hoc2H</title>
    </head>
    <body>
        @include('layouts.header')
        @yield('content')
        {{-- @include('layouts.footer') --}}
        <!--Script-->
       
        <script type="text/javascript" src="{{asset('/mdb/js/mdb.js')}}"></script>
        <script type="text/javascript" src="{{asset('/mdb/js/tether.js')}}"></script>
        <script type="text/javascript" src="{{asset('pmd-1.1.0/dist/js/propeller.js')}}"></script>
        
    </body>
</html>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
