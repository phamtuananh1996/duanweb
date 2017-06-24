{{-- created by tran.nham on 31.05.2017 show all list the tests be created by user--}}
@extends('tests.layout')

@section('test_content')
<div class="row">
	<div class="col-md-9">
		<div class="panel panel-default widget">
			<div class="panel-heading">
				<span class="glyphicon glyphicon-th-list"></span>
				<h3 class="panel-title">Đề Thi Đã Tạo</h3>
				<span class="label label-info">{{$listTests->count()}}</span>
			</div>
			<div class="panel-body">
				<ul class="list-group">
					@foreach($listTests->sortByDesc('id') as $test)
					<li class="list-group-item">
						<div class="row">
							<div class="col-xs-2 col-md-1">
								<img class="img-avt" src="{{ asset('') }}/images/users/{{$test->user->avatar}}" alt="avatar">
							</div>
							<div class="col-xs-10 col-md-11">
								<div>
									<a href="{{url('tests/user/created/show/'.$test->id)}}">{{$test->title}}</a>
									<div class="mic-info">
										Đăng bởi: <a href="#">{{$test->user->user_name}}</a> tại <span class="orange-text"> {{$test->category->title}}</span> {{$test->created_at->diffForHumans()}} 
										@if($test->state == 1)
											<span class="green-text pull-right">Đã xuất bản</span>
										@else
										    <span class="red-text pull-right" >Chưa xuất bản</span>
										@endif

									</div>
								</div>

							</div>
						</div>
					</li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>	
	@include('tests.sidebar')
</div>
<script type="text/javascript" language="javascript" src="{{asset('pmd/components/custom-scrollbar/js/jquery.mCustomScrollbar.js')}}"></script>
<script type="text/javascript">

</script>>
@endsection