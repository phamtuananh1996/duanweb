{{-- created by tran.nham on 17.06.2017 show all list the tests be created by user--}}
@extends('tests.layout')
@section('test_content')
	<div class="row">
		<div class="col-md-9 main-content">
			<div class="section">
				<p class="main-title"> <span class="glyphicon glyphicon-folder-open"></span> &nbsp;Danh đề đã tạo</p>
				
			</div>
		</div>	
		@include('tests.sidebar')
	</div>
@endsection