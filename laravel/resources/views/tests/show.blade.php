{{-- created by tran.nham on 24.05.2017 --}}
@extends('tests.layout')
@section('test_content')
<link rel="stylesheet" type="text/css" href="{{asset('css/rate.css')}}">
<script src="//cdn.ckeditor.com/4.6.2/basic/ckeditor.js"></script>
<script src="{{ asset('plugins/jquery.validate.js') }}"></script>
<script src="{{ asset('js/alert/sweetalert.min.js') }}"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('js/alert/sweetalert.css') }}">
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
			<button style="margin-top: 20px;" data-target="#list-test-options-dialog" data-toggle="modal" type="button" class="btn btn-primary col-md-2 col-md-offset-5"><span class="glyphicon glyphicon-triangle-right"></span> Vào làm bài </button >
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
			{{-- model đánh giá --}}
				<div tabindex="-1" class="modal fade" id="rate-dialog" style="display: none;" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header pmd-modal-bordered"> 
									<h3 class="pmd-card-title-text">Đánh giá bài thi</h3>
								</div>
								<div class="modal-body">
									<div class="acidjs-rating-stars">
										<form id="form_rate">
											<input type="hidden" name="test_id" value="{{$test->id}}">
        									<input type="radio" name="rate" id="group-1-0" value="5" /><label for="group-1-0"></label>
        									<input type="radio" name="rate" id="group-1-1" value="4" /><label for="group-1-1"></label>
        									<input type="radio" name="rate" id="group-1-2" value="3" /><label for="group-1-2"></label>
        									<input type="radio" name="rate" id="group-1-3" value="2" /><label for="group-1-3"></label>
        									<input type="radio" checked name="rate" id="group-1-4"  value="1" /><label for="group-1-4"></label>
										</form>
									</div>
								</div>
								<div class="pmd-modal-action pmd-modal-bordered text-right">
									<button id="submit_rate" class="btn pmd-ripple-effect btn-primary pmd-btn-flat" type="submit">Đánh giá</button>

									<button data-dismiss="modal"  class="btn pmd-ripple-effect btn-default pmd-btn-flat" type="button">Lúc khác</button>
								</div>
							</div>
						</div>
					</div>
				{{-- end model --}}
				<div class="acidjs-rating-stars acidjs-rating-disabled">
					<form id="rate">
        				<input type="radio" name="group-1" id="group-1-0" value="5" /><label for="group-1-0"></label><!--
        				--><input type="radio" name="group-1" id="group-1-1" value="4" /><label for="group-1-1"></label><!--
       					 --><input type="radio" name="group-1" id="group-1-2" value="3" /><label for="group-1-2"></label><!--
        				--><input type="radio" name="group-1" id="group-1-3" value="2" /><label for="group-1-3"></label><!--
    					--><input type="radio" name="group-1" id="group-1-4"  value="1" /><label for="group-1-4"></label>
					</form>
				</div>
			</div>
			<button type="button" data-target="#rate-dialog" data-toggle="modal" class="btn pmd-btn-raised pmd-ripple-effect btn-info" style="margin:20px 0 10px 10px;">Đánh giá</button>

			<div class="comments-list"> 
				<h2>Bình luận</h2>
				<hr style=" border-bottom: solid 1px #bdbdbd ; ">		
				<div id="commentField" class="form-group comment-form">
					<textarea style="height:80px" id="comment-field" name="content" class="form-control comment-box" placeholder="viết bình luận...">
					</textarea>
					<div class=" comment-form-action "> 
						<button id="submit_comment" type="button" class="btn pmd-btn-outline pmd-ripple-effect btn-primary" >Gửi</button>
					</div>
					<input type="hidden" id="test_id" value="{{$test->id}}">
				</div>
				
				<div class="answer-list">
					<ul class="list-group" id="list_cmt">
						@foreach($test->comments as $comment)
						<li class="list-group-item">
							<div class="media-left">
								<img class="img-avt" src="{{ asset('') }}/images/users/{{$comment->user->avatar}}" alt="avatar">
							</div>
							<div class="media-body" style="border-bottom: solid 1px #eee;">
								<h3 class="list-group-item-heading name-text">{{$comment->user->user_name}}</h3>
								<span class="list-group-item-text" id="answer_content" style="color: black;"><p>{{$comment->content}}</p></span>
								<input type="hidden" name="answer_id_input_7" value="7">

								<div class="pull-left question-sub-info">
									<span id="count_vote_answer">0</span> <span class="glyphicon glyphicon-thumbs-up"></span>&nbsp;&nbsp;
									<span id="answer_comment_count">{{$comment->commentReplies->count()}}</span> &nbsp;<span class="glyphicon glyphicon-comment"></span>&nbsp;&nbsp;
									<span class="created-time">{{$comment->created_at->diffForHumans()}}</span>
								</div>
								<div class="pull-right">
									<a class="action-link" id="vote_answer" style="margin-bottom:5px;"> &#8226; Vote</a>
									<a class="action-link" data-toggle="collapse" data-target="#{{$comment->id}}" id="vote_answer" style="margin-bottom:5px;"> &#8226; Bình luận</a>
									@if(Auth::user()->id == $comment->user->id)
										<a class="action-link" id="vote_answer" style="margin-bottom:5px;"> &#8226; Sửa</a>
										<a class="action-link" id="vote_answer" style="margin-bottom:5px;"> &#8226; Xoá</a>
									@endif
<<<<<<< HEAD
								</p>
								</div> 
								<div id="group_comments" style="display: none"> 
=======
								</div>
							</div> 
							<div class="collapse" id="{{$comment->id}}" style="height: 0px;">
								<div id="group_comments"> 
>>>>>>> origin/Edit
									<div id="commentfield" style="margin:10px 0px 30px 55px; width: 70%;">
										<input type="hidden" id="answer_id" name="answer_id" value="'+data.id+'"> 
										<div class="form-group comment-form">
											<label class="control-label">Trả lời</label> 
											<textarea style="background: #fff; height: 60px;" id="answer_comment_content" required class="form-control comment-box"></textarea>
										</div> 
										<div class=" comment-form-action "> <button id="answer_cmt" class="btn pmd-btn-outline pmd-ripple-effect btn-primary">Gửi</button>
										</div> 
									</div>	
								</div>	
							</div>
						</li>
						<hr style=" margin:1px 50px; width: 90%;">
						@endforeach
					</ul>
				</div>
				
			</div>
		</div>
		@include('tests.sidebar')
	</div>
	<script type="text/javascript">

		$(document).ready(function() {
			$('#comment-field').val('');
			$("#rate [value='{{$rateAvg}}']").attr('checked', 'true');

			@if ($countStarUserRate)
				$("#form_rate [value='{{$countStarUserRate->rate}}']").attr('checked', 'true');
			@endif



			$('#submit_rate').click(function(event) {

				$('#rate-dialog').modal('hide');

				//$('#rate input:checked').removeAttr('checked');

				$.ajax({
					url: '{{url('tests/ajax/rate')}}',
					type: 'post',
					data: $('#form_rate').serialize(),
					async: false, 
					success:function(data) {

						//$('#rate [value='+data+']').attr('checked', 'true');

						swal("Đánh giá thành công!", "Cảm ơn bạn đã đánh giá!", "success");
					}
				})
				
			});


			$('#submit_edit').validate({

			});

			//show field answer 

			



			//comment
			$('#submit_comment').click(function(event) {
				var content=$('#comment-field').val();
				$.post('{{url('tests/ajax/comment')}}',{content:content,test_id:$('#test_id').val()}, function(data, textStatus, xhr) {
				success: {
					$('#list_cmt').append('<li class="list-group-item"> <div class="media-left"> <img class="img-avt" src="{{ asset('') }}/images/users/{{Auth::user()->avatar}}" alt="avatar"> </div> <div class="media-body" style="border-bottom: solid 1px #eee;"> <h3 class="list-group-item-heading name-text">{{Auth::user()->user_name}}</h3> <span class="list-group-item-text" id="answer_content" style="color: black;"><p>'+data.content+'</p></span> <input type="hidden" name="answer_id_input_'+data.id+'" value="7"> <div class="pull-left question-sub-info"> <span id="count_vote_answer">0</span> <span class="glyphicon glyphicon-thumbs-up"></span>&nbsp;&nbsp; <span id="answer_comment_count">0</span> &nbsp;<span class="glyphicon glyphicon-comment"></span>&nbsp;&nbsp; <span class="created-time">Vừa xong</span> </div> <div class="pull-right"> <a class="action-link" id="vote_answer" style="margin-bottom:5px;"> &#8226; Vote</a> <a class="action-link" data-toggle="collapse" data-target="#'+data.id+'" id="vote_answer" style="margin-bottom:5px;"> &#8226; Bình luận</a> <a class="action-link" id="vote_answer" style="margin-bottom:5px;"> &#8226; Sửa</a> <a class="action-link" id="vote_answer" style="margin-bottom:5px;"> &#8226; Xoá</a></div> </div> <div class="collapse" id="'+data.id+'" style="height: 0px;"> <div id="group_comments"> <div id="commentfield" style="margin:10px 0px 30px 55px; width: 70%;"> <input type="hidden" id="answer_id" name="answer_id" value="'+data.id+'"> <div class="form-group comment-form"> <label class="control-label">Trả lời</label> <textarea style="background: #fff; height: 60px;" id="answer_comment_content" required class="form-control comment-box"></textarea> </div> <div class=" comment-form-action "> <button id="answer_cmt" class="btn pmd-btn-outline pmd-ripple-effect btn-primary">Gửi</button> </div> </div> </div> </div> </li> <hr style=" margin:1px 50px; width: 90%;">') ;
					$('#comment-field').val('');
					$("html, body").animate({ scrollTop: $(document).height() }, "slow");
				}

			});


		});
		});

	</script>
	@endsection