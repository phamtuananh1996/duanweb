{{-- created by tran.nham on 17.06.2017 show all list the tests be created by user--}}
@extends('tests.layout')
@section('test_content')
	<div class="row">
		<div class="col-md-9">
			<div class="panel panel-default widget">
			<div class="panel-heading">
				<span class="glyphicon glyphicon-th-list"></span>
				<h3 class="panel-title">Đề Thi Đã Tạo</h3>
				<span class="label label-info">{{$UserTest->count()}}</span>
			</div>
			<div class="panel-body">
				<ul class="list-group">
					@foreach($UserTest as $tests) 
						@foreach($tests->sortByDesc('id')->uniqueStrict('test_id') as $test) 
							
						
					<li class="list-group-item">
						<div class="row">
							<div class="col-xs-10 col-md-11">
								<div>
									<a class="list-title" href="{{ url('tests/show') }}/{{$test->test_id}}">{{$test->test->title}}</a>
									<div class="mic-info">
										<div class="pull-left">
											<span class="pull-left">{{$tests->count()}} | làm lần cuối {{$test->created_at->diffForHumans()}}</span>&nbsp;| điểm cao nhất: 
											<span class="red-text ">{{$tests->max('test_point')}}</span>
										</div>
										<div class="pull-right">
											<a href="{{ url('tests/show') }}/{{$test->test_id}}"><span class="glyphicon glyphicon-repeat"> </span> Làm lại</a>
										</div>
										
									</div>
								</div>

							</div>
						</div>
					</li>
					 @endforeach 
				 @endforeach 
				</ul>
			</div>
		</div>
		</div>	
		@include('tests.sidebar')
	</div>
@endsection