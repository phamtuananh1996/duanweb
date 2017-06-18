<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap --> 
        <link href="{{asset('bootstrap.3.3.7/css/bootstrap.css')}}" type="text/css" rel="stylesheet" /> 
        <link href="{{asset('bootstrap.3.3.7/css/animate.min.css')}}" rel="stylesheet">
        <link href="{{asset('bootstrap.3.3.7/css/bootstrap-dropdownhover.min.css')}}" rel="stylesheet">

        <!-- Propeller card (CSS for helping component example file) -->
        <link href="{{asset('pmd/dist/css/propeller.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('pmd/components/card/css/card.css')}}" type="text/css" rel="stylesheet" />
        <link href="{{asset('pmd/components/typography/css/typography.css')}}" type="text/css" rel="stylesheet"/>
        <link href="{{asset('pmd/components/dropdown/css/dropdown.css')}}" type="text/css" rel="stylesheet"/>
        <link href="{{asset('pmd/components/navbar/css/navbar.css')}}" type="text/css" rel="stylesheet"/>
        <link href="{{asset('pmd/components/button/css/sidebar.css')}}" type="text/css" rel="stylesheet"/>
        <link href="{{asset('pmd/components/button/css/button.css')}}" type="text/css" rel="stylesheet"/>
        <link href="{{asset('pmd/components/custom-scrollbar/css/jquery.mCustomScrollbar.css')}}" type="text/css" rel="stylesheet" />
        <link href="{{asset('pmd/components/custom-scrollbar/css/pmd-scrollbar.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('pmd/components/textfield/css/textfield.css')}}" type="text/css" rel="stylesheet"/>
        <link href="{{asset('pmd/components/checkbox/css/checkbox.css')}}" type="text/css" rel="stylesheet"/>
        <link href="{{asset('pmd/components/select2/css/select2.min.css')}}" type="text/css" rel="stylesheet"/>
        <link href="{{asset('pmd/components/select2/css/select2-bootstrap.css')}}" type="text/css" rel="stylesheet"/>
        <link href="{{asset('pmd/components/select2/css/pmd-select2.css')}}" type="text/css" rel="stylesheet"/>
        <link href="{{asset('pmd/components/radio/css/radio.css')}}" type="text/css" rel="stylesheet"/>
        
        <!-- Google Icon Font -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="http://propeller.in/components/icons/css/google-icons.css" type="text/css" rel="stylesheet" />
        
        <!--App CSS -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/test.css') }}" rel="stylesheet">
        
        <!-- Jquery js -->
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
       
        <title>Hoc2H</title>
    </head>
    <body>
        @include('layouts.header')
        <div style="margin-top: 80px;">
             @yield('content')
        </div>
       
        {{-- @include('layouts.footer') --}}
        <!-- Bootstrap js -->
        <script type="text/javascript" src="{{asset('bootstrap.3.3.7/js/bootstrap.min.js')}}"></script>
       
        <!-- Propeller Sidebar js -->
        <script type="text/javascript" src="{{asset('pmd/components/sidebar/js/sidebar.js')}}"></script>
        <!-- Propeller Dropdown js -->
        <script type="text/javascript" src="{{asset('pmd/components/dropdown/js/dropdown.js')}}"></script>
        <!-- Propeller ripple effect js -->
        <script type="text/javascript" src="{{asset('pmd/components/button/js/ripple-effect.js')}}"></script>
        <script type="text/javascript" src="{{asset('pmd/components/textfield/js/textfield.js')}}"></script>
        <!-- Propeller checkbox js -->
        <script type="text/javascript" src="{{asset('pmd/components/checkbox/js/checkbox.js')}}"></script>
        <!-- Select2 js-->
        <script type="text/javascript" src="{{asset('pmd/components/select2/js/select2.full.js')}}"></script>
        <!-- Propeller Select2 -->
        <script type="text/javascript" src="{{asset('pmd/components/select2/js/pmd-select2.js')}}"></script>
        <!-- Propeller radio js -->
        <script type="text/javascript" src="{{asset('pmd/components/radio/js/radio.js')}}"></script>
    </body>
</html>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
</script>
