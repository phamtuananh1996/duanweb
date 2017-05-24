{{-- created by tran.nham on 24.05.2017 --}}
@extends('tests.layout')
@section('test_content')
	<script src="//cdn.ckeditor.com/4.6.2/basic/ckeditor.js"></script>
	<div class="col-md-7 col-md-offset-1 main-content">
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
				<p><strong>Thời gian: </strong>{{$test->total_time}} phút</p>
				@if($test->level == 1)
					<p><strong>Độ khó: </strong>Dễ</p>
				@else
					@if($test->level == 2)
						<p><strong>Độ khó: </strong>Trung bình</p>
					@else
						<p><strong>Độ khó: </strong>Khó</p>
					@endif
				@endif
				<p><strong>Số người đã làm: </strong>{{$test->user_test_count}}</p>
			</div>
			<form class="form-group" method="GET" action ="#">
				<div class="col-md-2 col-md-offset-5" style="margin-top: 30px; margin-bottom: 30px;">
					<button type="submit" class="btn btn-primary"> Vào làm bài </button >
				</div>
			</form>
		</div>
		<h2>Bình luận</h2>
		<hr style=" border-bottom: solid 1px #007E33; ">		
			<button type="button" onclick="showCommentField()" class="btn pmd-btn-outline pmd-ripple-effect btn-primary" style="margin-top: 20px; margin-bottom: 10px;"> Viết bình luận </button >
			<div id="commentField" class="form-group pmd-textfield" style="display: none;">
				<form>
					<label class="control-label"></label>
  					<textarea id="comment-field" name="content" required class="form-control"></textarea>
  					<button type="button" class="btn btn-sm pmd-btn-raised pmd-ripple-effect btn-primary" style="margin-top:10px; margin-bottom: 30px;">Gửi</button>
				</form>	
  				<script>
    				CKEDITOR.replace( 'comment-field' );
				</script>	
			</div>
			<ul class="list-group pmd-z-depth pmd-list pmd-card-list" style="box-shadow: none; background: #fafafa;">
				@foreach($test->comments as $comment)
			    <li class="list-group-item">
			        <div class="media-left">
			        	@if($comment->user->avatar)
				            <a class="avatar-list-img avatar-list-img-custom" href="javascript:void(0);" style="margin-top: 10px;">
				                <img data-holder-rendered="true" src="{{ asset('') }}/images/users/{{$comment->user->avatar}}" class="img-responsive" data-src="holder.js/40x40" alt="40x40">
				            </a>
				        @else
				        	 <a class="avatar-list-img avatar-list-img-custom" href="javascript:void(0);" style="margin-top: 10px;">
				                <img data-holder-rendered="true" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT2-dYlakPdqfKcuptmGaAsh1ynwhzFDohsAioI4Ek_Cb7ecw_s" class="img-responsive" data-src="holder.js/40x40" alt="40x40">
				            </a>
				        @endif
			        </div>
			        <div class="media-body media-middle">
			        	@if($comment->user->name)
			            <p><h3 class="list-group-item-heading" style="color: green;">{{$comment->user->name}}</h3> <i style="color: #616161; font-size: 12px;">{{$comment->created_at->toDayDateTimeString()}}</i></p>
			            @else
			            	<p><h3 class="list-group-item-heading" style="color: green;">{{$comment->user->user_name}}</h3> <i style="color: #616161; font-size: 12px;">{{$comment->created_at->toDayDateTimeString()}}</i></p>
			            @endif
			            <span class="list-group-item-text" style="color: #424242; font-size: 15px;">{{$comment->content}}</span>
			        </div>
			        <hr style=" border-bottom: solid 1px #bdbdbd ; ">
			    </li>
			    @endforeach
			</ul>
	</div>
	@include('tests.sidebar')

	<script type="text/javascript">
		function showCommentField() {
			var show = document.getElementById('commentField');
			if (show.style.display == "none") {
				show.style.display = "block";
			} else {
				show.style.display = "none";
			}

		}
	</script>
@endsection