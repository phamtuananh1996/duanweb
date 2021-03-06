{{-- created by tran.nham on 24.05.2017 --}}
@extends('tests.layout')
@section('test_content')
<script src="//cdn.ckeditor.com/4.6.2/basic/ckeditor.js"></script>
<script src="{{ asset('plugins/jquery.validate.js') }}"></script>
<style type="text/css">
  	.error{
        font-size: 13px !important;
        color: red !important;
    	}
    
</style>
<div class="row">
	<div class="col-md-9 main-content">
		<div class="test-info">
			<h1 style="color:green;">{{$test->title}}</h1>
			<hr style=" border-bottom: solid 1px #007E33;">
			<p><strong>Thể loại/Danh mục: </strong>{{$test->category->title}}</p>
			@if($test->test_type == 0)
				<p><strong>Dạng đề:</strong>Trắc nghiệm</p>
			@else
				<p><strong>Dạng đề: </strong>Tự luận</p>
			@endif
			<p><strong>Thời gian: </strong>{{$test->total_time}} phút</p>
			@if($test->level == 1)
				<p><strong>Độ khó: </strong>Dễ</p>
			@else
				@if($test->level == 2)
					<p><strong>Độ khó: </strong>Trung bình</p>
				@else
					<p><strong>Độ khó: </strong>Khó</p>
				@endif
			@endif
			<p><strong>Số người đã làm: </strong>{{$test->userTests->count()}}</p>
		</div>
		<div class="row">
			<button style="margin-top: 20px;" data-target="#list-test-options-dialog" data-toggle="modal" type="button" class="btn btn-primary col-md-2 col-md-offset-5"> Vào làm bài </button >
				<form method="POST" action="{{url('/tests/usertest')}}" id="submit_edit">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" name="test_id" value="{{$test->id}}">
					<div tabindex="-1" class="modal fade" id="list-test-options-dialog" style="display: none;" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header pmd-modal-bordered"> 
									<h3 class="pmd-card-title-text">Chọn cách thức thi</h3>
								</div>
								<div class="modal-body">
									<div class="radio">
										<label class="pmd-radio">
											<input type="radio" name ="is_time_count" checked value="1">
											<span for="time_count">Tính thời gian</span> 
										</label>
									</div>
									<div class="radio">
										<label class="pmd-radio">
											<input type="radio"  name ="is_time_count" value="0">
											<span for="not_time_count">Không tính thời gian</span> 
										</label>
									</div>
								</div>
								<div class="pmd-modal-action pmd-modal-bordered text-right">
									<button  class="btn pmd-ripple-effect btn-primary pmd-btn-flat" type="submit">Vào thi</button>
									<button data-dismiss="modal"  class="btn pmd-ripple-effect btn-default pmd-btn-flat" type="button">Lúc khác</button>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
			<div class="comments-list" style="width: 100%;"> 
				<h2>Bình luận</h2>
				<hr style=" border-bottom: solid 1px #bdbdbd ; ">		
				<div id="commentField" class="form-group pmd-textfield">
					<form>
						<label class="control-label"></label>
						<textarea style="height:50px;" id="comment-field" name="content" required class="form-control"></textarea>
						<button type="button" class="btn btn-sm pmd-btn-raised pmd-ripple-effect btn-primary" style="margin-top:10px; margin-bottom: 30px;">Gửi</button>
					</form>	
				</div>
				@if($test->comments->count())
				<ul class="list-group pmd-z-depth pmd-list pmd-card-list" style="box-shadow: none; background: #fafafa;">
					@foreach($test->comments as $comment)
					<li class="list-group-item">
						<div class="media-left">
							@if($comment->user->avatar)
								<img class="img-avt" src="{{ asset('') }}/images/users/{{$comment->user->avatar}}" class="img-responsive" data-src="holder.js/40x40" alt="40x40"/>
							@endif
						</div>
						<div class="media-body media-middle">
							@if($comment->user->name)
							<p><h3 class="list-group-item-heading" style="color: green;">{{$comment->user->name}}</h3> <i style="color: #616161; font-size: 12px;">{{$comment->created_at->toDayDateTimeString()}}</i></p>
							@else
							<p><h3 class="list-group-item-heading" style="color: green;">{{$comment->user->user_name}}</h3> <i style="color: #616161; font-size: 12px;">{{$comment->created_at->toDayDateTimeString()}}</i></p>
							@endif
							<span class="list-group-item-text" style="color: #424242; font-size: 15px;">{{$comment->content}}</span>
						</div>
						<hr style=" border-bottom: solid 1px #bdbdbd ; ">
					</li>
					@endforeach
				</ul>
				@endif
			</div>
		</div>
		@include('tests.sidebar')
	</div>
	<script type="text/javascript">

		$(document).ready(function() {
			$('#submit_edit').validate({

			});
		});

	</script>
	@endsection