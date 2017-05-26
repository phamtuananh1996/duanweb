{{-- created by tran.nham on 26.05.2017 --}}
@extends('layouts.app')
@section('extend_header')
	 <link href="{{ asset('css/qa.css') }}" rel="stylesheet">
	 <link href="{{asset('pmd/components/textfield/css/textfield.css')}}" type="text/css" rel="stylesheet"/>
	<link href="{{asset('pmd/components/checkbox/css/checkbox.css')}}" type="text/css" rel="stylesheet"/>
	<link href="{{asset('pmd/components/select2/css/select2.min.css')}}" type="text/css" rel="stylesheet"/>
	<link href="{{asset('pmd/components/select2/css/select2-bootstrap.css')}}" type="text/css" rel="stylesheet"/>
	<link href="{{asset('pmd/components/select2/css/pmd-select2.css')}}" type="text/css" rel="stylesheet"/>
	<link href="{{asset('pmd/components/radio/css/radio.css')}}" type="text/css" rel="stylesheet"/>
@endsection

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1 slider-header">
			</div>
			@yield('qa_content')
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