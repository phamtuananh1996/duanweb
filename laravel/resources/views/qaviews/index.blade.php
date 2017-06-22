{{-- created by tran.nham on 26.05.2017 --}}
@extends('qaviews.layout')

@section('qa_content')	
	 <link rel="stylesheet" href="{{ asset('css/animate.min.css') }} ">
	<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
	<script src="{{ asset('plugins/jquery.validate.js') }}"></script>
	<div class="col-md-9">	<!--main content-->
		@include('qaviews.content_header')
		<div >
			<div class="panel panel-default widget">
				<div class="panel-heading">
					<span class="glyphicon glyphicon-th-list"></span>
					<h3 class="panel-title">Tất Cả Câu Hỏi</h3>
					<span class="label label-info">{{$questions->count()}}</span>
				</div>
				<div class="panel-body">
					<ul class="list-group" id="list_qa">
						@foreach ($questions as $question)
							@include('qaviews.card')
						@endforeach
					</ul>
				</div>
			</div>
		</div>
	</div><!--end main content-->
	@include('qaviews.sidebar')

<script type="text/javascript">

	 var page=1;
       $(window).scroll(function() {
       
        if($(window).scrollTop() + $(window).height() == $(document).height()){
              page=page + 1;
              
              $.get('{{url('qa/ajax/getdata')}}?page='+page, function(data) {
                $('#list_qa').append(data);
            });

              
           }
      });



	$(document).ready(function() {
	
		jQuery.validator.addMethod("check_type", function(value, element) {
        	return value!='Chọn Thể Loại';
   			});
		});
</script>
@endsection