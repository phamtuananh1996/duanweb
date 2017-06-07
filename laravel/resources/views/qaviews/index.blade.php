{{-- created by tran.nham on 26.05.2017 --}}
@extends('qaviews.layout')

@section('qa_content')	
	<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
	<script src="{{ asset('plugins/jquery.validate.js') }}"></script>
	<div class="col-md-8 col-md-offset-1" style="background: #fff; margin-top:70px; margin-bottom: 30px;">	<!--main content-->
		@include('qaviews.content_header')
		@foreach ($questions as $question)
			@include('qaviews.card')
		@endforeach
	</div><!--end main content-->
	@include('qaviews.sidebar')

<script type="text/javascript">
	$(document).ready(function() {

		<!-- Selectbox with search -->
		$(".select-with-search").select2({
			theme: "bootstrap"
		});

		 jQuery.validator.addMethod("check_type", function(value, element) {
        	return value!='Chọn Thể Loại';
   			});
		});
</script>
@endsection