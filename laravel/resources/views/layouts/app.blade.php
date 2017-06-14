<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap --> 
        <link href="{{asset('bootstrap.3.3.7/css/bootstrap.css')}}" type="text/css" rel="stylesheet" /> 
        <link rel="stylesheet" type="text/css" href="{{asset('pmd/dist/css/propeller.css')}}">
        <!-- Propeller card (CSS for helping component example file) -->
        <link href="http://propeller.in/components/card/css/card.css" type="text/css" rel="stylesheet" />
        <!-- Propeller typography -->
       <link href="{{asset('pmd/components/typography/css/typography.css')}}" type="text/css" rel="stylesheet"/>
        
        <!-- Propeller dropdown -->
        <link href="{{asset('pmd/components/dropdown/css/dropdown.css')}}" type="text/css" rel="stylesheet"/>
        <!-- Propeller navbar -->
        <link href="{{asset('pmd/components/navbar/css/navbar.css')}}" type="text/css" rel="stylesheet"/>
        <!-- Propeller button  -->
        <link href="{{asset('pmd/components/button/css/button.css')}}" type="text/css" rel="stylesheet"/>
         <!-- Google Icon Font -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="http://propeller.in/components/icons/css/google-icons.css" type="text/css" rel="stylesheet" />
        
        {{-- <link rel="stylesheet" type="text/css" href="{{asset('css/validate/screen.css')}}"> --}}
        <!--App CSS -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
         <!-- Jquery js -->
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        

        <!-- jquery JS -->
    
        @yield('extend_header')
        <title>Hoc2H</title>
    </head>
    <body>
        @include('layouts.header')
        @yield('content')
        {{-- @include('layouts.footer') --}}
        <!-- Bootstrap js -->
        <script type="text/javascript" src="{{asset('bootstrap.3.3.7/js/bootstrap.min.js')}}"></script>

        <!-- Propeller Sidebar js -->
        <script type="text/javascript" language="javascript" src="http://propeller.in/components/sidebar/js/sidebar.js"></script>
        <!-- Propeller Dropdown js -->
        <script type="text/javascript" language="javascript" src="http://propeller.in/components/dropdown/js/dropdown.js"></script>
        <!-- Propeller ripple effect js -->
        <script type="text/javascript" language="javascript" src="http://propeller.in/components/button/js/ripple-effect.js"></script>
    </body>
</html>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
