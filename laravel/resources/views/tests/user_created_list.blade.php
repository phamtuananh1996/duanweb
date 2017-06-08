{{-- created by tran.nham on 31.05.2017 show all list the tests be created by user--}}
@extends('tests.layout')

@section('test_content')
	<div class="row">
		<div class="col-md-9 main-content">
			<div class="section">
				<p class="main-title"><span class="glyphicon glyphicon-folder-open"></span> &nbsp;Danh đề đã tạo</p>
				@if($listTests)
					<ul class="list-group pmd-z-depth pmd-list pmd-card-list" style="box-shadow: none;">
						@foreach ($listTests->sortByDesc('id') as $test)
							<li class="list-group-item" style="padding-bottom: 0px; padding-top: 0px;border-bottom:dotted 1px green;">
								<a href="{{url('tests/user/created/show/'.$test->id)}}" class="list-group-item list-group-item-action">
									<p class="test-title">{{$test->title}}</p>
									<p class="hoc2h-list-subtext">{{$test->created_at->toDateTimeString()}} | Đăng tại <strong>{{$test->category->title}}</strong> | 
									 	@if($test->state == 1)
											<span style="color:#00C851;">Đã xuất bản</span>
										@else
											<span style="color:#ff4444;">Chưa xuất bản</span>
										@endif
									</p>
								</a>
							</li>
						@endforeach
					</ul>
				@endif
			</div>
		</div>	
		@include('tests.sidebar')
	</div>
	<script type="text/javascript" language="javascript" src="{{asset('pmd/components/custom-scrollbar/js/jquery.mCustomScrollbar.js')}}"></script>
	<script type="text/javascript">
		
	</script>>
@endsection