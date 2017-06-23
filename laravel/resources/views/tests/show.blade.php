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

				{{-- model edit answer_comment--}}
				<div tabindex="-1" class="modal fade" id="edit-comment-dialog" style="display: none;" aria-hidden="true">
					<div class="modal-dialog" >
						<div class="modal-content">
							<div class="modal-body">
								<p>Sửa câu trả lời</p>
								<textarea id="edit_comment_field" name="content" required class="form-control"></textarea>

							</div>
							<div class="pmd-modal-action pmd-modal-bordered text-right">
								<button class="btn pmd-btn-flat pmd-ripple-effect btn-primary" id="submit-edit-comment" type="button">Lưu lại</button>
								<button data-dismiss="modal" type="button" class="btn pmd-btn-flat pmd-ripple-effect btn-default">Huỷ</button>
							</div>
						</div>
					</div>
				</div>

				{{-- model delete answer_comment --}}
				<div tabindex="-1" class="modal fade" id="comment-delete-dialog" style="display: none;" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h2 class="pmd-card-title-text"><i class="material-icons md-dark pmd-md" style="color: red;">warning</i><span style="margin-bottom: 30px;"> Bạn thất sự muốn xoá câu trả lời này!</span></h2>
							</div>
							<div class="modal-body">
								<p style="color:red;"> Lưu ý rằng khi bạn xoá câu trả lời, các câu trả lời và bình luận liên quan cũng sẽ bị xoá.</p>
							</div>	
							<div class="pmd-modal-action pmd-modal-bordered text-right">

								<input type="hidden" name="question_id" value="{{$test->id}}">
								<button id="submit-delete-comment" class="btn pmd-btn-flat pmd-ripple-effect btn-primary" type="submit">Vẫn xoá</button>

								<button data-dismiss="modal" type="button" class="btn pmd-btn-flat pmd-ripple-effect btn-default">Thôi</button>

							</div>
						</div>
					</div>
				</div>
				{{-- model edit answer_comment--}}
				<div tabindex="-1" class="modal fade" id="edit-answer-comment-dialog" style="display: none;" aria-hidden="true">
					<div class="modal-dialog" >
						<div class="modal-content">
							<div class="modal-body">
								<p>Sửa câu trả lời</p>
								<textarea id="edit_answer_comment_field" name="content" required class="form-control"></textarea>

							</div>
							<div class="pmd-modal-action pmd-modal-bordered text-right">
								<button class="btn pmd-btn-flat pmd-ripple-effect btn-primary" id="submit-edit-answer-comment" type="button">Lưu lại</button>
								<button data-dismiss="modal" type="button" class="btn pmd-btn-flat pmd-ripple-effect btn-default">Huỷ</button>
							</div>
						</div>
					</div>
				</div>

				{{-- model delete answer_comment --}}
				<div tabindex="-1" class="modal fade" id="answer-comment-delete-dialog" style="display: none;" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h2 class="pmd-card-title-text"><i class="material-icons md-dark pmd-md" style="color: red;">warning</i><span style="margin-bottom: 30px;"> Bạn thất sự muốn xoá câu trả lời này!</span></h2>
							</div>
							<div class="modal-body">
								<p style="color:red;"> Lưu ý rằng khi bạn xoá câu trả lời, các câu trả lời và bình luận liên quan cũng sẽ bị xoá.</p>
							</div>	
							<div class="pmd-modal-action pmd-modal-bordered text-right">

							<input type="hidden" name="question_id" value="{{$test->id}}">
								<button id="submit-delete-answer-comment" class="btn pmd-btn-flat pmd-ripple-effect btn-primary" type="submit">Vẫn xoá</button>

								<button data-dismiss="modal" type="button" class="btn pmd-btn-flat pmd-ripple-effect btn-default">Thôi</button>

							</div>
						</div>
					</div>
				</div>

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
								<input type="hidden" name="comment_id_input_{{$comment->id}}" value="{{$comment->id}}">
								<div class="pull-left question-sub-info">
									<span id="vote_count">{{$comment->voteCommentTest->count()}}</span> <span class="glyphicon glyphicon-thumbs-up"></span>&nbsp;&nbsp;
									<span id="comment_count">{{$comment->commentReplies->count()}}</span> &nbsp;<span class="glyphicon glyphicon-comment"></span>&nbsp;&nbsp;
									<span class="created-time">{{$comment->created_at->diffForHumans()}}</span>
								</div>
								<div class="pull-right">
									
									<button class="btn pmd-btn-flat pmd-ripple-effect btn-success" type="button" data-toggle="collapse" data-target="#{{$comment->id}}" id="vote_answer" style="margin-bottom:5px;"> Bình luận</button>

									@if (Auth::user()->voteCommentTest->where('comment_tests_id',$comment->id)->count()==0)
									<button class="btn pmd-btn-flat pmd-ripple-effect btn-success" type="button" id="vote" data-comment_id='{{$comment->id}}' style="margin-bottom:5px;"><span class="glyphicon glyphicon-thumbs-up"></span> Vote</button>
									@else
									<button class="btn pmd-btn-flat pmd-ripple-effect btn-success" type="button" id="un_vote" data-comment_id='{{$comment->id}}' style="margin-bottom: 5px;"><span class="glyphicon glyphicon-thumbs-down"></span> Bỏ vote</button>
									@endif
									@if(Auth::user()->id == $comment->user->id)
										<a class="action-link" id="show-edit_comment" data-id_comment={{$comment->id}} style="margin-bottom:5px;"> &#8226; Sửa</a>
										<a class="action-link" data-id_comment={{$comment->id}} id="show-delete-comment" style="margin-bottom:5px;"> &#8226; Xoá</a>
									@endif
								</div>
							</div> 
							<div class="collapse" id="{{$comment->id}}" style="height: 0px;">
								<div id="group_comments"> 
									<div id="commentfield" style="margin:10px 0px 30px 55px; width: 70%;">
										<input type="hidden" id="comment_id" name="comment_id" value="{{$comment->id}}"> 
										<div class="form-group comment-form">
											<label class="control-label">Trả lời</label> 
											<textarea style="background: #fff; height: 60px;" id="answer_comment_content" required class="form-control comment-box"></textarea>
										</div> 
										<div class=" comment-form-action "> <button id="answer_cmt" class="btn pmd-btn-outline pmd-ripple-effect btn-primary">Gửi</button>
										</div> 
									</div>	
									@if($comment->commentReplies->count())
									@foreach($comment->commentReplies as $commentReplie)
									<div class="comment-list-item" >
									
										<div class="media-left">
											@if ($commentReplie->user->avatar)
											<img class="img-avt" src="{{ asset('') }}/images/users/{{$commentReplie->user->avatar}}" width="40" height="40" alt="avatar">
											@endif
										</div>
										<div class="media-body" style="margin-top:10px;">
											<h3 class="list-group-item-heading name-text">{{$commentReplie->user->user_name}}</h3>
											<span class="list-group-item-text sub-text" style="color: black;">{{$commentReplie->content}}</span>	
											<p class="question-sub-info">
												<span id="count_like">{{$commentReplie->voteCommentReplie->count()}}</span> <span class="glyphicon glyphicon-thumbs-up"></span>&nbsp;&nbsp;
												<span class="created-time">{{$commentReplie->created_at->diffForHumans()}}</span>
												@if (Auth::user()->voteAnswerCommentTest->where('test_comment_replies_id',$commentReplie->id)->count()==0)
												<button data-answer_comment_id={{$commentReplie->id}} class="btn pmd-btn-flat pmd-ripple-effect btn-success" type="button" id="like" style="margin-bottom:5px;"> Vote</button>
												@else
												<button data-answer_comment_id={{$commentReplie->id}} class="btn pmd-btn-flat pmd-ripple-effect btn-success" type="button" id="dislike" style="margin-bottom:5px;">Bỏ Vote</button>
												@endif

												@if(Auth::user()->id == $commentReplie->user->id)
												<a data-answer_comment_id='{{$commentReplie->id}}' data-toggle="tooltip" id="edit-answer-comment" data-placement="top" title="Sửa" style="margin-left: 10px;" href="#" ><span class="material-icons md-dark pmd-xs ">mode_edit</span></a>

												<a data-answer_comment_id='{{$commentReplie->id}}' data-toggle="tooltip" id="show-delete-answer-comment" data-placement="top" title="Xoá" style="margin-left:10px;" href="#"><span class="material-icons md-dark pmd-xs ">delete</span></a>
												@endif
											</p>
										</div>
									</div>
									@endforeach
									@endif
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



			// comment vote
			$('body').on('click', '#vote', function(event) {
				var vote_count=parseInt($(this).parent().parent().find('#vote_count').html());
				var count=$(this).parent().parent().find('#vote_count');
				var comment_id=$(this).data('comment_id');
				var me=$(this);
				$.post('{{url('tests/ajax/vote_comment')}}', {comment_id: comment_id}, function(data, textStatus, xhr) {
					sucsecc:{
						count.html(vote_count+1);
						me.html('<span class="glyphicon glyphicon-thumbs-down"></span> Bỏ vote').attr('id', 'un_vote');;
					}
				});
			});

			//comment un_vote
			$('body').on('click', '#un_vote', function(event) {
				var vote_count=parseInt($(this).parent().parent().find('#vote_count').html());
				var count=$(this).parent().parent().find('#vote_count');
				var comment_id=$(this).data('comment_id');
				var me=$(this);
				$.post('{{url('tests/ajax/dis_vote_comment')}}', {comment_id: comment_id}, function(data, textStatus, xhr) {
					sucsecc:{
						count.html(vote_count-1);
						me.html('<span class="glyphicon glyphicon-thumbs-up"></span> Vote').attr('id', 'vote');;
					}
				});
			});


			//show edit comment
			$('body').on('click','#show-edit_comment',function(event) {

				var comment_content = $(this).parent().parent().find('#answer_content p').html();
				$('#submit-edit-comment').data('id_comment', $(this).data('id_comment'));
				$('#edit_comment_field').val(comment_content);
				$('#edit-comment-dialog').modal('show');
			});

			//submit edit comment
			$('body').on('click','#submit-edit-comment',function(event){
				var id_comment = $(this).data('id_comment');
				var comment_content=$('#edit_comment_field').val();
				var content=$('body').find("input[name='comment_id_input_"+id_comment+"']").parent().find('#answer_content p');
				
				$.post('{{ url('tests/ajax/comment/edit') }}',{id_comment:id_comment,comment_content:comment_content},function(data,textStatus,xhr) {
					success: {
						$('#edit-comment-dialog').modal('hide');
						var top=content.html(data.content).offset().top-150;
						$('html,body').animate({scrollTop:top}, 'slow'); 
						
					}
				});
			});



			$('#list_cmt').on('click', '#show-delete-comment', function(event) {
				$('#submit-delete-comment').data('id_comment', $(this).data('id_comment'));
				$('#comment-delete-dialog').modal('show');

			});


			//submit delete answer
			$('body').on('click','#submit-delete-comment',function(event){
				var id_comment = $(this).data('id_comment');
				$.post('{{ url('tests/ajax/comment/delete') }}',{id_comment:id_comment},function(data,textStatus,xhr) {
					success: {
						$('#comment-delete-dialog').modal('hide');
						var content=$('body').find("input[name='comment_id_input_"+id_comment+"']").parent().parent();
						$('html,body').animate({scrollTop:content.offset().top}, 'slow');
						content.fadeOut(1000);
							//content.remove();

						}
					});
			});

			//answer-comment like
			$('#list_cmt').on('click', '#like', function(event) {
				var count_like=parseInt($(this).parent().find('#count_like').html());
				var answer_comment_id=$(this).data('answer_comment_id');
				var count=$(this).parent().find('#count_like');
				count.html(count_like+1);
				$(this).attr('id', 'dislike');
				$(this).html('Bỏ vote');
				$.post('{{url('tests/ajax/like')}}', {answer_comment_id:answer_comment_id}, function(data, textStatus, xhr) {
					success:
					{
						

					}
				});

			});

			//answer-comment un_like
			$('#list_cmt').on('click', '#dislike', function(event) {
				var count_like=parseInt($(this).parent().find('#count_like').html());
				var answer_comment_id=$(this).data('answer_comment_id');
				var count=$(this).parent().find('#count_like');
				count.html(count_like-1);
				$(this).attr('id', 'like');
				$(this).html('Vote');
				$.post('{{url('tests/ajax/dislike')}}', {answer_comment_id:answer_comment_id}, function(data, textStatus, xhr) {
					success:
					{
						

					}
				});

			});



			//show edit answer comment
			$('body').on('click', '#edit-answer-comment', function(event) {
				var answer_comment_content = $(this).parent().parent().find('span:first').text();

				$('#submit-edit-answer-comment').data('answer_comment_id', $(this).data('answer_comment_id'));

				$('#edit_answer_comment_field').val(answer_comment_content);

				$('#edit-answer-comment-dialog').modal('show');

			});


			//submit edit answer comment
			$('body').on('click','#submit-edit-answer-comment',function(event){
				var answer_comment_id = $(this).data('answer_comment_id');
				var answer_comment_content=$('#edit_answer_comment_field').val();
				var content=$('body').find("a[data-answer_comment_id='"+answer_comment_id+"']").parent().parent().find('span:first');
				
				$.post('{{ url('tests/ajax/answercomment/edit') }}',{answer_comment_id:answer_comment_id,answer_comment_content:answer_comment_content},function(data,textStatus,xhr) {
					success: {
						$('#edit-answer-comment-dialog').modal('hide');
						var top=content.text(data.content).offset().top-150;
						$('html,body').animate({scrollTop:top}, 'slow'); 
						
					}
				});
			});

			//show delete answer_comment

			$('#list_cmt').on('click', '#show-delete-answer-comment', function(event) {
				$('#submit-delete-answer-comment').data('answer_comment_id', $(this).data('answer_comment_id'));
				$('#answer-comment-delete-dialog').modal('show');

			});

			//submit delete answer_comment

			$('body').on('click','#submit-delete-answer-comment',function(event){
				
				var answer_comment_id = $(this).data('answer_comment_id');
				$.post('{{ url('tests/ajax/answercomment/delete') }}',{answer_comment_id:answer_comment_id},function(data,textStatus,xhr) {
					success: {
						$('#answer-comment-delete-dialog').modal('hide');
						var content=$('body').find("a[data-answer_comment_id='"+answer_comment_id+"']").parent().parent().parent();
						$('html,body').animate({scrollTop:content.offset().top-200}, 'slow');
						content.fadeOut(1000);
							//content.remove();

						}
					});
			});












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
					$('#list_cmt').append('<li class="list-group-item"> <div class="media-left"> <img class="img-avt" src="{{ asset('') }}/images/users/{{Auth::user()->avatar}}" alt="avatar"> </div> <div class="media-body" style="border-bottom: solid 1px #eee;"> <h3 class="list-group-item-heading name-text">{{Auth::user()->user_name}}</h3> <span class="list-group-item-text" id="answer_content" style="color: black;"><p>'+data.content+'</p></span> <input type="hidden" name="comment_id_input_'+data.id+'" value="'+data.id+'"> <div class="pull-left question-sub-info"> <span id="count_vote_answer">0</span> <span class="glyphicon glyphicon-thumbs-up"></span>&nbsp;&nbsp; <span id="answer_comment_count">0</span> &nbsp;<span class="glyphicon glyphicon-comment"></span>&nbsp;&nbsp; <span class="created-time">Vừa xong</span> </div> <div class="pull-right"><button class="btn pmd-btn-flat pmd-ripple-effect btn-success" type="button" data-toggle="collapse" data-target="#'+data.id+'" id="vote_answer" style="margin-bottom:5px;"> Bình luận</button> <button class="btn pmd-btn-flat pmd-ripple-effect btn-success" type="button" id="vote" data-comment_id='+data.id+' style="margin-bottom:5px;"><span class="glyphicon glyphicon-thumbs-up"></span> Vote</button> <a class="action-link" id="show-edit_comment" data-id_comment='+data.id+' style="margin-bottom:5px;"> &#8226; Sửa</a> <a class="action-link" data-id_comment='+data.id+' id="show-delete-comment" style="margin-bottom:5px;"> &#8226; Xoá</a></div> </div> <div class="collapse" id="'+data.id+'" style="height: 0px;"> <div id="group_comments"> <div id="commentfield" style="margin:10px 0px 30px 55px; width: 70%;"> <input type="hidden" id="comment_id" name="comment_id" value="'+data.id+'"> <div class="form-group comment-form"> <label class="control-label">Trả lời</label> <textarea style="background: #fff; height: 60px;" id="answer_comment_content" required class="form-control comment-box"></textarea> </div> <div class=" comment-form-action "> <button id="answer_cmt" class="btn pmd-btn-outline pmd-ripple-effect btn-primary">Gửi</button> </div> </div> </div> </div> </li> <hr style=" margin:1px 50px; width: 90%;">') ; $('#comment-field').val(''); $("html, body").animate({ scrollTop: $(document).height() }, "slow");
				}

			});


		});

			$('#list_cmt').on('click', '#answer_cmt', function(event) {

				var comment_id=$(this).parent().parent().find('#comment_id').val();
				var comment_content=$(this).parent().parent().find('#answer_comment_content');

				var answer_comment_count=parseInt($(this).parent().parent().parent().parent().parent().find('#comment_count').html());
				if(comment_content=='')
				{

				}
				else
				{
					var add_answer=$(this).parent().parent().parent();
					var add_answer_comment_count=$(this).parent().parent().parent().parent().parent().find('#comment_count');
					$.post('{{url('tests/ajax/answer/comment')}}', {comment_id: comment_id,comment_content:comment_content.val()}, function(data, textStatus, xhr) {
						success:{

							add_answer_comment_count.html(answer_comment_count+1);
							var top=add_answer.append('<div class="comment-list-item"> <div class="media-left"><img class="img-avt" src="{{ asset('') }}/images/users/{{Auth::user()->avatar}}" width="40" height="40" alt="avatar"></div> <div class="media-body"> <h3 class="list-group-item-heading name-text">{{Auth::user()->user_name}}</h3> <span class="list-group-item-text sub-text" style="color: black;">'+escapeHtml(data.content)+'</span> <p class="question-sub-info"> <span id="count_like">0</span> <span class="glyphicon glyphicon-thumbs-up"></span>&nbsp;&nbsp; <span class="created-time">Vừa xong</span> <button data-answer_comment_id="'+data.id+'" class="btn pmd-btn-flat pmd-ripple-effect btn-success" type="button" id="like" style="margin-bottom:5px;"> Vote</button> <a data-answer_comment_id="'+data.id+'" data-toggle="tooltip" id="edit-answer-comment" data-placement="top" title="" style="margin-left: 10px;" href="#" data-original-title="Sửa"><span class="material-icons md-dark pmd-xs ">mode_edit</span></a> <a data-answer_comment_id="'+data.id+'" data-toggle="tooltip" id="show-delete-answer-comment" data-placement="top" title="" style="margin-left:10px;" href="#" data-original-title="Xoá"><span class="material-icons md-dark pmd-xs ">delete</span></a> </p> </div></div>').find('div:last').offset().top-100;
							
							$('html,body').animate({scrollTop:top}, 'slow'); 
							comment_content.val("");
							
						}
					});
					
				}
			});

			function escapeHtml(unsafe) {
				return unsafe
				.replace(/&/g, "&amp;")
				.replace(/</g, "&lt;")
				.replace(/>/g, "&gt;")
				.replace(/"/g, "&quot;")
				.replace(/'/g, "&#039;");
			}


		});

	</script>
	@endsection