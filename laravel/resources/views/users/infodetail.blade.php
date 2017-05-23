@extends('users.info')
@section('info_content')
	<div class="bs-callout bs-callout-danger">
		<h4>Giới thiệu về bản thân</h4>
		<p>{!!$user->description!!}</p>
		
	</div>
	<div class="bs-callout bs-callout-danger">
		<h4>Trình độ</h4>
		<p>Toán</p>
		<div class="progress-rounded progress pmd-progress"><div class="progress-bar progress-bar-success" style="width: 34%;"></div></div>
		<p>Lý</p>
		<div class="progress-rounded progress pmd-progress"><div class="progress-bar progress-bar-success" style="width: 50%;"></div></div>
		<p>Hoá</p>
		<div class="progress-rounded progress pmd-progress"><div class="progress-bar progress-bar-success" style="width:45%;"></div></div>
	</div>
@endsection