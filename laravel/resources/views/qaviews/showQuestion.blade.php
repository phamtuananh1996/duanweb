@extends('qaviews.layout')
@section('qa_content')	
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script src="{{ asset('plugins/jquery.validate.js') }}"></script>
<!--main content-->
<div class="col-md-10" style="margin-bottom: 50px;background: white;">	
	@include('qaviews.content_header')
	<!--qestion tags-->
	<div class="pmd-chip pmd-chip-no-icon">Toan 11 <a class="pmd-chip-action" href="javascript:void(0);">
		<i class="material-icons">close</i></a>
	</div>
	<div class="pmd-chip pmd-chip-no-icon">kiến thức lớp 11 <a class="pmd-chip-action" href="javascript:void(0);">
		<i class="material-icons">close</i></a>
	</div>
	<!--question detail-->
	<div class="pmd-card pmd-card-media-inline pmd-card-default pmd-z-depth question-content" >
		<!--Question header-->
		<div class="question-header" >
			<div class="media-left">
				@if ($question->user->avatar)
                    <img class="img-avt" src="{{ asset('') }}/images/users/{{$question->user->avatar}}" width="40" height="40" alt="avatar">
                @endif
			</div>
			<div class="media-body media-middle">
				<h3 class="list-group-item-heading name-text">{{$question->user->user_name}}</h3>
				<span class="list-group-item-text">Đăng {{$question->created_at->diffForHumans()}} tại {{$question->category->title}}</span>
			</div>
		</div><!--Question header-->
		<!--Question body-->
		<div class="pmd-card-media" style="background: #fff;" id ="qes-body">
			<div class="media-body">
				<p class="question-title" id="question-title">{{$question->question_title}}
					@if($question->is_resolved == true)
						<span style="color: green;" class="glyphicon glyphicon-ok-sign"></span>
					@else
						<span style="color: red;" class="glyphicon glyphicon-question-sign"></span>
					@endif
				</p>
				<span id="question_content" class="pmd-card-subtitle-text">{!!$question->question_content!!}</span>
				<p class="question-sub-info">
					<span id="vote_count">{{$question->voteQuestion->count()}} </span>&nbsp;<span class="glyphicon glyphicon-thumbs-up"></span>&nbsp;&nbsp;
					<span id="answer_count">{{$question->answers->count()}}</span>&nbsp;<span class="glyphicon glyphicon-comment"></span>&nbsp;&nbsp;
					{{$question->view_count}} <span class="glyphicon glyphicon-eye-open"></span>
				</p>
			</div>
			<!--question actions-->
			<div class="pmd-card-actions" id="qa" style="margin-left: -10px;">
				<!-- answer alert-->
				<button data-target="#answer-dialog" data-toggle="modal" class="btn pmd-btn-flat pmd-ripple-effect btn-info" type="button"><span class="glyphicon glyphicon-pencil"></span> Viết trả lời</button>
				<div tabindex="-1" class="modal fade" id="answer-dialog" style="display: none;" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h2 style="border-bottom: solid 1px #bdbdbd; padding-bottom: 10px;" class="pmd-card-title-text">{{$question->question_title}}</h2>
								<div class="post-header">
									<div class="media-left">
										@if(Auth::check())
											@if (Auth::user()->avatar)
			                                    <img src="{{ asset('') }}/images/users/{{Auth::user()->avatar}}" width="40" height="40" alt="avatar">
			                                @endif
		                           		 @endif
									</div>
									<div class="media-body media-middle">
										<h3 class="list-group-item-heading">{{Auth::user()->user_name}}</h3>
										<span class="list-group-item-text">Học {{Auth::user()->class}}</span>
									</div>
								</div>
							</div>
							<div class="modal-body">
								<p>Nội dung</p>
								<textarea id="answer_field" name="content" required class="form-control"></textarea>
								<script>
									CKEDITOR.replace( 'answer_field' );
								</script>	
							</div>
							<div class="pmd-modal-action pmd-modal-bordered text-right">
								<a  class="btn pmd-btn-flat pmd-ripple-effect btn-primary" id="bt_cmt" type="submit">Đăng</a>
								<button data-dismiss="modal" type="button" class="btn pmd-btn-flat pmd-ripple-effect btn-default">Huỷ</button>
							</div>
						</div>
					</div>
				</div><!--answer alert-->
				<!--actions button-->
				@if (Auth::user()->voteQuestion->where('question_id',$question->id)->count())
					<button type="button" class="btn pmd-btn-flat pmd-ripple-effect btn-success" id="dis_vote"><span class="glyphicon glyphicon-thumbs-down"></span> Bỏ vote </button >	
				@else
					<button type="button" class="btn pmd-btn-flat pmd-ripple-effect btn-success" id="vote"><span class="glyphicon glyphicon-thumbs-up"></span> Vote </button >
				@endif


				@if (Auth::user()->followQuestion->where('question_id',$question->id)->count())
					<button type="button" class="btn pmd-btn-flat pmd-ripple-effect btn-danger" id="dis_follows"><span class="glyphicon glyphicon-eye-close"></span> Bỏ theo dõi </button >
				@else
						
					<button type="button" class="btn pmd-btn-flat pmd-ripple-effect btn-danger" id="follows"><span class="glyphicon glyphicon-eye-open"></span> Theo dõi </button >
				@endif

				<input type="hidden" id="question_id" value="{{$question->id}}">
				<!--user option-->
				@if(Auth::user()->id == $question->user_id)
					<div id="user-option" class="pull-right" style="margin-bottom: 20px;">
						<input type="hidden" id="question_id" value="{{$question->id}}">
						<span class="dropdown pmd-dropdown dropup clearfix">
							<button class="btn btn-sm pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-primary" type="button" id="dropdownMenuTopLeft" data-toggle="dropdown" aria-expanded="true"><i class="material-icons pmd-sm">more_vert</i></button>
							<ul aria-labelledby="dropdownMenu3" role="menu" class="dropdown-menu pmd-dropdown-menu-top-left">
								<li role="presentation"><button  data-target="#move-dialog" data-toggle="modal" type="button" class="btn pmd-ripple-effect btn-link">Di chuyển chủ đề </button ></li>
								<li role="presentation"><button  data-target="#question-delete-dialog" data-toggle="modal" type="button" class="btn pmd-ripple-effect btn-link"> Xoá câu hỏi </button ></li>
								<li role="presentation"><button data-target="#question-edit-dialog" data-toggle="modal" class="btn pmd-ripple-effect btn-link" type="button" >Sửa câu hỏi</button></li>
								@if($question->is_resolved == true)
									<li role="presentation"><button id="resolve" type="button" class="btn pmd-ripple-effect btn-link">Chưa được trả lời</button ></li>
								@else 
									<li role="presentation"><button id="resolve" type="button" class="btn pmd-ripple-effect btn-link">Đã được trả lời</button ></li>
								@endif
							</ul>
						</span>
					</div>
				@endif<!--user options-->
				<!--model edit-->
				<div tabindex="-1" class="modal fade" id="question-edit-dialog" style="display: none;" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
							<h2 class="pmd-card-title-text">Sửa câu hỏi</h2>
							</div>
							<div class="modal-body">
								<input type="hidden" name="question_id" value="{{$question->id}}">
								<div class="form-group pmd-textfield pmd-textfield-floating-label">
									<label for="edit_title">Tiêu đề</label>
									<input type="text" class="mat-input form-control" id="question_title_edit" value="{{$question->question_title}}">
									<span class="help-text" style="color:red;">Bắt buộc!</span> 
								</div>
								<p>Nội dung</p>
								<textarea id="question_content_edit"  required class="form-control">{{$question->question_content}}</textarea>
								<script>
									CKEDITOR.replace( 'question_content_edit' );
								</script>	
								<div class="pmd-modal-action pmd-modal-bordered text-right">
									<button id="edit-question" class="btn pmd-btn-flat pmd-ripple-effect btn-primary" type="button">Lưu lại</button>
									<button data-dismiss="modal" type="button" class="btn pmd-btn-flat pmd-ripple-effect btn-default">Huỷ bỏ</button>
								</div>
							</div>
						</div>
					</div>
				</div> <!--end modal edit-->
				<!--modal delete-->
				<div tabindex="-1" class="modal fade" id="question-delete-dialog" style="display: none;" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h2 class="pmd-card-title-text"><i class="material-icons md-dark pmd-md" style="color: red;">warning</i><span style="margin-bottom: 30px;"> Bạn thất sự muốn xoá câu hỏi này!</span></h2>
							</div>
							<div class="modal-body">
							<p style="color:red;"> Lưu ý rằng khi bạn xoá câu hỏi, các câu trả lời và bình luận liên quan cũng sẽ bị xoá.</p>
							</div>	
							<div class="pmd-modal-action pmd-modal-bordered text-right">
								<form method="POST" action="{{url('qa/delete')}}">
								 	 {{ csrf_field()}}
									<input type="hidden" name="question_id" value="{{$question->id}}">
									<button id="delete-question" class="btn pmd-btn-flat pmd-ripple-effect btn-primary" type="submit">Vẫn xoá</button>
									<button data-dismiss="modal" type="button" class="btn pmd-btn-flat pmd-ripple-effect btn-default">Thôi</button>
								</form>
							
								
							</div>
						</div>
					</div>
				</div> <!--end modal delete-->
			</div><!--question actions-->
		</div><!--question body-->
	</div><!--question detail-->

	<!--Answers list-->
	
	<div class="answer-list">
		<ul class="list-group" id="list_cmt">
			@foreach ($question->answers as $answer)
			<li class="list-group-item">
				<div class="media-left">
					@if ($answer->user->avatar)
						<img class="img-avt" src="{{ asset('') }}/images/users/{{$answer->user->avatar}}" width="40" height="40" alt="avatar">
					@endif
				</div>
				<div class="media-body" style="border-bottom: solid 1px #eee;">
					<h3 class="list-group-item-heading name-text">{{$answer->user->user_name}}</h3>
					<span class="list-group-item-text" style="color: black;">{!!$answer->content!!}</span>
					<input type="hidden" name="answer_id" id="answer_id" value="{{$answer->id}}">
					<p class="question-sub-info">
						<span id="count_vote_answer">{{$answer->voteAnswer->count()}}</span> <span class="glyphicon glyphicon-thumbs-up"></span>&nbsp;&nbsp;
						<span id="answer_comment_count">{{$answer->comments->count()}}</span> &nbsp;<span class="glyphicon glyphicon-comment"></span>&nbsp;&nbsp;
						<span class="created-time">{{$answer->created_at->diffForHumans()}}</span>
						@if (Auth::user()->voteAnswer->where('answer_id',$answer->id)->count()==0)
							<button class="btn pmd-btn-flat pmd-ripple-effect btn-success" type="button" id="vote_answer" style="margin-bottom:5px;"> Vote</button>
						@else
							<button class="btn pmd-btn-flat pmd-ripple-effect btn-success" type="button" id="un_vote_answer" style="margin-bottom: 5px;"> Bỏ vote</button>
						@endif
						@if(Auth::user()->id == $answer->user->id)
							<a data-toggle="tooltip" data-placement="top" title="Sửa" style="margin-left: 10px;" href="#" ><span class="material-icons md-dark pmd-xs ">mode_edit</span></a>
							<a data-toggle="tooltip" data-placement="top" title="Xoá" style="margin-left:10px;" href="#"><span class="material-icons md-dark pmd-xs ">delete</span></a>
						@endif
					</p>					
					<!--edit answer modal-->
					<div tabindex="-1" class="modal fade" id="answer-edit-dialog-{{$answer->id}}" style="display: none;" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h2 class="pmd-card-title-text">Sửa trả lời</h2>
								</div>
								<div class="modal-body">
									<input type="hidden" name="answer_id" value="{{$answer->id}}">
									<p>Nội dung</p>
									<textarea id="answer_content_edit_{{$answer->id}}" required class="form-control">{{$answer->content}}</textarea>
									<script>
										CKEDITOR.replace( 'answer_content_edit_{{$answer->id}}');
									</script>	
									<div class="pmd-modal-action pmd-modal-bordered text-right">
										<button id="edit_answer" class="btn pmd-btn-flat pmd-ripple-effect btn-primary" type="button">Lưu lại</button>
										<button data-dismiss="modal" type="button" class="btn pmd-btn-flat pmd-ripple-effect btn-default">Huỷ bỏ</button>
									</div>
								</div>
							</div>
						</div>
					</div> <!--end modal edit-->
				</div>		
				<div id="group_comments">
					<div id="commentfield" style="margin:10px 0px 30px 55px; width: 70%;">
						<input type="hidden" id="answer_id" name="answer_id" value="{{ $answer->id}}">
						<div class="form-group pmd-textfield"> 
							<label class="control-label">Bình luận</label> 
							<textarea style="background: #fff; height: 40px;" id="answer_comment_content" required class="form-control"></textarea>
						</div>
						<a id="answer_cmt" class="btn btn-sm pmd-btn-raised pmd-ripple-effect btn-primary">Gửi</a>
					</div>
					@foreach($answer->comments as $comment)
					<div class="comment-list-item">
						<div class="media-left">
							@if ($comment->user->avatar)
								<img class="img-avt" src="{{ asset('') }}/images/users/{{$comment->user->avatar}}" width="40" height="40" alt="avatar">
							@endif
						</div>
						<div class="media-body" style="margin-top:10px;">
							<h3 class="list-group-item-heading name-text">{{$comment->user->user_name}}</h3>
							<span class="list-group-item-text sub-text" style="color: black;">{{$comment->content}}</span>	
							<p class="question-sub-info">
								<span id="count_like">{{$comment->likeAnswerComment->count()}}</span> <span class="glyphicon glyphicon-thumbs-up"></span>&nbsp;&nbsp;
								<span class="created-time">{{$comment->created_at->diffForHumans()}}</span>
								@if (Auth::user()->likeAnswerComment->where('answer_comment_id',$comment->id)->count()==0)
									<button data-answer_comment_id={{$comment->id}} class="btn pmd-btn-flat pmd-ripple-effect btn-success" type="button" id="like" style="margin-bottom:5px;"> Vote</button>
								@else
									<button data-answer_comment_id={{$comment->id}} class="btn pmd-btn-flat pmd-ripple-effect btn-success" type="button" id="dislike" style="margin-bottom:5px;">Bỏ Vote</button>
								@endif
								@if(Auth::user()->id == $comment->user->id)

									<a data-toggle="tooltip" data-placement="top" title="Sửa" style="margin-left: 10px;" href="" ><span class="material-icons md-dark pmd-xs ">mode_edit</span></a>

									<a data-toggle="tooltip" data-placement="top" title="Xoá" style="margin-left:10px;" href=""><span class="material-icons md-dark pmd-xs ">delete</span></a>

								@endif
							</p>
						</div>
					</div>
					@endforeach
				</div>
			</li>
			<hr style="border-bottom: solid 1px green;">
			@endforeach
		</ul>
	</div> <!--Answers list-->
	
</div><!--Main content-->
@include('qaviews.sidebar')

	<script type="text/javascript">
		$(document).ready(function() {
			$('[data-toggle="tooltip"]').tooltip(); 


			//ấn vote
			$('#qa').on('click', '#vote', function(event) {
				var vote_count=parseInt($('#vote_count').html());
				var question_id=$('#question_id').val();
				$.post('{{url('qa/ajax/vote')}}', {question_id: question_id}, function(data, textStatus, xhr) {
					sucsecc:{
						$('#vote_count').html(vote_count+1);
						$('#vote').html('<span class="glyphicon glyphicon-thumbs-down"></span> Bỏ vote').attr('id', 'dis_vote');;
					}
				});
			});

			//ấn bỏ vote
			$('#qa').on('click', '#dis_vote', function(event) {
				var vote_count=parseInt($('#vote_count').html());
				var question_id=$('#question_id').val();
				$.post('{{url('qa/ajax/dis_vote')}}', {question_id: question_id}, function(data, textStatus, xhr) {
					sucsecc:{
						$('#vote_count').html(vote_count-1);
						$('#dis_vote').html('<span class="glyphicon glyphicon-thumbs-up"></span> Vote').attr('id', 'vote');;
					}
				});
			});



			//ấn follows
			$('#qa').on('click', '#follows', function(event) {

				var question_id=$('#question_id').val();
				
				$.post('{{url('qa/ajax/follows')}}', {question_id: question_id}, function(data, textStatus, xhr) {
					sucsecc:{
						$('#follows').html('<span class="glyphicon glyphicon-eye-close"></span> Bỏ theo dõi ').attr('id', 'dis_follows');;
					}
				});
			});
			//ấn bỏ theo dõi
			$('#qa').on('click', '#dis_follows', function(event) {
				var question_id=$('#question_id').val();
				
				$.post('{{url('qa/ajax/dis_follows')}}', {question_id: question_id}, function(data, textStatus, xhr) {
					sucsecc:{
						$('#dis_follows').html('<span class="glyphicon glyphicon-eye-open"></span> Theo dõi ').attr('id', 'follows');;
					}
				});
			});

			//ấn cmt

			$('#bt_cmt').click(function(event) {
				var answer_count=parseInt($('#answer_count').html());
				var content=CKEDITOR.instances.answer_field.getData();
				if(content=='')
				{
					
				}
				else
				{
					$.post('{{url('qa/answer')}}',{content:content,question_id:$('#question_id').val()}, function(data, textStatus, xhr) {
						success:
						{
							CKEDITOR.instances.answer_field.setData('');
							$('#answer_count').html(answer_count+1);
							$('#list_cmt').append('<li class="list-group-item"> <div class="media-left"> <img class="img-avt" src="{{ asset('') }}/images/users/{{Auth::user()->avatar}}" width="40" height="40" alt="avatar"> </div> <div class="media-body" style="border-bottom: solid 1px #eee;"> <h3 class="list-group-item-heading name-text">{{Auth::user()->name}}</h3> <span class="list-group-item-text sub-text"style="color: black";>'+data.content+'</span><input type="hidden" name="answer_id" id="answer_id" value="'+data.id+'"> <p class="question-sub-info"> <span id="count_vote_answer">0</span> <span class="glyphicon glyphicon-thumbs-up"></span>&nbsp;&nbsp; <span id="answer_comment_count">0</span> &nbsp;<span class="glyphicon glyphicon-comment"></span>&nbsp;&nbsp;<span class="created-time">Vừa xong</span></span> <button class="btn pmd-btn-flat pmd-ripple-effect btn-success" type="button" id="vote_answer" style="margin-bottom:5px;"> Vote</button> </p> </div> <div id="group_comments"> <div id="commentfield" style="margin:10px 0px 30px 55px;"> <input type="hidden" id="answer_id" name="answer_id" value="'+data.id+'"> <div class="form-group pmd-textfield"> <label class="control-label">Bình luận</label> <textarea style="background: #fff; height: 40px;" id="answer_comment_content" required class="form-control"></textarea> </div> <a id="answer_cmt" class="btn btn-sm pmd-btn-raised pmd-ripple-effect btn-primary">Trả lời</a> </div> </div> </li>');

							$('#answer-dialog').modal('hide');

							$("html, body").animate({ scrollTop: $(document).height() }, "slow");


						}
					});
					

				}
			});


			//ấn answer_cmt

			$('#list_cmt').on('click', '#answer_cmt', function(event) {
				var answer_id=$(this).parent().find('#answer_id').val();
				var comment_content=$(this).parent().find('#answer_comment_content');
				var answer_comment_count=parseInt($(this).parent().parent().parent().find('#answer_comment_count').html());
				if(comment_content=='')
				{

				}
				else
				{
					var add_answer=$(this).parent().parent().parent().find('#group_comments');
					var add_answer_comment_count=$(this).parent().parent().parent().find('#answer_comment_count');
					$.post('{{url('qa/answer/comment')}}', {answer_id: answer_id,comment_content:comment_content.val()}, function(data, textStatus, xhr) {
						success:{

							add_answer_comment_count.html(answer_comment_count+1);
							var top=add_answer.append('<div class="comment-list-item"> <div class="media-left"><img class="img-avt" src="{{ asset('') }}/images/users/{{Auth::user()->avatar}}" width="40" height="40" alt="avatar"></div> <div class="media-body"> <h3 class="list-group-item-heading name-text">{{Auth::user()->name}}</h3> <p class="list-group-item-text sub-text" style"color:black;"">'+escapeHtml(data.content)+'</p><p class="question-sub-info"><span id="count_like">0 </span> <span class="glyphicon glyphicon-thumbs-up"></span>&nbsp;&nbsp;<span class="created-time">Vừa xong</span><button data-answer_comment_id="'+data.id+'" class="btn pmd-btn-flat pmd-ripple-effect btn-success" type="button" id="like" style="margin-bottom:5px;"> Vote</button></p> </div> <hr style="border-bottom: solid 1px #e0e0e0; margin-top:-10px;"> </div>'
							).find('div:last').offset().top-100;
							
								 $('html,body').animate({scrollTop:top}, 'slow'); 
								 comment_content.val("");
							
						}
					});
					
				 }
			});

			//edit answer
			$('#list_cmt').on('click','#edit_answer',function(event) {
				alert('click');
				var answer_id = $(this).parent().parent().find('#answer_id').val();
				alert(answer_id);
			});

			//ấn vote comment
			$('#list_cmt').on('click', '#vote_answer', function(event) {
				
				var answer_id=$(this).parent().parent().find('#answer_id').val();
				var count_vote=parseInt($(this).parent().find('#count_vote_answer').html());

				var count_vote_answer=$(this).parent().find('#count_vote_answer');
				count_vote_answer.html(count_vote+1);
				$(this).attr('id', 'un_vote_answer');
				$(this).html('Bỏ vote');
				$.post('{{url('qa/voteanswer')}}', {answer_id: answer_id}, function(data, textStatus, xhr) {

					success:
					{
						
						
					}
				});


			});

			$('#list_cmt').on('click', '#un_vote_answer', function(event) {
				
				var answer_id=$(this).parent().parent().find('#answer_id').val();
				var count_vote=parseInt($(this).parent().find('#count_vote_answer').html());

				var count_vote_answer=$(this).parent().find('#count_vote_answer');
				count_vote_answer.html(count_vote-1);
				$(this).attr('id', 'vote_answer');
				$(this).html('Vote');
				$.post('{{url('qa/unvoteanswer')}}', {answer_id: answer_id}, function(data, textStatus, xhr) {

					success:
					{
						
						

					}
					
				});


			});

			//ấn like
			$('#list_cmt').on('click', '#like', function(event) {
				var count_like=parseInt($(this).parent().find('#count_like').html());
				var answer_comment_id=$(this).data('answer_comment_id');
				var count=$(this).parent().find('#count_like');
				count.html(count_like+1);
				$(this).attr('id', 'dislike');
				$(this).html('Bỏ vote');
				$.post('{{url('qa/ajax/like')}}', {answer_comment_id:answer_comment_id}, function(data, textStatus, xhr) {
					success:
					{
						

					}
				});

			});


			//ấn dislike

			$('#list_cmt').on('click', '#dislike', function(event) {
				var count_like=parseInt($(this).parent().find('#count_like').html());
				var answer_comment_id=$(this).data('answer_comment_id');
				var count=$(this).parent().find('#count_like');
				count.html(count_like-1);
				$(this).attr('id', 'like');
				$(this).html('Vote');
				$.post('{{url('qa/ajax/dislike')}}', {answer_comment_id:answer_comment_id}, function(data, textStatus, xhr) {
					success:
					{
						

					}
				});

			});

			//edit question
			$('#edit-question').on('click',function(event) {
				var question_id = $('#question_id').val();
				var title = $('#question_title_edit').val();
				var content = CKEDITOR.instances.question_content_edit.getData();

				$.post('{{url('qa/ajax/edit')}}',{question_id:question_id,title:title,content:content},function(data,textStatus,xhr) {
					success: {
						$('#question-edit-dialog').modal('hide');
						if (data.is_resolved == true) {
							$('#resolve').html('Chưa được trả lời');
							$('#question-title').html(data.question_title +' <span class="glyphicon glyphicon-ok-sign"></span>');
						} else {
							$('#resolve').html('Đã được trả lời');
							$('#question-title').html(data.question_title +' <span style="color: red;" class="glyphicon glyphicon-question-sign"></span>');
						}
						$('#question_content').html(data.question_content);
					}
				});
			});

			//change question resolve state
			$('#user-option').on('click','#resolve',function(event){
				var question_id = $('#question_id').val();
				$.post('{{url('qa/ajax/resolve')}}',{question_id:question_id},function(data,textStatus,xhr){
					success:{
						if (data.is_resolved == true) {
							$('#resolve').html('Chưa được trả lời');
							$('#question-title').html(data.question_title +' <span style"color:green;" class="glyphicon glyphicon-ok-sign"></span>');
						} else {
							$('#resolve').html('Đã được trả lời');
							$('#question-title').html(data.question_title +' <span style="color: red;" class="glyphicon glyphicon-question-sign"></span>');
						}
					}
				});
			});
			//delete question
			$("delete-question").on('click',function(event){
				var question_id = $('#question_id').val();
				$.post('{{url('qa/ajax/delete')}}',{question_id:question_id},function(data,textStatus,xhr) {
					success:{
						alert('success');
						$('#question-delete--dialog').modal('hide');
					}
				});
			});

			<!-- Selectbox with search -->
				$(".select-with-search").select2({
					theme: "bootstrap"
				});

				jQuery.validator.addMethod("check_type", function(value, element) {
					return value!='Chọn Thể Loại';
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

 