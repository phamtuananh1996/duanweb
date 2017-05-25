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
		<form method="POST" action="{{ route('save_write_test') }}" id="form_test2" >
		{{csrf_field()}}
		<input type="hidden" name="test_id" value="{{$test->id}}">
			<div class="col-md-12" style="margin-top: 20px;">
			<h3 style="margin-top: 20px;">Đề bài</h3>
				<div class="form-group pmd-textfield">
				   <label id="question-error"  style="display: none" class="error" for="Small"></label>
				  	<textarea class="form-control" name="question" id="question"></textarea>
				</div>
				<script>
    				CKEDITOR.replace('question');
				</script>
			</div>
			
			<div class="col-md-12" style="margin-top: 20px;">
			<h3 style="margin-top: 20px;">Đáp án/Hướng dẫn giải</h3>
				<div class="form-group pmd-textfield">
				 <label id="answer-error" style="display: none" class="error" for="Small"></label>
				  	<textarea class="form-control" id="answer" name="answer"></textarea>

				</div>
				<script>
    				CKEDITOR.replace('answer');
				</script>
			</div>
			<div class="col-md-4 col-md-offset-4" style="margin-top: 20px; margin-bottom: 50px;">
				<a href="cancel/{{$test->id}}" style="margin-left: 10px;" type="button"  class="btn pmd-ripple-effect btn-danger"> Huỷ </a>

				<button type="submit" id="button" class="btn pmd-ripple-effect btn-success"> Đăng </button >
				
			</div>
		</form>
		
	</div>
	<script type="text/javascript">
		$(document).ready(function() {

			$('#button').click(function(event) {
				if(CKEDITOR.instances.answer.getData()==''||CKEDITOR.instances.question.getData()=='')
				{
					if(CKEDITOR.instances.answer.getData()==''){
						$('#answer-error').show();
						$('#answer-error').html('Câu trả lời không được để trống ! ');
					}
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
		});
	</script>
@endsection