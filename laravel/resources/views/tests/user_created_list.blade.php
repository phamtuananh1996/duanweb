{{-- created by tran.nham on 31.05.2017 show all list the tests be created by user--}}
@extends('tests.layout')

@section('test_content')
	<div class="col-md-7 col-md-offset-1 main-content">
		<nav class="navbar navbar-light teal lighten-5 section-title">
			<h3 >Danh sách đề thi bạn đã tạo</h3>
		</nav>
		@if($listTests)
			<ul class="list-group pmd-z-depth pmd-list pmd-card-list" style="box-shadow: none;">
				@foreach ($listTests as $test)
				<li class="list-group-item">
					<a href="{{url('/tests/show/'.$test->id)}}" class="list-group-item list-group-item-action">
						<p class="hoc2h-list-heading">{{$test->title}}</p>
						<p class="hoc2h-list-subtext">{{$test->created_at->toDateTimeString()}} | Đăng tại <strong>{{$test->category->title}}</strong> | 
						 	@if($test->state == 1)
								Đã đăng lên
							@else
								Chưa đăng lên
							@endif
						</p>
					</a>
				</li>
				@endforeach
			</ul>
		@endif
	</div>	
	@include('tests.sidebar')
	<script type="text/javascript" language="javascript" src="{{asset('pmd/components/custom-scrollbar/js/jquery.mCustomScrollbar.js')}}"></script>
	<script type="text/javascript">
		
	</script>>
@endsection