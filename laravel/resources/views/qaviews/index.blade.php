{{-- created by tran.nham on 26.05.2017 --}}
@extends('qaviews.layout')

@section('qa_content')	
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
					<ul class="list-group">
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

	$(document).ready(function() {
		sidemenu();
		jQuery.validator.addMethod("check_type", function(value, element) {
        	return value!='Chọn Thể Loại';
   			});
		});
</script>
@endsection