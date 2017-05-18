<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
         <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href='http://fonts.googleapis.com/css?family=Lato:300,400,300italic,400italic' rel='stylesheet' type='text/css'>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> 
        <script src="{{ asset('plugins/bootstrap/js/bootstrap.js') }}"></script>
        <!-- Global CSS -->
        <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}"> 
        <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap-material-design.css') }}">    
        <!-- Plugins CSS -->
        <link rel="stylesheet" href="{{ asset('plugins/font-awesome/css/font-awesome.css') }}">
        <!-- Theme CSS -->  
        <link rel="stylesheet" href="{{asset('css/validate/screen.css')}}">
        <link id="theme-style" rel="stylesheet" href="{{asset('css/styles.css')}}">
        <!--App CSS -->

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <title>Hoc2H</title>
        
    </head>
    <body>
        @include('layouts.header')
        @yield('content')
        {{-- @include('layouts.footer')   --}}
    </body>
</html>

<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
