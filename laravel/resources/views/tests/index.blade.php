{{-- created by tran.nham on 19.05.2017 --}}

@extends('tests.layout')
<style type="text/css">

</style>
@section('test_content')
	<a data-toggle="tooltip" data-placement="top" title="Tạo đề" href="{{url('tests/createst1')}}" style="position: fixed; bottom: 50px; right: 50px; background: #00695c; color: #fff;" class="btn pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-default" type="button"><i class="material-icons pmd-sm">add</i></a>
	<div class="row" style="margin-top: 20px;">
		<div class="col-md-9">
			<div class="panel panel-default widget">
				<div class="panel-heading">
					<span class="glyphicon glyphicon-th-list"></span>
					<h3 class="panel-title"> Tất Cả Đề Thi</h3>
					<span class="label label-info">{{$tests->count()}}</span>
				</div>
				<div class="panel-body">
					<ul class="list-group">
						@foreach($tests->sortByDesc('id') as $test)
							@if($test->state == 1)
								<li class="list-group-item">
									<div class="row">
										<div class="col-xs-2 col-md-1">
											<img class="img-avt" src="{{ asset('') }}/images/users/{{$test->user->avatar}}" alt="avatar">
										</div>
										<div class="col-xs-10 col-md-11">
											<div>
												<a class="list-titel" href="{{url('/tests/show/'.$test->id)}}">{{$test->title}}</a>
												<div class="mic-info">
													Đăng bởi <a href="#">{{$test->user->user_name}}</a> tại <a href="#"><span class="orange-text"> {{$test->category->title}} </span></a> {{$test->created_at->diffForHumans()}}
													<span class="pull-right green-text">{{$test->userTests->count()}} lượt tham gia</span>
												</div>
											</div>
											
										</div>
									</div>
								</li>
							@endif
						@endforeach
					</ul>
				</div>
			</div>
		</div>	
		@include('tests.sidebar')
	</div>

	<script src="{{asset('pmd/components/custom-scrollbar/js/jquery.mCustomScrollbar.js')}}"></script>
	<script>
		(function($){
			$(window).load(function(){
				$('[data-toggle="tooltip"]').tooltip();   
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