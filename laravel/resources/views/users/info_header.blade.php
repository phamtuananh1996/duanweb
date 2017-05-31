<div class="row user-info-section" style="padding: 10px;">
	<div class="col-md-4" style="margin-top: 20px;">
	@if ($user->avatar)
		<figure><img class="img-rounded img-responsive" alt="" src="{{ asset('') }}/images/users/{{$user->avatar}}" width="200" height="300" ></figure>
	@else
	 	<figure><img class="img-rounded img-responsive" alt="" src="http://duncanlock.net/images/posts/better-figures-images-plugin-for-pelican/dummy-200x200.png" ></figure>
	@endif
		
	</div>
	<div class="col-md-6" style="text-align: left; margin-top: 10px; color: green;">
		<p style="font-size: 20px;"><STRONG>{{$user->name}}</STRONG></p>
		<p>Nick name: {{$user->user_name}}</p>
		<p>Lớp/Chuyên ngành: {{$user->class}}</p>
		<p>Nơi ở: {{$user->local}}</p>
		<p>Email: {{$user->email}}</p>
		@if ($user->id==Auth::user()->id)
			<form method="GET" action="{{url('/users/infoEdit')}}">
				<button type="submit" class="btn pmd-btn-raised pmd-ripple-effect btn-success">Sửa Thông Tin</button>
			</form>
		@endif
		
		
	</div>
</div>