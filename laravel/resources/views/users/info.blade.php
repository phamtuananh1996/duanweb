{{-- created by tran.nham on 19.05.2017 --}}

@extends('layouts.app')

@section('extend_header')
	
@endsection

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 offset-md-1" style="margin-top: 50px; height: 800px;"> 
			<div class="row">
				@include('users.infoSidebar')
				<div class="col-md-8" style=" height: 700px; margin-top:-5px;"> {{-- main content --}}
					@include('users.info_header')
	                @yield('info_content')
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Propeller ripple effect js -->
<script type="text/javascript" src="http://propeller.in/components/button/js/ripple-effect.js"></script>
<script type="text/javascript" src="{{asset('pmd/components/tetxfield/js/textfield.js')}}"></script>
@endsection