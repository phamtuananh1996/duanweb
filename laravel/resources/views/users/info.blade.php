{{-- created by tran.nham on 19.05.2017 --}}

@extends('layouts.app')

@section('extend_header')
	<link href="{{asset('pmd/components/textfield/css/textfield.css')}}" type="text/css" rel="stylesheet"/>
	<link href="{{asset('pmd/components/checkbox/css/checkbox.css')}}" type="text/css" rel="stylesheet"/>
	<link href="{{asset('pmd/components/select2/css/select2.min.css')}}" type="text/css" rel="stylesheet"/>
	<link href="{{asset('pmd/components/select2/css/select2-bootstrap.css')}}" type="text/css" rel="stylesheet"/>
	<link href="{{asset('pmd/components/select2/css/pmd-select2.css')}}" type="text/css" rel="stylesheet"/>
	<link href="{{asset('pmd/components/radio/css/radio.css')}}" type="text/css" rel="stylesheet"/>
	<script src="//cdn.ckeditor.com/4.6.2/basic/ckeditor.js"></script>
@endsection

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1" style="margin-top: 50px; height: 800px;"> 
			<div class="row">
				@include('users.infoSidebar')
				<div class="col-md-9" style=" height: 700px; margin-top:-5px;"> {{-- main content --}}
					@include('users.info_header')
	                @yield('info_content')
				</div>
			</div>
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