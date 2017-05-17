<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href='http://fonts.googleapis.com/css?family=Lato:300,400,300italic,400italic' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'> 
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
     	<nav class="navbar navbar-default" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">
                        <font face="Roboto Condensed" size="4" color="green"> Hoc2H </font>
                    </a>
                </div> 
                <div class="collapse navbar-collapse" id="navbar-container">
                    <ul class="nav navbar-nav navbar-right">
                    	@if(Route::has('login'))
                    		@if(Auth::check())
                    			<li role="presentation"><a href="{{ url('/home') }}">Home</a></li>
                    		@else
                    			<li role="presentation"><a href="{{ url('/login') }}">Đăng Nhập</a></li>
                        		<li role="presentation"><a href="{{ url('/register') }}">Đăng Ký</a></li>
                        	@endif
                    	@endif
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container main-container">
            <div class="row">
                <div class=" main-content col-md-12 col-sm-12 col-xs-12 ">
                    
                </div>   
            </div><!--//row-->
        </div><!--//masonry-->
        @include('layouts.footer')
    </body>
</html>
