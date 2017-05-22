@extends('users.info')

@section('info_content')
	<form class="form-horizontal role="form" method="POST" action="#" style="padding:30px; border:solid 1px green; margin-right: 30px; margin-top: 30px; background: white;">
		<div class="row">
			<div class="col-md-5">
				<div class="form-group pmd-textfield">
				  	<label for="first-name" class="control-label">
				   	Ten dang nhap
				  	</label>
				  	<input type="text" disabled="" value="{{$user->user_name}}" id="disabled" class="mat-input form-control">
				</div>
			</div>
			<div class="col-md-5 offet-md-3">
				<div class="form-group pmd-textfield">
				  	<label for="first-name" class="control-label">
				   	Email
				  	</label>
				  	<input type="text" disabled="" value="{{$user->email}}" id="disabled" class="mat-input form-control">
				</div>
			</div>
			<div class="col-md-5">
				<div class="form-group pmd-textfield">
					<label for="Small">Ho va ten</label>
					<input type="text" id="Small" class="form-control" value="{{$user->name}}">
				</div>
			</div>
			<div class="col-md-5 offet-md-3">
				<div class="form-group pmd-textfield">
					<label for="Small">Tỉnh/Thành Phố</label>
					<input type="text" id="Small" class="form-control" value="{{$user->local}}">
				</div>
			</div>
			<div class="col-md-5">
				<div class="form-group pmd-textfield">
					<label for="Small">Lớp/Chuyên ngành</label>
					<input type="text" id="Small" class="form-control" value="{{$user->class}}">
				</div>	
			</div>

		</div>
	</form>
@endsection