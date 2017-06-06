{{-- created by tran.nham on 19.05.2017 --}}
@extends('tests.layout')

@section('test_content')
<div class="col-md-7 col-md-offset-1 main-content">
	<nav class="navbar navbar-light teal lighten-5 section-title">
		<h3 >Đề Thi Nổi Bật  <span class="badge red">Hot</span></h3>
	</nav>
	<div class="component-box hot-test-scroll-box "> <!--hot tests scrollbar-->
		<div class="pmd-card pmd-z-depth pmd-card-custom-form">
			<div class="pmd-card-body"> 
				<div id="hot-test-scroll" class="pmd-scrollbar">
					<div class="list-group" style="margin-top: 10px;">
						@foreach($tests as $test)
							@if($test->state == 1)
								<a href="{{url('/tests/show/'.$test->id)}}" class="list-group-item list-group-item-action">
									<p class="hoc2h-list-heading">{{$test->title}}</p>
									<p class="hoc2h-list-subtext">Đăng bởi {{$test->user->name}}  | {{$test->category->title}} | 2 giờ trước</p>
								</a>
							@endif
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
	<nav class="navbar navbar-light section-title"">
		<h3>Đề Thi Mới Ra  <span class="badge green">New</span></h3>
	</nav>
	<div class="component-box hot-test-scroll-box "> <!--hot tests scrollbar-->
		<div class="pmd-card pmd-z-depth pmd-card-custom-form">
			<div class="pmd-card-body"> 
				<div id="new-test-scroll" class="pmd-scrollbar">
					<div class="list-group" style="margin-top: 10px;">
						@foreach($tests->sortBydesc('id') as $test)
							<a href="{{url('/tests/show/'.$test->id)}}" class="list-group-item list-group-item-action">
								<p class="hoc2h-list-heading">{{$test->title}}</p>
								<p class="hoc2h-list-subtext">Đăng bởi {{$test->user->name}}  | {{$test->category->title}} | {{$test->created_at->toDateTimeString()}}</p>
							</a>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</div>	
@include('tests.sidebar')
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
			$("#hot-test-scroll").mCustomScrollbar({
				axis:"y",
				scrollInertia:800,
				scrollButtons:{enable:true},
				theme:"dark-thick",
				scrollbarPosition:"inside"
			});
			$("#new-test-scroll").mCustomScrollbar({
				axis:"y",
				scrollInertia:800,
				scrollButtons:{enable:true},
				theme:"dark-thick",
				scrollbarPosition:"inside"
			});
		});
	})(jQuery);
</script>
@endsection