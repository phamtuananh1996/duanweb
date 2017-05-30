{{-- created by tran.nham on 23.05.2017 --}}
@extends('tests.layout')

@section('test_content')
	<script src="{{ asset('plugins/jquery.validate.js') }}"></script>
	<style type="text/css">
  	 .error{
        font-size: 13px !important;
        color: red !important;
    	}
    
	</style>

	<div class="col-md-8 col-md-offset-2 main-content">
		<h1 class="text-center" style="color:green;">Soạn Đề Thi</h1>
		<hr style="border: solid 1px #9e9e9e;">
		<div class="row">
			<div class="col-md-10 col-md-offset-1" style="background:white; border: solid 1px #e0e0e0 ; margin-bottom: 100px;">
				<form method="POST" action="{{url('/tests/createst1')}}" id="form_test1">
				{{csrf_field()}}
				
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
					<div class="col-md-12">
						<hr style="border-bottom: solid 1px #9e9e9e;">
					</div>
					<div class="col-md-10 col-md-offset-1">
						<div class="form-group pmd-textfield">
							<label for="Small">Tiêu Đề</label>
							<input type="text" required name="title" id="Small" class="form-control" value="">
						</div>	
					</div>
					<div class="col-md-12">
						<hr style="border-bottom: solid 1px #9e9e9e;">
					</div>
					<div class="col-md-4 col-md-offset-1">
						<div class="form-group pmd-textfield">
							<label for="Small">Số Câu Hỏi</label>
							<input type="number" required name="number_of_questions" min="1" class="form-control" value="">
						</div>	
					</div>
					<div class="col-md-4 col-md-offset-2">
						<div class="form-group pmd-textfield">
							<label for="Small">Tổng Thời Gian (Phút)</label>
							<input type="number" required name="total_time" min="1"  class="form-control" value="">
						</div>	
					</div>
					<div class="col-md-12">
						<hr style="border-bottom: solid 1px #9e9e9e;">
					</div>
					<div class="col-md-10 col-md-offset-1">
						<div class="form-group pmd-textfield">
							<label style="color:#4B515D; margin-top: 15px; margin-right: 20px;" for="Small">Dạng Đề</label>
							<label class="radio-inline pmd-radio pmd-radio-ripple-effect" style="margin-bottom: 5px;">
								<input type="radio"  name="test_type" id="inlineRadio1" value="0">
								<span for="inlineRadio1">Trắc Nghiệm</span>
							</label>
							<label class="radio-inline pmd-radio pmd-radio-ripple-effect" style="margin-bottom: 5px;">
								<input type="radio" checked name="test_type" id="inlineRadio2" value="1">
								<span for="inlineRadio2">Tự Luận</span>
							</label>
						</div>
					</div>
					<div class="col-md-12">
						<hr style="border-bottom: solid 1px #9e9e9e;">
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
					<div class="col-md-12">
						<hr style="border-bottom: solid 1px #9e9e9e;">
					</div>
					<div class="col-md-4 col-md-offset-5" style="margin-top: 20px; margin-bottom: 20px;">
						<button type="submit" class="btn pmd-ripple-effect btn-primary"> Tiếp Tục </button >
					</div>
				</form>
			</div>
			
		</div>
	</div>
	<script type="text/javascript">
	$(document).ready(function() {

		<!-- Selectbox with search -->
		$(".select-with-search").select2({
			theme: "bootstrap"
		});

		 jQuery.validator.addMethod("check_type", function(value, element) {
        	return value!='Chọn Thể Loại';
   			});

		$('#form_test1').validate(
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
	
	});
</script>
@endsection