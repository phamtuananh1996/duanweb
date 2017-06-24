@if(Route::has('login'))
	@if(Auth::check())
	<div class="col-md-12 pmd-z-depth question-user">
		<div class="media-left" style="margin-top: 5px;">
			@if (Auth::user()->avatar)
				<img class="img-avt" src="{{ asset('') }}/images/users/{{Auth::user()->avatar}}" width="30" height="30" alt="avatar">
			@endif
		</div>
		<div class="media-body media-middle">
			<a class="name-text" href="#">{{Auth::user()->user_name}}</a><br>
		</div>
		<button style="margin-left: 40px; font-size: 16px;" data-target="#form-dialog" data-toggle="modal" class="btn pmd-btn-flat pmd-ripple-effect btn-link" type="button">Bạn muốn hỏi gì?</button>
		<div tabindex="-1" class="modal fade" id="form-dialog" style="display: none;" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header pmd-modal-bordered">
						<button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
						<h2 class="pmd-card-title-text">Đặt câu hỏi</h2>
					</div>
					<form class="form-horizontal" method="POST" action="{{url('/qa/create')}}">
						<div class="modal-body">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							@include('layouts.categories_selector')
							<div class="form-group pmd-textfield pmd-textfield-floating-label">
								<label for="title">Tiêu đề</label>
								<input name="title" type="text" class="mat-input form-control" id="mobil" value="">
							</div>
							<div class="form-group pmd-textfield pmd-textfield-floating-label">
								<p>Nội dung</p>
								<textarea id="question-field" name="content" required class="form-control"></textarea>
								<script>
									CKEDITOR.replace( 'question-field' );
								</script>
							</div>
							<label class="checkbox-inline pmd-checkbox pmd-checkbox-ripple-effect">
								<input name="as_anonymously" type="checkbox" value="">
								<span class="pmd-checkbox"> Đăng ẩn danh</span> 
							</label>
						</div>
						<div class="pmd-modal-action">
							<button class="btn pmd-ripple-effect btn-primary" type="submit">Đăng</button>
							<button data-dismiss="modal"  class="btn pmd-ripple-effect btn-default" type="button">Huỷ</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	@endif
@endif
