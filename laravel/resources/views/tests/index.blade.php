{{-- created by tran.nham on 19.05.2017 --}}
@extends('tests.layout')

@section('test_content')
	<div class="row">
		<div class="col-md-9 main-content">
			<div class="section">
				<p class="main-title"><span class="glyphicon glyphicon-folder-open"></span> &nbsp;Đề thi nổi bật</p>
				<ul class="list-group pmd-z-depth pmd-list pmd-card-list" style="box-shadow: none;">
					@foreach($tests as $test)
						@if($test->state == 1)
							<li class="list-group-item">
								<i class="material-icons media-left media-middle">insert_drive_file</i> 
								<div class="media-body" style="border-bottom: dotted 1px green; padding-bottom:5px;">
									<a class="list-group-item-heading test-title" href="{{url('/tests/show/'.$test->id)}}">{{$test->title}}</a>
									<span class="list-group-item-text test-subtext">Đăng bởi <span style="color:green;">{{$test->user->user_name}}</span>  | <span style="color:#FF8800;">{{$test->category->title}}</span> | {{$test->created_at->diffForHumans()}}</span>
								</div>
							</li>
						@endif
					@endforeach
				</ul>
			</div>
		</div>	
		@include('tests.sidebar')
	</div>
	<script type="text/javascript" language="javascript" src="{{asset('pmd/components/custom-scrollbar/js/jquery.mCustomScrollbar.js')}}"></script>
	<script>
		(function($){
			$(window).load(function(){
				$(".content").mCustomScrollbar({
					theme:"minimal"
				});
				// Scrollbar position outside card with buttons
				$("#quick-log-scroll").mCustomScrollbar({
					scrollButtons:{enable:true},
					axis:"y",
					theme:"dark-thick",
					scrollInertia:800,
					scrollbarPosition:"inside"
				});
			});
		})(jQuery);
	</script>
@endsection