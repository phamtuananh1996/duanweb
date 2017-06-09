{{-- created by tran.nham on 01.06.2017 --}}
@extends('tests.layout')
@section('test_content')
	
<script src="{{ asset('plugins/jquery.validate.js') }}"></script>
<style type="text/css">
   .error{
        font-size: 13px !important;
        color: red !important;
    }
 </style>
	

	<script src="//cdn.ckeditor.com/4.6.2/full/ckeditor.js"></script>
	<div class="row">
		<div class="col-md-10 col-md-offset-1 main-content">
				<div class="test-info">
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
					<p><strong>Số lần đã làm: </strong>{{$test->userTests->count()}}</p>
					@if($test->state == 0)
						<p style="color:#ff4444; font-size: 18px;"> Đề thi này chưa có nội dung...<a href="{{url('tests/createst2/'.$test->id)}}"><u>bổ sung</u></a></p>
						@endif
					<div class="pull-left" >
						<button style="text-align: left;" data-target="#edit-dialog" data-toggle="modal" type="button" class="btn pmd-btn-flat pmd-ripple-effect btn-primary"><span class="glyphicon glyphicon-pencil"></span> Sửa </button >
						<div tabindex="-1" class="modal fade" id="edit-dialog" style="display: none;" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header pmd-modal-bordered">
										<button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
										<h2 class="pmd-card-title-text text-center">Sửa Đề</h2>
									</div>
									<div class="modal-body">
										<form id="submit_edit" class="form-horizontal" method="POST" action="{{url('tests/edit')}}">
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
											<button  class="btn pmd-ripple-effect btn-primary pull-right" type="submit">Lưu thay đổi</button>
											<button data-dismiss="modal" class="btn pmd-ripple-effect btn-default" type="button">Huỷ bỏ</button>
										</form>
									</div>
								</div>
							</div>
						</div>
						@if($test->userTests->count() == 0)
							<button data-target="#delete-dialog" data-toggle="modal" style="text-align: left;" type="button" class="btn pmd-btn-flat pmd-ripple-effect btn-danger"><span class="glyphicon glyphicon-remove"></span> Xoá </button >
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
											<form method="GET" action="{{url('tests/cancel/'.$test->id)}}">
												<button  class="btn pmd-btn-flat pmd-ripple-effect btn-primary" type="submit">Vẫn xoá</button>
												<button data-dismiss="modal" type="button" class="btn pmd-btn-flat pmd-ripple-effect btn-default">Xem lại</button>
											</form>		
										</div>
									</div>
								</div>
							</div>
						@endif
					</div>
				</div>
				@if($test->state == 1)
					@if($test->test_type == 1)
						<div id="content" class="col-md-12" style="background: #fff; border-left: solid 2px green;  border-right: solid 2px green;margin-top: 20px; padding-bottom: 20px;">
							<h2 style="color:green;"><strong><u>Đề bài</u></strong></h2>
							<div id = "test-content">
							@if($test->writingTest->is_document)
							<div class="row">
								<iframe src="http://docs.google.com/gview?url=http://diendankienthuc.com/dieuchinhgiaodien.xlsx&embedded=true"  frameborder="0" class="col-md-12" height="500px"></iframe>
							</div>
							@else
								
								<p>{!!$test->writingTest->content!!}</p>
								
							@endif
							</div>
							<button data-target="#edit-content-dialog" data-toggle="modal" type="button" class="btn pmd-btn-flat pmd-ripple-effect btn-primary"><span class="glyphicon glyphicon-pencil"></span> Sửa đề bài</button >
							<div tabindex="-1" class="modal fade" id="edit-content-dialog" style="display: none;" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<h2 class="pmd-card-title-text text-center">Sửa Đề Bài</h2>
											<hr style="border-top: solid 1px #bdbdbd;">
										</div>
										{{-- <form method="POST" action="{{url('tests/writingTest/edit')}}"> --}}
											<div class="modal-body">
												{{csrf_field()}}
												<input type="hidden" id="wtest_id" value="{{$test->writingTest->id}}">
												<h3 style="margin-top: 20px;">Đề bài</h3>
												<div class="form-group pmd-textfield">
													<label id="answer-error" style="display: none" class="error" for="Small"></label>
													<textarea class="form-control" id="content_field">
													@if ($test->writingTest->is_document)
														
													@else
														{!!$test->writingTest->content!!}
													@endif
														
													</textarea>
												</div>
												<script>
													CKEDITOR.replace('content_field');
												</script>
											</div>
											<div class="pmd-modal-action pmd-modal-bordered text-right">
												<button id="content-submit" class="btn pmd-btn-flat pmd-ripple-effect btn-primary" type="button">Lưu thay đổi</button>
												<button data-dismiss="modal" type="button" class="btn pmd-btn-flat pmd-ripple-effect btn-default">Huỷ bỏ</button>
											</div>
										{{-- </form> --}}
									</div>
								</div>
							</div>
							<div tabindex="-1" class="modal fade" id="upload-dialog" style="display: none;" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header pmd-modal-bordered">
										<button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
										<h2 class="pmd-card-title-text text-center">Sửa Đề</h2>
									</div>
									<div class="modal-body">
										
											<form id="upload_qt" enctype="multipart/form-data" class="form-horizontal
											">
												<input type="hidden" value="{{$test->writingTest->id}}" name="wt_id" id="wt_id">
												<input type="file" required accept=".docx,.doc,.pdf" id="document_qt" name="document_qt" class="form-group">
											</form>

											<button class="btn pmd-ripple-effect btn-primary pull-right" id="save_upload_qt">Lưu thay đổi</button>
											<button data-dismiss="modal" class="btn pmd-ripple-effect btn-default" type="button">Huỷ bỏ</button>
										
									</div>
								</div>
							</div>
						</div>
							<button data-target="#upload-dialog" data-toggle="modal" type="button" class="btn pmd-btn-flat pmd-ripple-effect btn-info"><span class="glyphicon glyphicon-open"></span> Tải lên</button >
						</div>
						<div id = "explan" class="col-md-12" style="background: #fff; border-left: solid 2px green;border-right: solid 2px green;margin-top: 20px; padding-bottom: 20px;">
							<h2 style="color:green;"><strong><u>Gợi ý/Đáp án</u></strong></h2>
							<div id="explan-content">
								@if($test->writingTest->explan)
									@if ($test->writingTest->is_document_answer)
										<iframe src="http://docs.google.com/gview?url={{url('')}}/document/test/{{$test->writingTest->explan}}"  frameborder="0" class="col-md-12" height="500px"></iframe>
									@else
										
											<p>{!!$test->writingTest->explan!!}</p>
										
									@endif
							</div>
									<button data-target="#edit-explan-dialog" data-toggle="modal" type="button" class="btn pmd-btn-flat pmd-ripple-effect btn-primary"><span class="glyphicon glyphicon-pencil"></span> Sửa đáp án</button >
								@else
									<p>chưa có gợi ý và đáp án...!</p>
									<button data-target="#edit-explan-dialog" data-toggle="modal" type="button" class="btn pmd-btn-flat pmd-ripple-effect btn-primary">Bổ sung</button >
								@endif
								<div tabindex="-1" class="modal fade" id="edit-explan-dialog" style="display: none;" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<h2 class="pmd-card-title-text text-center">Sửa gợi ý/Đáp án</h2>
											<hr style="border-top: solid 1px #bdbdbd;">
										</div>
										{{-- <form method="POST" action="{{url('tests/writingTest/edit/explan')}}"> --}}
											<div class="modal-body">
												{{csrf_field()}}
												<div class="form-group pmd-textfield">
													<label id="answer-error" style="display: none" class="error" for="Small"></label>
													<textarea class="form-control" id="explan_field" >
														@if ($test->writingTest->is_document_answer)
														@else
														{!!$test->writingTest->explan!!}
														@endif
														
													</textarea>
												</div>
												<script>
													CKEDITOR.replace('explan_field');
												</script>
											</div>
											<div class="pmd-modal-action pmd-modal-bordered text-right">
												<button id="explan-submit"  class="btn pmd-btn-flat pmd-ripple-effect btn-primary" type="button">Lưu thay đổi</button>
												<button data-dismiss="modal" type="button" class="btn pmd-btn-flat pmd-ripple-effect btn-default">Huỷ bỏ</button>
											</div>
										{{-- </form> --}}
									</div>
								</div>
							</div>
							<div tabindex="-1" class="modal fade" id="upload-explan-dialog" style="display: none;" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header pmd-modal-bordered">
										<button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
										<h2 class="pmd-card-title-text text-center">Sửa gợi ý/đáp án</h2>
									</div>
									<div class="modal-body">
										
											<form id="upload_explan" enctype="multipart/form-data" class="form-horizontal
											">
												<input type="hidden" value="{{$test->writingTest->id}}" name="wt_id" id="wt_id">
												<input type="file" accept=".docx,.doc,.pdf" id="document_explan" name="document_explan" class="form-group">
											</form>

											<button class="btn pmd-ripple-effect btn-primary pull-right" id="save_upload_explan">Lưu thay đổi</button>
											<button data-dismiss="modal" class="btn pmd-ripple-effect btn-default" type="button">Huỷ bỏ</button>
										
									</div>
								</div>
							</div>
						</div>
							<button data-target="#upload-explan-dialog" data-toggle="modal" type="button" class="btn pmd-btn-flat pmd-ripple-effect btn-info"> <span class="glyphicon glyphicon-open"></span> Tải lên</button >
							<input type="hidden" id="wtest_id" value="{{$test->writingTest->id}}">
						</div>
					@else 
						<div class="col-md-12" style="background: #fff; border-left: solid 2px green; margin:20px 0px;">
						<div class="row">
							
							<a href="{{url('tests/edit/test')}}/{{$test->id}}" class="col-md-2" type="button" class="btn pmd-btn-flat pmd-ripple-effect btn-info"></span> Sửa</a>

						</div>
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
	$(document).ready(function(event) {

		 jQuery.validator.addMethod("check_type", function(value, element) {
        	return value!='Chọn Thể Loại';
   			});

		$('#submit_edit').validate(
			{
				rules:{
					category:{
						check_type:true
					},
				},
				messages:
				{
					category:
					{
						check_type:" Chọn 1 thể loại ",
					},

					title:
					{
						required:"Tiêu đề không được để trống!",
					},

					total_time:{
						required:"Tổng thời gian không được để trống!",
						min:"Tổng thời gian phải lớn hơn 0"
					},

					number_of_questions:{
						required:"Số câu hỏi không được để trống!",
						min:"Số câu hỏi phải lớn hơn 0"
					},


				}
			});


		$.validator.addMethod('filesize', function(value, element, param) {
    		return this.optional(element) || (element.files[0].size <= param) 
		});

		//update content
		$('#content').on('click','#content-submit',function(event){

			var wtest_id = $('#wtest_id').val();
			var content = CKEDITOR.instances.content_field.getData();
			if (content == "") {
				//return false
			} else {
				$.post('{{url('tests/writingTest/edit')}}',{wtest_id:wtest_id,content:content},function(data,textStatus,xhr) {
					success:{

						$('#edit-content-dialog').modal('hide');
						$('#test-content').html('<p>'+(data.content)+'</p>')
						
					}
				});
			}
		});
		//update explan
		$('#explan').on('click','#explan-submit',function(event){

			var wtest_id = $('#wtest_id').val();
			var explan = CKEDITOR.instances.explan_field.getData();
			if (explan == "") {
				//return false
			} else {
				$.post('{{url('tests/writingTest/edit/explan')}}',{wtest_id:wtest_id,explan:explan},function(data,textStatus,xhr) {
					success:{
						$('#edit-explan-dialog').modal('hide');
						$('#explan-content').html('<p>'+(data.explan)+'</p>')
						$("html, body").animate({ scrollTop: $(document).height() }, "slow");
					}
				});
			}
		});
	});

	//upload document content
	$('#save_upload_qt').click(function() {

		$('#upload_qt').validate({

			rules: {	
				document_qt: {
					required: true,	
					filesize:4097152 
				},	
			},
			messages: {
				document_qt: {
					required: "Không được để trống trường này",
					filesize: "Kích thước ảnh phải nhỏ hơn 2MB!"
				}
			}
		})
		var formData = new FormData();
            formData.append('document_qt', $('#document_qt')[0].files[0]);
            formData.append('wt_id',$('#wt_id').val());
		if ($('#upload_qt').valid()) 
			{
				$.ajax({
					url: '{{url('tests/writingTest/edit/upload')}}',
					type: 'POST',
					processData: false,
					contentType: false,
					data: formData,
					success: function(result){
						$('#document_qt').val('');
						$('#upload-dialog').modal('hide');
						$('#explan-content').html('<iframe src="http://docs.google.com/gview?url=http://diendankienthuc.com/dieuchinhgiaodien.xlsx&embedded=true"  frameborder="0" class="col-md-12" height="500px"></iframe>')
					}
				});
			}
	});

	$('#save_upload_explan').click(function() {
		$('#upload_explan').validate({

			rules: {	
				document_explan: {
					required: true,	
					filesize:4097152 
				},	
			},
			messages: {
				document_explan: {
					required: "Không được để trống trường này",
					filesize: "Kích thước ảnh phải nhỏ hơn 2MB!"
				}
			}
		})
		var formData = new FormData();
            formData.append('document_explan', $('#document_explan')[0].files[0]);
            formData.append('wt_id',$('#wt_id').val());
		if ($('#upload_explan').valid()) {
				$.ajax({
					url: '{{url('tests/writingTest/edit/upload/explan')}}',
					type: 'POST',
					processData: false,
					contentType: false,
					data: formData,
					success: function(result){
						$('#document_explan').val('');
						$('#upload-explan-dialog').modal('hide');
						$('#explan-content').html('<iframe src="http://docs.google.com/gview?url=http://diendankienthuc.com/dieuchinhgiaodien.xlsx&embedded=true"  frameborder="0" class="col-md-12" height="500px"></iframe>')
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
</script>
@endsection