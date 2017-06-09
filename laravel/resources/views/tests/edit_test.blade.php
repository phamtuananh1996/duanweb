@extends('tests.layout')

@section('test_content')
<script src="{{ asset('js/alert/sweetalert.min.js') }}"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('js/alert/sweetalert.css') }}">
	<script src="{{ asset('plugins/jquery.validate.js') }}"></script>
	<style type="text/css">
   .error{
        font-size: 13px !important;
        color: red !important;
    }
    
	</style>
	<div class="col-md-8 col-md-offset-2 main-content" style="border: solid 1px green; background: white;">
		<h1 class="text-center" style="color:green;">Sửa Đề Thi</h1>
		<hr style="border: solid 1px #9e9e9e;">
		<h4><strong>Tiêu đề: </strong>{{$test->title}}</h4>
		<h4><strong>Danh mục/Thể loại:</strong>{{$test->category->title}} </h4>
		<h4><strong>Dạng đề:</strong> 
			
			@if ($test->test_type==1)
			Tự luận
			@else
			Trắc nghiệm
			@endif
		</h4>
		<h4><strong>Thời Gian:</strong>{{$test->total_time}} phút</h4>
		<hr style="border-bottom: solid 1px #9e9e9e;">
		
		
		<div class="col-md-12" style="margin-top: 20px; margin-bottom: 30px;" id="doc">
			<div class="col-md-12">
				<form id="form">
					<div class="row" id="document">
					@foreach ($test->multiChoiceTests as $multiChoiceTests)
						<form action="" method="post">
							<input type="hidden" name="test_id" value="{{$test->id}}">
							<div class="col-md-12">
								<div class="row">

									<div class="col-md-8">
										<div class="form-group pmd-textfield">
											<label for="Small">Câu Hỏi :</label>
											<input type="text" required name="title"  class="form-control" value="{{$multiChoiceTests->title}}">
										</div>	
									</div>
									
									<div class="col-md-2">
										<div class="form-group pmd-textfield">
											<label for="Small">Điểm :</label>
											<input type="number" name="max_point"  class="form-control" value="">
										</div>	
									</div>		
									<div class="col-md-2"> <a class="btn btn-danger" id="delete"> Xóa </a> </div>	
								</div>
								<div id="group_answer">	
								<div class="row" id="answer">
								@foreach ($multiChoiceTests->answers as $answers)
											
										
									
										<div class="row">
											<div class="col-md-7 col-md-offset-1" >
												<div class="form-group pmd-textfield">
													<label for="Small">Đáp Án :</label>
													<input type="text" name="answer[1]" required class="form-control" value="{{$answers->title}}">
												</div>	
											</div>

											<div class="col-md-3" style="margin-top:15px;">
												<div class="checkbox pmd-default-theme">
													<label class="radio-inline pmd-radio pmd-radio-ripple-effect" style="margin-bottom: 5px;">
														<input type="radio" @if ($answers->is_answer)
															checked 
														@endif  name="is_correct" value="1">

														<span for="is_correct">đáp án đúng</span>
													</label>
												</div>
											</div>
										</div>
										

									
									@endforeach	
									</div>
								</div>
								<div class="row" style="margin-bottom: 50px">
									<div class="col-md-4 col-md-offset-1">
										<a class="btn pmd-ripple-effect btn-default" id="addAnswer" data-id=''>
											Thêm câu trả lời
										</a>
									</div>

								</div>	

							</div>

						</form>
						@endforeach
					</div>
				</form>
				<div class="col-md-12">
					<a class="btn pmd-btn-raised pmd-ripple-effect btn-primary" id="addQuestion">		
						Thêm câu hỏi
					</a>

					<button class="btn pmd-btn-raised pmd-ripple-effect btn-success pull-right" id="submit">		
						Hoàn Thành
					</button>
				</div>	

			</div>

		</div>			
	</div>
	<script type="text/javascript">


	$(document).ready(function() {
		var count=1;
	
		$('#doc').on('click', '#addQuestion', function(event) {
			count++;
			addQuestion(count);

		});


		$('#doc').on('click', '#delete', function(event) {

			$(this).parent().parent().parent().remove();



		});

		$('#doc').on('click', '#delete_answer', function(event) {
			
			
			
			if($(this).parent().parent().parent().find('#is_correct').is(":checked"))
			{
				$(this).parent().parent().parent().parent().find('#is_correct').prop({
					'checked': 'checked',	
				});
			}
			

			$(this).parent().parent().parent().remove();

		});

		$('#doc').on('click', '#addAnswer', function(event) {

			var number=$(this).parent().parent().parent().parent().find('input:last').val();
			
			addAnswer($(this).parent().parent().parent().find('#answer'),$(this).data('id'),++number);

		});

		$('#doc').on('click', '#submit', function(event) {

			swal({
				title: "Bài test sẽ được gửi đi",
				text: "Bạn có chắc muốn gửi đi",
				type: "info",
				showCancelButton: true,
				closeOnConfirm: false,
				showLoaderOnConfirm: true,
			},
			function(){
				$('form').each(function(index, el) {
				$.ajax({
					url: 'ajax/savetests',
					method:'post',
					data: $(this).serialize(), 
					async: false, 

				});
				 
				 if($("form").length == index+1) {
				 	setTimeout(function(){
				 		swal({
				 			title: "Tạo đề thi thành công!",
				 			text: "click để đến bài test!",
				 			type: "success",
  							confirmButtonText: "Đến bài test!",
 							closeOnConfirm: false
				 		},
				 		function(){
  							window.location.href='../tests';
							});

				 	}, 2000);

   				 }

   				});

			});


			//


	});

			});
	function addQuestion(count) {
		$('#document').append('<form action="" method="post"> <input type="hidden" name="test_id" value="{{$test->id}}"><div class="col-md-12"> <div class="row"> <div class="col-md-8"> <div class="form-group pmd-textfield"> <label for="Small">Câu Hỏi :</label> <input type="text" required name="title"  class="form-control" value=""> </div> </div> <div class="col-md-2"> <div class="form-group pmd-textfield"> <label for="Small">Điểm :</label> <input type="number" name="max_point" class="form-control" value=""> </div> </div><div class="col-md-2"> <a class="btn btn-danger" id="delete"> Xóa </a> </div>	 </div> <div id="group_answer"> <div class="row" id="answer"> <div class="row"> <div class="col-md-7 col-md-offset-1" > <div class="form-group pmd-textfield"> <label for="Small">Đáp Án :</label> <input type="text" required name="answer[1]" class="form-control" value=""> </div> </div> <div class="col-md-3" style="margin-top:15px;"> <div class="checkbox pmd-default-theme"> <label class="radio-inline pmd-radio pmd-radio-ripple-effect" style="margin-bottom: 5px;"> <input type="radio" checked  name="is_correct" value="1"><span class="pmd-radio-label">&nbsp;</span> <span for="is_correct">đáp án đúng</span> </label> </div> </div> </div> <div class="row"> <div class="col-md-7 col-md-offset-1" > <div class="form-group pmd-textfield"> <label for="Small">Đáp Án :</label> <input type="text" required name="answer[2]" class="form-control" value=""> </div> </div> <div class="col-md-4" style="margin-top:15px;"> <div class="checkbox pmd-default-theme"> <label class="radio-inline pmd-radio pmd-radio-ripple-effect" style="margin-bottom: 5px;"> <input type="radio" value="2" name="is_correct" ><span class="pmd-radio-label">&nbsp;</span> <span for="is_correct">đáp án đúng</span> </label> </div> </div> </div> </div> </div> <div class="row" style="margin-bottom: 50px"> <div class="col-md-4 col-md-offset-1"> <a class="btn pmd-ripple-effect btn-default" id="addAnswer" data-id='+count+'> Thêm câu trả lời </a> </div> </div> </div> </form>'); $("html, body").animate({ scrollTop: $(document).height() }, "slow"); }


	function addAnswer(tag,count,number) {

		tag.append('<div class="row"> <div class="col-md-7 col-md-offset-1" > <div class="form-group pmd-textfield"> <label for="Small">Đáp Án :</label> <input type="text" required name="answer['+number+']" class="form-control" value=""> </div> </div> <div class="col-md-4" style="margin-top:15px;"> <div class="checkbox pmd-default-theme"> <label class="radio-inline pmd-radio pmd-radio-ripple-effect" style="margin-bottom: 5px;"> <input type="radio"  name="is_correct" value="'+number+'"><span class="pmd-radio-label">&nbsp;</span> <span for="is_correct">đáp án đúng</span> </label> <a class="btn btn-danger" id="delete_answer"> Xóa </a> </div> </div> </div>');

	}

	</script>
@endsection