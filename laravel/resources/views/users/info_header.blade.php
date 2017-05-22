<div class="row user-info-section" style="padding: 10px;">
	<div class="col-md-4" style="margin-top: 20px;">
		<figure><img class="img-rounded img-responsive" alt="" src="http://placehold.it/200x200"></figure>
	</div>
	<div class="col-md-7" style="text-align: left; margin-top: 10px; color: green;">
		<p style="font-size: 20px;"><STRONG>{{$user->name}}</STRONG></p>
		<p>Nick name: {{$user->user_name}}</p>
		<p>Lớp/Chuyên ngành: {{$user->class}}</p>
		<p>Nơi ở: {{$user->local}}</p>
		<p>Email: {{$user->email}}</p>
		<form method="GET" action="{{url('/users/infoEdit/'.$user->id)}}">
			<button type="submit" class="btn pmd-btn-raised pmd-ripple-effect btn-success">Sửa Thông Tin</button>
		</form>
	</div>
</div>