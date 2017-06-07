@extends('tests.layout')

@section('test_content')
	<script src="//cdn.ckeditor.com/4.6.2/full/ckeditor.js"></script>
	<script src="{{ asset('plugins/jquery.validate.js') }}"></script>
	<style type="text/css">
  	 .error{
        font-size: 13px !important;
        color: red !important;
    	}
    
	</style>
	<div class="col-md-8 col-md-offset-2 main-content" style="border-top: none;border: solid 1px green;">
		<h1 class="text-center" style="color:green;">Soạn Đề Thi</h1>
		<hr style="border: solid 1px #9e9e9e;">
		<h4><strong>Tiêu đề:</strong> {{$test->title}}</h4>
		<h4><strong>Danh mục/Thể loại:</strong> {{$test->category->title}}</h4>
		<h4><strong>Dạng đề:</strong> 
		@if ($test->test_type==1)
			Tự luận
		@else
			Trắc nghiệm
		@endif
		</h4>
		<h4><strong>Thời Gian:</strong> {{$test->total_time}} phút</h4>
		<hr style="border-bottom: solid 1px #9e9e9e;">
		<form method="POST" action="{{ route('save_write_test') }}" id="form_test2" novalidate enctype="multipart/form-data">
		{{csrf_field()}}
		<input type="hidden" name="test_id" value="{{$test->id}}" >
			

			<div class="col-md-12" style="margin-top: 20px;">
				<div class="row"> 
				<h3 class="col-md-4" style="margin-top: 20px;">Đề bài</h3> 
					
					<a class="col-md-2 btn pmd-ripple-effect btn-success" id="upload"> Tải tệp lên </a>
				</div>

				<div class="col-md-6" id="documents">
					<div class="form-group pmd-textfield">
						<label for="Small">Tải đề lên</label>
						<input type="file" accept=".docx,.doc,.pdf" id="document" required name="document" >
						 <label id="documents-error" style="display: none" class="error" for="Small"></label>
					</div>	
				</div>

				<div class="form-group pmd-textfield" id="qt">
				   <label id="question-error"  style="display: none" class="error" for="Small"></label>
				  	<textarea class="form-control" name="question" id="question"></textarea>
				  	<script>
    					CKEDITOR.replace('question');
					</script>
				</div>
				
			</div>
			
			<div class="col-md-12" style="margin-top: 20px;">
			<div class="row"> 
				<h3 class="col-md-4" style="margin-top: 20px;">Đáp án/Hướng dẫn giải</h3>
				<a class="col-md-2 btn pmd-ripple-effect btn-success" id="upload_answer"> Tải tệp lên </a>
			</div>
			<div class="col-md-6" id="documents_answer">
					<div class="form-group pmd-textfield">
						<label for="Small">Tải đáp án lên</label>
						<input type="file" accept=".docx,.doc,.pdf" id="document_answer" required name="document_answer" >
						 <label id="documents_answer-error" style="display: none" class="error" for="Small"></label>
					</div>	
				</div>

				<div class="form-group pmd-textfield" id="as">
				 <label id="answer-error" style="display: none" class="error" for="Small"></label>
				  	<textarea class="form-control" id="answer" name="answer"></textarea>

				</div>
				<script>
    				CKEDITOR.replace('answer');
				</script>
			</div>
			<div class="col-md-4 col-md-offset-4" style="margin-top: 20px; margin-bottom: 50px;">
				<a href="cancel/{{$test->id}}" style="margin-left: 10px;" type="button"  class="btn pmd-ripple-effect btn-danger"> Huỷ </a>

				<button type="submit" id="button_question" class="btn pmd-ripple-effect btn-success"> Đăng </button >
				
			</div>
		</form>
		
	</div>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#documents').hide();
			$('#documents_answer').hide();
			$('#form_test2').on('click', '#upload', function(event) {
				$('#qt').hide();
				$('#documents').show();
				$(this).html('Soạn đề');
				$(this).attr('id', 'upload_question');
				$('#button_question').attr('id','button');
				$('#question').removeAttr('name');
				$('#document').attr('name','document');
			});


			$('#form_test2').on('click', '#upload_question', function(event) {
				$('#button').attr('id','button_question');
				$('#documents').hide();
				$('#qt').show();
				$(this).html('Tải đề lên');
				$(this).attr('id', 'upload');
				$('#document').removeAttr('name');
				$('#question').attr('name','question');
			});


			$('#form_test2').on('click', '#upload_answer', function(event) {
				$('#as').hide();
				$('#documents_answer').show();
				$(this).html('Soạn đáp án');
				$(this).attr('id', 'answer');
				$('#answer').removeAttr('name');
				$('#document_answer').attr('name','document_answer');
			});

			$('#form_test2').on('click', '#answer', function(event) {	
				$('#documents_answer').hide();
				$('#as').show();
				$(this).html('Tải đáp án lên');
				$(this).attr('id', 'upload_answer');
				$('#document').removeAttr('name');
				$('#question').attr('name','answer');
			});
		
			$('#form_test2').on('click', '#button_question', function(event) {
				if(CKEDITOR.instances.question.getData()=='')
				{
				
					if(CKEDITOR.instances.question.getData()==''){
						$('#question-error').show();
						$('#question-error').html('Câu hỏi không được để trống !');
					}
					return false;
				}
				else
				{
					return true;
				}
			});

			$('#form_test2').on('click', '#button', function(event) {
				if($('#document').val()=='')
				{
					
					if($('#document').val()==''){
						$('#documents-error').show();
						$('#documents-error').html('Chưa có tệp nào được tải lên !');
					}
					return false;
				}
				else
				{
					return true;
				}
			});
		});



	</script>
@endsection