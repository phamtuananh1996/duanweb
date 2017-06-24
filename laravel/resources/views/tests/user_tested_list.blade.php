{{-- created by tran.nham on 17.06.2017 show all list the tests be created by user--}}
@extends('tests.layout')
@section('test_content')
	<div class="row">
		<div class="col-md-9">
			<div class="panel panel-default widget">
			<div class="panel-heading">
				<span class="glyphicon glyphicon-th-list"></span>
				<h3 class="panel-title">Đề Thi Đã Tạo</h3>
				<span class="label label-info">80</span>
			</div>
			<div class="panel-body">
				<ul class="list-group">
					@foreach($UserTest as $test) 
						
							
						
					<li class="list-group-item">
						<div class="row">
							<div class="col-xs-10 col-md-11">
								<div>
									<a class="list-title" href="#nothing">{{$test->test->title}}</a>
									<div class="mic-info">
										<div class="pull-left">
											<span class="pull-left">02 | làm lần cuối 2 ngày trước</span>&nbsp;| điểm cao nhất: 
											<span class="red-text ">7.5</span>
										</div>
										<div class="pull-right">
											<a href=""><span class="glyphicon glyphicon-repeat"> </span> Làm lại</a>
										</div>
										
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
@endsection