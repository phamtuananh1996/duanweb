@extends('qaviews.layout')

@section('qa_content')	

<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script src="{{ asset('plugins/jquery.validate.js') }}"></script>
<div class="col-md-8 col-md-offset-1" style="margin-bottom: 50px;background: white;">	<!--main content-->

	@include('qaviews.content_header')
	<!--tags-->
	<div class="pmd-chip pmd-chip-no-icon">Toan 11 <a class="pmd-chip-action" href="javascript:void(0);">
		<i class="material-icons">close</i></a>
	</div>
	<div class="pmd-chip pmd-chip-no-icon">kiến thức lớp 11 <a class="pmd-chip-action" href="javascript:void(0);">
		<i class="material-icons">close</i></a>
	</div>
	<!--question detail-->
	<div class="pmd-card pmd-card-media-inline pmd-card-default pmd-z-depth qa-show" 
	style="background:#eceff1; margin-top: 20px;">
		<!--Question header-->
		<div class="post-header">
			<div class="media-left">
				@if ($question->user->avatar)
                    <img src="{{ asset('') }}/images/users/{{$question->user->avatar}}" width="40" height="40" alt="avatar">
                @else
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT2-dYlakPdqfKcuptmGaAsh1ynwhzFDohsAioI4Ek_Cb7ecw_s" width="40" height="40" alt="avatar">
                @endif
			</div>
			<div class="media-body media-middle">
				<h3 class="list-group-item-heading">{{$question->user->user_name}}</h3>
				<span class="list-group-item-text">Dang luc .... tai {{$question->category->title}}</span>
			</div>
		</div><!--Question header-->
		<!--Question body-->
		<div class="pmd-card-media" style="background: #fff;" id ="qes-body">
			<div class="media-body">
				<h2 class="pmd-card-title-text" style="color: green; margin-bottom: 20px;margin-top: 20px;">{{$question->question_title}}</h2>
				<span class="pmd-card-subtitle-text">{!!$question->question_content!!}<br>
					<p style="color:#00695c; font-size: 13px;">{{$question->answers->count()}} trả lời | {{$question->vote_count}} vote  |  {{$question->view_count}} lượt xem
						@if($question->is_resolved == true)
							<button class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-success" type="button"><i class="material-icons pmd-sm">check</i></button>
						@else
							@if(Auth::user()->id == $question->user_id)
								<button data-target="#done-dialog" data-toggle="modal" class="btn btn-sm pmd-btn-raised pmd-ripple-effect btn-primary" type="button" style="margin-left: 10px;">xong</button>
								<div tabindex="-1" class="modal fade" id="done-dialog" style="display: none;" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-body"> Câu hỏi của bạn đã được trả lời? </div>
											<div class="pmd-modal-action text-right">
												<form method = "POST" action = "{{ url('/qa/resolved') }}">
													<input type="hidden" name="_token" value="{{ csrf_token() }}">
													<input type="hidden" name="question_id" value="{{ $question->id }}">
													<button   class="btn pmd-ripple-effect btn-primary pmd-btn-flat" type="submit">OK</button>
													<button data-dismiss="modal"  class="btn pmd-ripple-effect btn-default pmd-btn-flat" type="button">Huỷ</button>
												</form>
											</div>
										</div>
									</div>
								</div>
							@endif
						@endif
					</p>
				</span>
			</div>
			<!--question actions-->
			<div class="pmd-card-actions">
				<!-- answer alert-->
				<button data-target="#answer-dialog" data-toggle="modal" class="btn pmd-btn-flat pmd-ripple-effect btn-info" type="button">Viết trả lời</button>
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
			                           		 @else
			                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT2-dYlakPdqfKcuptmGaAsh1ynwhzFDohsAioI4Ek_Cb7ecw_s" width="40" height="40" alt="avatar">
			                                @endif
		                           		 @endif
									</div>
									<div class="media-body media-middle">
										<h3 class="list-group-item-heading">{{Auth::user()->user_name}}</h3>
										<span class="list-group-item-text">Học {{Auth::user()->class}}</span>
									</div>
								</div>
							</div>
							<form class="form-group" method="POST" action="{{url('/qa/answer')}}">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<input type="hidden" name="question_id" value="{{$question->id}}">
								<div class="modal-body">
									<p>Nội dung</p>
									<textarea id="answer-field" name="content" required class="form-control"></textarea>
									<script>
										CKEDITOR.replace( 'answer-field' );
									</script>	
								</div>
								<div class="pmd-modal-action pmd-modal-bordered text-right">
									<button  class="btn pmd-btn-flat pmd-ripple-effect btn-primary" type="submit">Đăng</button>
									<button data-dismiss="modal" type="button" class="btn pmd-btn-flat pmd-ripple-effect btn-default">Huỷ</button>
								</div>
							</form>
						</div>
					</div>
				</div><!--answer alert-->
				<!--actions button-->
				<button type="button" class="btn pmd-btn-flat pmd-ripple-effect btn-success"> Vote </button >
				<button type="button" class="btn pmd-btn-flat pmd-ripple-effect btn-danger"> Theo dõi </button >
				@if(Auth::user()->id == $question->user_id)
					<div class="pull-right" style="margin-bottom: 20px;">
						<span class="dropdown pmd-dropdown dropup clearfix">
							<button class="btn btn-sm pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-primary" type="button" id="dropdownMenuTopLeft" data-toggle="dropdown" aria-expanded="true"><i class="material-icons pmd-sm">more_vert</i></button>
							<ul aria-labelledby="dropdownMenu3" role="menu" class="dropdown-menu pmd-dropdown-menu-top-left">
								<li role="presentation"><button  data-target="#move-dialog" data-toggle="modal" type="button" class="btn pmd-ripple-effect btn-link">Di chuyển chủ đề </button ></li>
								<li role="presentation"><button  data-target="#delete-dialog" data-toggle="modal" type="button" class="btn pmd-ripple-effect btn-link"> Xoá câu hỏi </button ></li>
								<li role="presentation"><button data-target="#question-edit-dialog" data-toggle="modal" class="btn pmd-ripple-effect btn-link" type="button" >Sửa câu hỏi</button></li>
							</ul>
						</span>
					</div>
				@endif
				<div tabindex="-1" class="modal fade" id="question-edit-dialog" style="display: none;" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
							<h2 class="pmd-card-title-text">Sửa câu hỏi</h2>
							</div>
							<div class="modal-body">
								<form class="form-horizontal" method ="POST" action="{{url('/qa/edit')}}">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<input type="hidden" name="question_id" value="{{$question->id}}">
									<div class="form-group pmd-textfield pmd-textfield-floating-label">
										<label for="edit_title">Tiêu đề</label>
										<input type="text" class="mat-input form-control" id="edit_title" name="edit_title" value="{{$question->question_title}}">
										<span class="help-text" style="color:red;">Bắt buộc!</span> 
									</div>
									<p>Nội dung</p>
									<textarea id="content-edit-field" name="edit_content" required class="form-control">{{$question->question_content}}</textarea>
									<script>
										CKEDITOR.replace( 'content-edit-field' );
									</script>	
									<div class="pmd-modal-action pmd-modal-bordered text-right">
										<button class="btn pmd-btn-flat pmd-ripple-effect btn-primary" type="submit">Lưu lại</button>
										<button data-dismiss="modal" type="button" class="btn pmd-btn-flat pmd-ripple-effect btn-default">huỷ bỏ</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div><!--question actions-->
		</div><!--question body-->
	</div><!--question detail-->
	<!--Answers list-->
	<div class="answer-list" style="background: #f5f5f5;">
		<ul class="list-group pmd-z-depth pmd-list pmd-card-list" style="box-shadow: none;padding-left: 30px;background: #f5f5f5;">
			@if($question->answers->count())
			@foreach ($question->answers as $answer)
			<li class="list-group-item" style="background: #f5f5f5;">
				<div class="media-left">
					@if ($answer->user->avatar)
                        <img src="{{ asset('') }}/images/users/{{$answer->user->avatar}}" width="40" height="40" alt="avatar">
                    @else
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT2-dYlakPdqfKcuptmGaAsh1ynwhzFDohsAioI4Ek_Cb7ecw_s" width="40" height="40" alt="avatar">
                    @endif
				</div>
				<div class="media-body">
					<h3 class="list-group-item-heading">{{$answer->user->user_name}}</h3>
					<span class="list-group-item-text" style="font-size: 12px;"><i><strong>Học {{$answer->user->class}}</strong> đã trả lời 2 phút trước</i></span>	
					<hr style="border-bottom: solid 1px #bdbdbd ;">
					<p>{!!$answer->content!!}</p>
					<p style="color:#00695c; font-size: 13px;"><a href="#">{{$answer->vote_count}} vote </a>| {{$answer->comments->count()}} bình luận </p>
					<div id="commentfield">
						<form method="POST" action="{{url('/qa/answer/comment')}}" class="form-group" id="addCommentForm">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<input type="hidden" name="answer_id" value="{{ $answer->id}}">
							<div class="form-group pmd-textfield"> 
								<label class="control-label">Viết bình luận</label> 
								<textarea style="background: #fff;" rows="2" name="comment_content" required class="form-control"></textarea>
							</div>
							<button type="submit" class="btn btn-sm pmd-btn-raised pmd-ripple-effect btn-primary">Gửi</button>
						</form>
					</div>
				</div>
				
				@foreach($answer->comments as $comment)
					<div class="comment-list" style="margin-left:50px;">
						<div class="media-left">
								@if ($comment->user->avatar)
                                    <img src="{{ asset('') }}/images/users/{{$comment->user->avatar}}" width="40" height="40" alt="avatar">
                           		 @else
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT2-dYlakPdqfKcuptmGaAsh1ynwhzFDohsAioI4Ek_Cb7ecw_s" width="40" height="40" alt="avatar">
                                @endif
						</div>
						<div class="media-body">
							<h3 class="list-group-item-heading">{{$comment->user->user_name}}</h3>
							<span class="list-group-item-text" style="font-size: 12px;"><i><strong>Học {{$comment->user->class}}</strong> đã bình luận 2 phút trước</i></span>	
							<p>{{$comment->content}}</p>
						</div>
						<hr style="border-bottom: solid 1px #e0e0e0">
					</div>

				@endforeach
			</li>
			<hr style="border-bottom: solid 1px green;margin-left: -30px;">
			@endforeach
			@endif
		</ul>
	</div> <!--Answers list-->
</div><!--Main content-->
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