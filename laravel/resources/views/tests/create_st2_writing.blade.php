@extends('tests.layout')

@section('test_content')
	<div class="col-md-8 col-md-offset-2 main-content">
		<h1 class="text-center" style="color:green;">Tạo Đề Thi</h1>
		<hr style="border: solid 1px #9e9e9e;">
		<h4><strong>Tiêu đề:</strong> abc xyz</h4>
		<h4><strong>Danh mục/Thể loại:</strong> Luyện thi Toán THPT</h4>
		<h4><strong>Dạng đề:</strong> Tự Luận</h4>
		<h4><strong>Thời Gian:</strong> 120 phút</h4>
		<hr style="border-bottom: solid 1px #9e9e9e;">
		<form method="POST" action="#">
			<h3 style="margin-top: 20px;">Soạn Đề</h3>
			<div class="col-md-12" style="margin-top: 20px;">
				<div class="form-group pmd-textfield">
				  	<label class="control-label">Đăt text edit vào đây</label>
				  	<textarea required class="form-control"></textarea>
				</div>
			</div>
			<h3 style="margin-top: 20px;">Đáp án/Hướng dẫn giải</h3>
			<div class="col-md-12" style="margin-top: 20px;">
				<div class="form-group pmd-textfield">
				  	<label class="control-label">Đăt text edit vào đây</label>
				  	<textarea required class="form-control"></textarea>
				</div>
			</div>
			<div class="col-md-4 col-md-offset-5" style="margin-top: 20px; margin-bottom: 50px;">
				<button type="button" class="btn pmd-ripple-effect btn-success"> Đăng </button >
			</div>
		</form>
		
	</div>
@endsection