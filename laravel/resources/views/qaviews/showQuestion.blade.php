@extends('qaviews.layout')

@section('qa_content')	
	<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
	<div class="col-md-8 col-md-offset-1" style="background: #fff; margin-bottom: 50px;">	<!--main content-->
		@include('qaviews.content_header')
		<div class="pmd-card pmd-card-media-inline pmd-card-default pmd-z-depth qa-card">
			<div class="post-header">
				<div class="media-left">
					<a class="avatar-list-img avatar-list-img-custom" href="javascript:void(0);">
						<img data-holder-rendered="true" src="http://propeller.in/components/list/img/40x40.png" class="img-responsive" data-src="holder.js/40x40" alt="40x40">
					</a>
				</div>
				<div class="media-body media-middle">
					<h3 class="list-group-item-heading">{{$question->user->user_name}}</h3>
					<span class="list-group-item-text">Dang luc .... tai {{$question->category->title}}</span>
				</div>
			</div>
			<div class="pmd-card-media">
				<!-- Card media heading -->
				<div class="media-body">
					<h2 class="pmd-card-title-text" style="color: green;">{{$question->question_title}}</h2>
					<span class="pmd-card-subtitle-text">{!!$question->question_content!!}<br>
					<p style="color:#00695c;">{{$question->answers->count()}} trả lời  |  {{$question->view_count}} lượt xem
						@if($question->is_resolved == true)
							<button class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-success" type="button"><i class="material-icons pmd-sm">check</i></button>
						@else
							@if(Auth::user()->id == $question->user_id)
								<button data-target="#alert-dialog" data-toggle="modal" class="btn btn-sm pmd-btn-raised pmd-ripple-effect btn-primary" type="button">xong</button>
								<div tabindex="-1" class="modal fade" id="alert-dialog" style="display: none;" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-body"> Câu hỏi của bạn đã được trả lời? </div>
												<div class="pmd-modal-action text-right">
													<form method = "POST" action = "{{ url('/qa/resolved') }}">
														<input type="hidden" name="_token" value="{{ csrf_token() }}">
														<input type="hidden" name="question_id" value="{{ $question->id }}">
														<button   class="btn pmd-ripple-effect btn-primary pmd-btn-flat" type="submit">Ok</button>
														<button data-dismiss="modal"  class="btn pmd-ripple-effect btn-default pmd-btn-flat" type="button">Huỷ</button>
													</form>
												</div>
											</div>
										</div>
									
								</div>
							@endif
						@endif
					<p>
				</div>
				<!--Card action-->
				<div class="pmd-card-actions">
					<!-- Alert with title bar -->
					<button data-target="#complete-dialog" data-toggle="modal" class="btn pmd-btn-flat pmd-ripple-effect btn-info" type="button">Viết trả lời</button>
					<div tabindex="-1" class="modal fade" id="complete-dialog" style="display: none;" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h2 style="border-bottom: solid 1px #bdbdbd; padding-bottom: 10px;" class="pmd-card-title-text">{{$question->question_title}}</h2>
									<div class="post-header">
										<div class="media-left">
											<a class="avatar-list-img avatar-list-img-custom" href="javascript:void(0);">
												<img data-holder-rendered="true" src="http://propeller.in/components/list/img/40x40.png" class="img-responsive" data-src="holder.js/40x40" alt="40x40">
											</a>
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
										<textarea id="answer-field" name="content" required class="form-control" placeholder="viết trả lời của bạn"></textarea>
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
					</div>
					<button type="button" class="btn pmd-btn-flat pmd-ripple-effect btn-success">Vote | {{$question->vote_count}}</button>
					<button type="button" class="btn pmd-btn-flat pmd-ripple-effect btn-success">Theo dõi</button>
				</div>
			</div>
		</div>
		<hr style="border-bottom: solid 2px green;">
			<ul class="list-group pmd-z-depth pmd-list pmd-card-list" style="box-shadow: none;">
				@foreach ($question->answers as $answer)
					<li class="list-group-item" >
				        <div class="media-left">
				            <a href="javascript:void(0);" class="avatar-list-img">
				              <img alt="40x40" data-src="holder.js/40x40" class="img-responsive" src="http://propeller.in/components/list/img/40x40.png" data-holder-rendered="true">
				            </a>
				        </div>
				        <div class="media-body">
				            <h3 class="list-group-item-heading">{{$answer->user->user_name}}</h3>
				            <span class="list-group-item-text">trả lời 2 phút trước</span>	
				            <hr style="border-bottom: solid 1px #bdbdbd ;">
				            <p>{!!$answer->content!!}</p>
				            <p style="margin-bottom: 20px; color:#00695c;">{{$answer->vote_count}} vote | 12 bình luận </p>
				             <button style="float:right;" type="button" class="btn pmd-btn-flat pmd-ripple-effect btn-info">Bình luận</button>
				             <button style="float:right;" type="button" class="btn pmd-btn-flat pmd-ripple-effect btn-success">Vote</button>
				        </div>
					</li>
					<hr style="border-bottom: solid 2px green;">
				@endforeach
			</ul>
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
</script>
@endsection