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
				<h2> Đánh giá :</h2>
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
				<button type="button" data-target="#rate-dialog" data-toggle="modal" class="btn btn-sm pmd-btn-raised pmd-ripple-effect btn-primary" style="margin-top:10px; margin-bottom: 30px;">Đánh giá</button>
				<hr style=" border-bottom: solid 1px #bdbdbd ; ">		

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

				<div class="answer-list">
					<ul class="list-group" id="list_cmt">
						<li class="list-group-item">
							<div class="media-left">
								<img class="img-avt" src="http://localhost/duanweb/laravel/public//images/users/1497546017.jpg" alt="avatar">
							</div>
							<div class="media-body" style="border-bottom: solid 1px #eee;">
								<h3 class="list-group-item-heading name-text">phamtuananh</h3>
								<span class="list-group-item-text" id="answer_content" style="color: black;"><p>sdsssds</p></span>
								<input type="hidden" name="answer_id_input_7" value="7">
								<p class="question-sub-info">
									<span id="count_vote_answer">0</span> <span class="glyphicon glyphicon-thumbs-up"></span>&nbsp;&nbsp;
									<span id="answer_comment_count">1</span> &nbsp;<span class="glyphicon glyphicon-comment"></span>&nbsp;&nbsp;
									<span class="created-time">2 ngày trước</span>
									<button class="btn pmd-btn-flat pmd-ripple-effect btn-success" type="button" id="vote_answer" style="margin-bottom:5px;"> Vote</button>
									<a id="show-edit_answer" data-answer_id="7" data-toggle="tooltip" data-placement="top" title="" style="margin-left: 10px;" href="#" data-original-title="Sửa"><span class="material-icons md-dark pmd-xs ">mode_edit</span></a>
									<a data-toggle="tooltip" id="show-delete-answer" data-answer_id="7" data-placement="top" title="" style="margin-left:10px;" href="#" data-original-title="Xoá"><span class="material-icons md-dark pmd-xs ">delete</span></a>
								</p>
							</div>	

							<div id="group_comments">
								<div id="commentfield" style="margin:10px 0px 30px 55px; width: 70%;">
									<input type="hidden" id="answer_id" name="answer_id" value="7">
									<div class="form-group pmd-textfield"> 
										<label class="control-label">Bình luận</label> 
										<textarea style="background: #fff; height: 40px;" id="answer_comment_content" required="" class="form-control"></textarea><span class="pmd-textfield-focused"></span>
									</div>
									<button id="answer_cmt" class="btn pmd-btn-outline pmd-ripple-effect btn-primary">Gửi</button>
								</div>
								<div class="comment-list-item" style="display: none;">
									<div class="media-left">
										<img class="img-avt" src="http://localhost/duanweb/laravel/public//images/users/1497546017.jpg" width="40" height="40" alt="avatar">
									</div>
									<div class="media-body" style="margin-top:10px;">
										<h3 class="list-group-item-heading name-text">phamtuananh</h3>
										<span class="list-group-item-text sub-text" style="color: black;">g</span>	
										<p class="question-sub-info">
											<span id="count_like">0</span> <span class="glyphicon glyphicon-thumbs-up"></span>&nbsp;&nbsp;
											<span class="created-time">2 phút trước</span>
											<button data-answer_comment_id="14" class="btn pmd-btn-flat pmd-ripple-effect btn-success" type="button" id="like" style="margin-bottom:5px;"> Vote</button>

											<a data-answer_comment_id="14" data-toggle="tooltip" id="edit-answer-comment" data-placement="top" title="" style="margin-left: 10px;" href="#" data-original-title="Sửa"><span class="material-icons md-dark pmd-xs ">mode_edit</span></a>

											<a data-answer_comment_id="14" data-toggle="tooltip" id="show-delete-answer-comment" data-placement="top" title="" style="margin-left:10px;" href="#" data-original-title="Xoá"><span class="material-icons md-dark pmd-xs ">delete</span></a>
										</p>
									</div>
								</div>


								
							</div>
						</li>
					</ul>
				</div>
				
			</div>
		</div>
		@include('tests.sidebar')
	</div>
	<script type="text/javascript">

		$(document).ready(function() {

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
		});

	</script>
	@endsection