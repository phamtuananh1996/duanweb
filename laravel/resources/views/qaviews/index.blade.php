{{-- created by tran.nham on 26.05.2017 --}}
@extends('qaviews.layout')

@section('qa_content')	
	<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
	<div class="col-md-8 col-md-offset-1" style="background: #fff;height: 500px;">	<!--main content-->
		@if(Route::has('login'))
			@if(Auth::check())
				<div class="col-md-12" style="background: #fff; margin-top: 20px; margin-bottom: 5px; padding-bottom: 10px; border-bottom: solid 1px #81c784;">
					<div class="media-left" style="margin-top: 10px;">
						@if (Auth::user()->avatar)
							<img src="{{ asset('') }}/images/users/{{Auth::user()->avatar}}" width="30" height="30" alt="avatar">
						@else
							<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT2-dYlakPdqfKcuptmGaAsh1ynwhzFDohsAioI4Ek_Cb7ecw_s" width="30" height="30" alt="avatar">
						@endif
					</div>
					<div class="media-body media-middle">
						<a style="font-size: 16px;" href="#">{{Auth::user()->user_name}}</a><br>
					</div>
					<button style="margin-left:-10px;margin-top: 10px;" data-target="#form-dialog" data-toggle="modal" class="btn pmd-btn-flat pmd-ripple-effect btn-link" type="button">Đặt câu hỏi của bạn</button>
					<div tabindex="-1" class="modal fade" id="form-dialog" style="display: none;" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header pmd-modal-bordered">
									<button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
									<h2 class="pmd-card-title-text">Đặt câu hỏi</h2>
								</div>
								<div class="modal-body">
									<form class="form-horizontal" method="POST" action="{{url('/qa/create')}}">
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
										<div class="form-group pmd-textfield pmd-textfield-floating-label">
											<label>Chọn Mục/Thể Loại</label>
											<select class="select-with-search form-control pmd-select2" name="category">
												<option>Chọn Thể Loại</option>
												<option>Chọn Thể Loại</option>	
											</select>
										</div>
										<div class="form-group pmd-textfield pmd-textfield-floating-label">
											<label for="title">Tiêu đề</label>
											<input type="text" class="mat-input form-control" id="mobil" value="">
										</div>
										<div class="form-group pmd-textfield pmd-textfield-floating-label">
											<p>Nội dung</p>
											<textarea id="question-field" required class="form-control"></textarea>
											<script>
	    									CKEDITOR.replace( 'question-field' );
										</script>
										</div>
										<label class="checkbox-inline pmd-checkbox pmd-checkbox-ripple-effect">
											<input type="checkbox" value="">
											<span class="pmd-checkbox"> Đăng ẩn danh</span> 
										</label>
									</form>
								</div>
								<div class="pmd-modal-action">
									<button data-dismiss="modal"  class="btn pmd-ripple-effect btn-primary" type="submit">Đăng</button>
									<button data-dismiss="modal"  class="btn pmd-ripple-effect btn-default" type="button">Huỷ</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			@endif
		@endif
		<div class="pmd-card pmd-card-media-inline pmd-card-default pmd-z-depth qa-card">
			<div class="post-header">
				<div class="media-left">
		            <a class="avatar-list-img avatar-list-img-custom" href="javascript:void(0);">
		            	<img data-holder-rendered="true" src="http://propeller.in/components/list/img/40x40.png" class="img-responsive" data-src="holder.js/40x40" alt="40x40">
			        </a>
		        </div>
		        <div class="media-body media-middle">
		            <h3 class="list-group-item-heading">Nguyen Van A</h3>
		            <span class="list-group-item-text">Dang luc .... tai...</span>
		        </div>
			</div>
			<div class="pmd-card-media">
				<!-- Card media heading -->
				<div class="media-body">
					<h2 class="pmd-card-title-text" style="color: green;">Can anyone really hack Facebook or gmail? If some to how much extent?</h2>
					<span class="pmd-card-subtitle-text">However, it’s time for the caveat. Hacking is not what many people think it is. You don’t ask your geeky tech person to get into the traffic cam system and they have to break through a few firewalls, guess the right passwords...</span><a href="#">Xem thêm</a><br>
					<button type="button" class="btn pmd-btn-flat pmd-ripple-effect btn-link">5 trả lời</button>
				</div>
				<!--Card action-->
				<div class="pmd-card-actions">
					<!-- Alert with title bar -->
					<button data-target="#complete-dialog" data-toggle="modal" class="btn pmd-btn-flat pmd-ripple-effect btn-info" type="button">Viết trả lời</button>
					<div tabindex="-1" class="modal fade" id="complete-dialog" style="display: none;" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h2 style="border-bottom: solid 1px #bdbdbd; padding-bottom: 10px;" class="pmd-card-title-text">Can anyone really hack Facebook or gmail? If some to how much extent?</h2>
									<div class="post-header">
										<div class="media-left">
											<a class="avatar-list-img avatar-list-img-custom" href="javascript:void(0);">
												<img data-holder-rendered="true" src="http://propeller.in/components/list/img/40x40.png" class="img-responsive" data-src="holder.js/40x40" alt="40x40">
											</a>
										</div>
										<div class="media-body media-middle">
											<h3 class="list-group-item-heading">Nguyen Van A</h3>
											<span class="list-group-item-text">Dang luc .... tai...</span>
										</div>
									</div>
								</div>
								<form class="form-group" method="POST" action="#">
									<div class="modal-body">
										<p>Nội dung</p>
										<textarea id="answer-field" name="content" required class="form-control" placeholder="viết trả lời của bạn"></textarea>
										<script>
	    									CKEDITOR.replace( 'answer-field' );
										</script>	
									</div>
									<div class="pmd-modal-action pmd-modal-bordered text-right">
										<button data-dismiss="modal" class="btn pmd-btn-flat pmd-ripple-effect btn-primary" type="submit">Đăng</button>
										<button data-dismiss="modal" type="button" class="btn pmd-btn-flat pmd-ripple-effect btn-default">Huỷ</button>
									</div>
								</form>
							</div>
						</div>
						</div>
					<button type="button" class="btn pmd-btn-flat pmd-ripple-effect btn-success">Vote | 10</button>
					<button type="button" class="btn pmd-btn-flat pmd-ripple-effect btn-success">Theo dõi | 11</button>
				</div>
			</div>
		</div>
	</div><!--end main content-->
	<div class="col-md-2"> <!--side bar-->
		<div class="row">
			<div class="col-md-11 col-md-offset-1" style="background:#fff; height: 500px; padding-top: 20px;">
				<a class="sidebar-link" href="#">Tốp câu trả lời</a><br>
				<a class="sidebar-link" href="#">Tốp câu hỏi</a><br>
				<a class="sidebar-link" href="#">Bạn đang theo dõi</a><br>
				<a class="sidebar-link" href="#">Câu hỏi của bạn</a>
			</div>
		</div>
	</div><!--end sidebar-->

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