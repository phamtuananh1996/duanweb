@extends('users.info')
@section('info_content')
	<div class="row info_content">
		<div class="col-md-12 info-section">
			<p class="info-title">{{$user->user_name}}</p>
			<p>{!!$user->description!!}</p>
		</div>
		<div class="col-md-12 info-section">
			<p class="info-title">Hoạt động</p>
			<div class="time-line">
				<p class="time-line-header"><span>Tháng 6 năm 2017</span></p>
				<p>{!!$user->description!!}</p>
				<p>{!!$user->description!!}</p>
				<p>{!!$user->description!!}</p>
			</div>
			<div class="time-line">
				<p class="time-line-header"><span>Tháng 5 năm 2017</span></p>
				<p>{!!$user->description!!}</p>
			</div>
			<div class="time-line">
				<p class="time-line-header"><span>Tháng 4 năm 2017</span></p>
				<p>{!!$user->description!!}</p>
			</div>
			<div class="time-line">
				<p class="time-line-header"><span>Tháng 3 năm 2017</span></p>
				<p>{!!$user->description!!}</p>
			</div>
		</div>
	</div>
@endsection