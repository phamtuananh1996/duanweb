@if(Route::has('login'))
			@if(Auth::check())
				<div class="col-md-12" style="background: #00C851; margin-top: 20px; margin-bottom: 20px; padding-bottom: 10px; border-bottom: solid 1px #81c784; padding-top:10px;">
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
					<button style="margin-left:-10px;margin-top: 10px; font-size: 18px;" data-target="#form-dialog" data-toggle="modal" class="btn pmd-btn-flat pmd-ripple-effect btn-link" type="button">Đặt câu hỏi của bạn</button>
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
										<div class="form-group pmd-textfield pmd-textfield-floating-label">
											<label>Chọn Mục/Thể Loại</label>
											<select class="select-with-search form-control pmd-select2" name="category">
												<option>Chọn Thể Loại</option>
												@foreach ($categories as $category)
													<option value="{{$category->id}}"> {{$category->title}}</option>
												@endforeach
											</select>
										</div>
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