<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href='http://fonts.googleapis.com/css?family=Lato:300,400,300italic,400italic' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'> 
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="{{ asset('plugins/bootstrap/js/bootstrap.js') }}"></script>
        <!-- Global CSS -->
        <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}">   
        <!-- Plugins CSS -->
        <link rel="stylesheet" href="{{ asset('plugins/font-awesome/css/font-awesome.css') }}">
        <!-- Theme CSS -->  
        <link id="theme-style" rel="stylesheet" href="{{asset('css/styles.css')}}">
        <!--App CSS -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <!-- github acitivity css -->
        <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/octicons/2.0.2/octicons.min.css">
        <link rel="stylesheet" href="http://caseyscarborough.github.io/github-activity/github-activity-0.1.0.min.css">
        <title>Hoc2H</title>
        
    </head>
    <body>
        @include('layouts.header')
        @yield('content')
        @include('layouts.footer')
    </body>
</html>
