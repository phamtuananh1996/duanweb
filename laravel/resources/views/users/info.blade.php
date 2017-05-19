{{-- created by tran.nham on 19.05.2017 --}}

@extends('layouts.app')

@section('extend_header')
	<link href="{{asset('pmd/components/button/css/button.css')}}" type="text/css" rel="stylesheet" />
	<link href="{{asset('pmd/components/progressbar/css/progressbar.css')}}" type="text/css" rel="stylesheet" />
@endsection

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 offset-md-1" style="margin-top: 50px; height: 800px;"> 
			<div class="row">
				@include('users.infoSidebar')
				<div class="col-md-8" style=" height: 700px; margin-top:-5px;"> {{-- main content --}}
					<div class="row user-info-section">
						<div class="col-md-4" style="margin-top: 20px;">
							<figure><img class="img-rounded img-responsive" alt="" src="http://placehold.it/200x200"></figure>
						</div>
						<div class="col-md-7" style="text-align: left; margin-top: 10px; color: green;">
							<p style="font-size: 20px;"><STRONG>{{$user->name}}</STRONG></p>
							<p>Nick name: {{$user->user_name}}</p>
							<p>Lớp/Chuyên ngành: {{$user->class}}</p>
							<p>Nơi ở: {{$user->local}}</p>
							<p>Email: {{$user->email}}</p>
							<button type="button" class="btn pmd-btn-raised pmd-ripple-effect btn-success">Sửa Thông Tin</button>
						</div>

					</div>
					<div class="bs-callout bs-callout-danger">
	                  <h4>Giới thiệu về bản thân</h4>
	                  <p>{{$user->discription}}</p>
	                  <p>Là một người thế này</p>
	                  <p>Mô tả chi tiết</p>
	                  <p>get description vào đây</p>
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
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Propeller ripple effect js -->
<script type="text/javascript" src="http://propeller.in/components/button/js/ripple-effect.js"></script>
@endsection