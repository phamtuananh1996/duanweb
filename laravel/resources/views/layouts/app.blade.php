<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href='http://fonts.googleapis.com/css?family=Lato:300,400,300italic,400italic' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'> 
        <!-- Global CSS -->
        <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}">   
        <!-- Plugins CSS -->
        <link rel="stylesheet" href="{{ asset('plugins/font-awesome/css/font-awesome.css') }}">
        <!--them css-->
        <!-- Theme CSS -->  
        <link id="theme-style" rel="stylesheet" href="{{asset('css/styles.css')}}">
        <!-- github acitivity css -->
        <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/octicons/2.0.2/octicons.min.css">
        <link rel="stylesheet" href="http://caseyscarborough.github.io/github-activity/github-activity-0.1.0.min.css">
        <title>Hoc2H</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <header class="header">
            <div class="container">                       
                @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif
            </div><!--//container-->
        </header><!--//header-->
        <header class="header menubar">
        </header>
        <div class="container sections-wrapper">
        <div class="row">
            <div class="primary col-md-8 col-sm-12 col-xs-12 content">
                @yield('content')
            </div>    
            <div class="secondary col-md-4 col-sm-12 col-xs-12 sidebar">
                @yield('sidebar')
            </div><!--//secondary-->
        </div><!--//row-->
    </div><!--//masonry-->
        @include('layouts.footer')
    </body>
</html>
