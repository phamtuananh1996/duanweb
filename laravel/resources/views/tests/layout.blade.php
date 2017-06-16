{{-- created by tran.nham on 19.05.2017 --}}
@extends('layouts.app')
@section('extend_header')
	<link href="{{asset('pmd/components/custom-scrollbar/css/jquery.mCustomScrollbar.css')}}" type="text/css" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="{{asset('pmd/components/custom-scrollbar/css/pmd-scrollbar.css')}}" />
	<link href="{{asset('pmd/components/textfield/css/textfield.css')}}" type="text/css" rel="stylesheet"/>
	<link href="{{asset('pmd/components/checkbox/css/checkbox.css')}}" type="text/css" rel="stylesheet"/>
	<link href="{{asset('pmd/components/select2/css/select2.min.css')}}" type="text/css" rel="stylesheet"/>
	<link href="{{asset('pmd/components/select2/css/select2-bootstrap.css')}}" type="text/css" rel="stylesheet"/>
	<link href="{{asset('pmd/components/select2/css/pmd-select2.css')}}" type="text/css" rel="stylesheet"/>
	<link href="{{asset('pmd/components/radio/css/radio.css')}}" type="text/css" rel="stylesheet"/>
	<link href="{{ asset('css/test.css') }}" rel="stylesheet">
@endsection
<style type="text/css">
.pmd-floating-action { bottom: 0; position: fixed;  margin:1em;  right: 0; }
.pmd-floating-action-btn { display:block; position: relative; transition: all .2s ease-out;}
.pmd-floating-action-btn:before { bottom: 10%; content: attr(data-title); opacity: 0; position: absolute; right: 100%; transition: all .2s ease-out .5s;  white-space: nowrap; background-color:#fff; padding:6px 12px; border-radius:2px; color:#333; font-size:12px; margin-right:5px; display:inline-block; box-shadow: 0px 2px 3px -2px rgba(0, 0, 0, 0.18), 0px 2px 2px -7px rgba(0, 0, 0, 0.15);}
.pmd-floating-action-btn:last-child:before { font-size: 14px; bottom: 25%;}
.pmd-floating-action-btn:active, .pmd-floating-action-btn:focus, .pmd-floating-action-btn:hover {box-shadow: 0px 5px 11px -2px rgba(0, 0, 0, 0.18), 0px 4px 12px -7px rgba(0, 0, 0, 0.15);}
.pmd-floating-action-btn:not(:last-child){ opacity: 0; -ms-transform: translateY(20px) scale(0.3); transform: translateY(20px) scale(0.3); margin-bottom:15px; margin-left:8px; position:absolute; bottom:0;}
.pmd-floating-action-btn:not(:last-child):nth-last-child(1) { transition-delay: 50ms;}
.pmd-floating-action-btn:not(:last-child):nth-last-child(2) { transition-delay: 100ms;}
.pmd-floating-action-btn:not(:last-child):nth-last-child(3) { transition-delay: 150ms;}
.pmd-floating-action-btn:not(:last-child):nth-last-child(4) { transition-delay: 200ms;}
.pmd-floating-action-btn:not(:last-child):nth-last-child(5) { transition-delay: 250ms;}
.pmd-floating-action-btn:not(:last-child):nth-last-child(6) { transition-delay: 300ms;}
.pmd-floating-action:hover .pmd-floating-action-btn, .menu--floating--open .pmd-floating-action-btn { opacity: 1; -ms-transform: none; transform: none; position:relative; bottom:auto;}
.pmd-floating-action:hover .pmd-floating-action-btn:before, .menu--floating--open .pmd-floating-action-btn:before { opacity: 1;}
.pmd-floating-hidden{ display:none;}
.pmd-floating-action-btn.btn:hover{ overflow:visible;}

.pmd-floating-action-btn .ink{ width:50px; height:50px;}
</style>
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12 slider-header" style="height: 200px; margin-top:50px;background: gray;">
		</div>
		<div class="col-md-12" style="margin-top: 20px;">
			@yield('test_content')
		</div>
	</div>
</div>
<script type="text/javascript" src="{{asset('pmd/components/textfield/js/textfield.js')}}"></script>
<!-- Propeller checkbox js -->
<script type="text/javascript" src="http://propeller.in/components/checkbox/js/checkbox.js"></script>
<!-- Select2 js-->
<script type="text/javascript" src="http://propeller.in/components/select2/js/select2.full.js"></script>
<!-- Propeller Select2 -->
<script type="text/javascript">
    $(document).ready(function() {

        <!-- Simple Selectbox -->
        $(".select-simple").select2({
            theme: "bootstrap",
            minimumResultsForSearch: Infinity,
        });
        
    });
</script>
<!-- Propeller Select2 -->
<script type="text/javascript" src="http://propeller.in/components/select2/js/pmd-select2.js"></script>
<!-- Propeller radio js -->
<script type="text/javascript" src="http://propeller.in/components/radio/js/radio.js"></script>
@endsection