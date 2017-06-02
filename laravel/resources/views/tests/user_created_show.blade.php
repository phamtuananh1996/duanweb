{{-- created by tran.nham on 01.06.2017 --}}
@extends('tests.layout')
@section('test_content')
	<script src="//cdn.ckeditor.com/4.6.2/full/ckeditor.js"></script>
	<div class="col-md-10 col-md-offset-1 main-content" style="margin-bottom: 100px;">
		<div class="row">
			<div class="col-md-12" style="border:dotted 1px #007E33; padding: 20px;background: #fafafa;">
				<h1 style="color:green;">{{$test->title}}</h1>
				<hr style=" border-bottom: solid 1px #007E33;">
				<p><strong>Thể loại/Danh mục: </strong>{{$test->category->title}}</p>
				@if($test->test_type == 0)
					<p><strong>Dạng đề:</strong>Trắc nghiệm</p>
				@else
					<p><strong>Dạng đề: </strong>Tự luận</p>
				@endif
				<p><strong>Số câu: </strong>{{$test->number_of_questions}} câu</p>
				<p><strong>Thời gian: </strong>{{$test->total_time}} phút</p>
				@if($test->level == 1)
					<p><strong>Trình độ: </strong>Dễ</p>
				@else
					@if($test->level == 2)
						<p><strong>Trình độ: </strong>Trung bình</p>
					@else
						<p><strong>Trình độ: </strong>Khó</p>
					@endif
				@endif
				<p><strong>Số lần đã làm: </strong>{{$test->user_test_count}}</p>
				@if($test->state == 0)
					<p style="color:#ff4444; font-size: 18px;"> Đề thi này chưa có nội dung...<a href="{{url('tests/createst2/'.$test->id)}}"><u>bổ sung</u></a></p>
					@endif
				<div class="pull-left" >
					<button style="text-align: left;" data-target="#edit-dialog" data-toggle="modal" type="button" class="btn pmd-ripple-effect btn-link"> Sửa </button >
					<div tabindex="-1" class="modal fade" id="edit-dialog" style="display: none;" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header pmd-modal-bordered">
									<button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
									<h2 class="pmd-card-title-text text-center">Sửa Đề</h2>
								</div>
								<div class="modal-body">
									<form class="form-horizontal" method="POST" action="{{url('tests/edit')}}">
										{{csrf_field()}}
										<input type="hidden" name="test_id" value="{{$test->id}}" >
										<div class="col-md-10 col-md-offset-1" style="margin-top: 20px;">
											<div class="form-group pmd-textfield pmd-textfield-floating-label">
												<label>Chọn Mục/Thể Loại</label>
												<select class="select-with-search form-control pmd-select2" name="category">
												<option>Chọn Thể Loại</option>
													@foreach ($categories as $cat)
														<option value="{{$cat->id}}">{{$cat->title}}</option>
													@endforeach
												</select>
											</div>
										</div>
										<div class="col-md-10 col-md-offset-1">
											<div class="form-group pmd-textfield">
												<label for="Small">Tiêu đề</label>
												<input type="text" required name="title" id="Small" class="form-control" value="{{$test->title}}">
											</div>	
										</div>
										<div class="col-md-4 col-md-offset-1">
											<div class="form-group pmd-textfield">
												<label for="Small">Số Câu Hỏi</label>
												<input type="number" required name="number_of_questions" min="1" class="form-control" value="{{$test->number_of_questions}}">
											</div>	
										</div>
										<div class="col-md-4 col-md-offset-2">
											<div class="form-group pmd-textfield">
												<label for="Small">Tổng Thời Gian (Phút)</label>
												<input type="number" required name="total_time" min="1"  class="form-control" value="{{$test->total_time}}">
											</div>	
										</div>
										<div class="col-md-10 col-md-offset-1">
											<div class="form-group pmd-textfield">
												<label style="color:#4B515D; margin-top: 15px; margin-right: 20px;" for="Small">Dạng Đề</label>
												@if($test->test_type == 0)
													<label class="radio-inline pmd-radio pmd-radio-ripple-effect" style="margin-bottom: 5px;">
														<input type="radio" checked  name="test_type" id="inlineRadio1" value="0">
														<span for="inlineRadio1">Trắc Nghiệm</span>
													</label>
													<label class="radio-inline pmd-radio pmd-radio-ripple-effect" style="margin-bottom: 5px;">
														<input type="radio"  name="test_type" id="inlineRadio2" value="1">
														<span for="inlineRadio2">Tự Luận</span>
													</label>
												@else
													<label class="radio-inline pmd-radio pmd-radio-ripple-effect" style="margin-bottom: 5px;">
														<input type="radio" name="test_type" id="inlineRadio1" value="0">
														<span for="inlineRadio1">Trắc Nghiệm</span>
													</label>
													<label class="radio-inline pmd-radio pmd-radio-ripple-effect" style="margin-bottom: 5px;">
														<input type="radio" checked  name="test_type" id="inlineRadio2" value="1">
														<span for="inlineRadio2">Tự Luận</span>
													</label>
												@endif
											</div>
										</div>
										<div class="col-md-10 col-md-offset-1">
											<div class="form-group pmd-textfield pmd-textfield-floating-label">
												<label>Độ Khó</label>
												<select class="select-simple form-control pmd-select2" name="level">
													<option value="1">Dễ</option>
													<option value="2">Trung Bình</option>
													<option value="3">Khó</option>
												</select>
											</div>
										</div>
										<button   class="btn pmd-ripple-effect btn-primary pull-right" type="submit">Lưu thay đổi</button>
										<button data-dismiss="modal" class="btn pmd-ripple-effect btn-default" type="button">Huỷ bỏ</button>
									</form>
								</div>
							</div>
						</div>
					</div>
					@if($test->user_test_count == 0)
						<button data-target="#delete-dialog" data-toggle="modal" style="text-align: left; type="button" class="btn pmd-ripple-effect btn-link"> Xoá </button >
						<div tabindex="-1" class="modal fade" id="delete-dialog" style="display: none;" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h2 class="pmd-card-title-text">Bạn thật sự muốn xoá đề thi này</h2>
									</div>
									<div class="modal-body">
										<p style="color:#ff4444;">Lưu ý rằng khi bạn chọn xoá đề thi, toàn bộ các nội dung liên quan cũng sẽ bị xoá bỏ...!</p>
									</div>
									<div class="pmd-modal-action pmd-modal-bordered text-right">
										<button data-dismiss="modal" class="btn pmd-btn-flat pmd-ripple-effect btn-primary" type="button">Vẫn xoá</button>
										<button data-dismiss="modal" type="button" class="btn pmd-btn-flat pmd-ripple-effect btn-default">Xem lại</button>
									</div>
								</div>
							</div>
						</div>
					@endif
				</div>
			</div>
			@if($test->state == 1)
				@if($test->test_type == 1)
					<div class="col-md-12" style="background: #fff; border-left: solid 2px green;  border-right: solid 2px green;margin-top: 20px; padding-bottom: 20px;">
						<h2 style="color:green;"><strong><u>Đề bài</u></strong></h2>
						@if($test->writingTest->is_document)
						@else
							<p>{!!$test->writingTest->content!!}</p>
						@endif
						<button data-target="#edit-content-dialog" data-toggle="modal" type="button" class="btn pmd-btn-flat pmd-ripple-effect btn-primary"> Sửa đề bài</button >
						<div tabindex="-1" class="modal fade" id="edit-content-dialog" style="display: none;" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header pmd-modal-bordered">
										<button aria-hidden="true" data-dismiss="modal" class="close" type="button">x</button>
										<h2 class="pmd-card-title-text text-center">Sửa Nội Dung</h2>
									</div>
									<div class="modal-body">
										<form class="form-horizontal">
											{{csrf_field()}}
											<h3 style="margin-top: 20px;">Đề bài</h3>
											<div class="form-group pmd-textfield">
												 <label id="answer-error" style="display: none" class="error" for="Small"></label>
												  <textarea class="form-control" id="content" name="content">{!!$test->writingTest->content!!}</textarea>
											</div>
											<script>
								    				CKEDITOR.replace('content');
											</script>
											<button aria-hidden="true" data-dismiss="modal" class="close" type="button">Lưu lại</button>
											<button aria-hidden="true" data-dismiss="modal" class="close" type="button">Huỷ bỏ</button>
										</form>
									</div>
								</div>
							</div>
						</div>
						<button data-target="#edit-dialog" data-toggle="modal" type="button" class="btn pmd-btn-flat pmd-ripple-effect btn-info"> Tải lên</button >
					</div>
					<div class="col-md-12" style="background: #fff; border-left: solid 2px green;border-right: solid 2px green;margin-top: 20px; padding-bottom: 20px;">
						<h2 style="color:green;"><strong><u>Gợi ý/Đáp án</u></strong></h2>
						@if($test->writingTest->is_document)
						@else
							@if($test->writingTest->explan)
							<p>{!!$test->writingTest->explan!!}</p>
							<button data-target="#edit-explan-dialog" data-toggle="modal" type="button" class="btn pmd-btn-flat pmd-ripple-effect btn-primary"> Sửa</button >
							@else
								<p>chưa có gợi ý và đáp án...!</p>
								<button data-target="#edit-explan-dialog" data-toggle="modal" type="button" class="btn pmd-btn-flat pmd-ripple-effect btn-primary">Bổ sung</button >
							@endif
							<div tabindex="-1" class="modal fade" id="edit-explan-dialog" style="display: none;" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header pmd-modal-bordered">
											<button aria-hidden="true" data-dismiss="modal" class="close" type="button">x</button>
											<h2 class="pmd-card-title-text text-center">Sửa Nội Dung</h2>
										</div>
										<div class="modal-body">
											<form class="form-horizontal">
												{{csrf_field()}}
												<h3 style="margin-top: 20px;">Gợi ý/Đáp án</h3>
												<div class="form-group pmd-textfield">
													<label id="answer-error" style="display: none" class="error" for="Small"></label>
													<textarea class="form-control" id="explan" name="explan">{!!$test->writingTest->explan!!}</textarea>
												</div>
												<script>
													CKEDITOR.replace('explan');
												</script>
												<button aria-hidden="true" data-dismiss="modal" class="close" type="button">Lưu lại</button>
												<button aria-hidden="true" data-dismiss="modal" class="close" type="button">Huỷ bỏ</button>
											</form>
										</div>
									</div>
								</div>
							</div>
						@endif
						<button data-target="#edit-dialog" data-toggle="modal" type="button" class="btn pmd-btn-flat pmd-ripple-effect btn-info"> Tải lên</button >
					</div>
				@else 
					<div class="col-md-12" style="background: #fff; border-left: solid 2px green; margin:20px 0px;">
						<h2 style="padding:10px; margin-bottom: 20px; background: #00C851; width: 10%;">Đề Thi</h2>
						@foreach($test->multiChoiceTests as $question)
						<div class="row">
							<div class="col-md-12">
								<p style="color:green; font-size: 18px; ">{{$question->title}}</p>
							</div>
							@foreach($question->answers as $answer)
								<div class="col-md-12" style="margin-left: 20px;">
									<label class="radio-inline pmd-radio pmd-radio-ripple-effect" style="margin-bottom: 20px;">
									<input type="radio" name="test_type" id="inlineRadio1" value="0">
									<span for="inlineRadio1">{{$answer->title}}</span>
								</label>
								</div>
							@endforeach
						</div>
						<hr style="border-top:solid 1px #e0e0e0;">
						@endforeach
					</div>
				@endif
			@endif
		</div>		
	</div>
	<script type="text/javascript">
	$(document).ready(function() {

	});
</script>
@endsection