<div class="row" style="background: #fff; padding:10px; border:solid 1px green;">
	<div class="col-md-4">
		@if ($user->avatar)
		<img style="border-radius:50%;"  alt="" src="{{ asset('') }}/images/users/{{$user->avatar}}" width="200" height="200">
		@endif
	</div>
	<div class="col-md-8" style="text-align: left; margin-top: 10px; color:#00695c;">
		@if($user->name)
		<p style="font-size: 20px; color:#0d47a1;"><STRONG>{{$user->name}}</STRONG></p>
		@else
		<p style="font-size: 20px;"><STRONG>{{$user->user_name}}</STRONG></p>
		@endif
		<p><span class="glyphicon glyphicon-education"></span> {{$user->class}}</p>
		<p><span class="glyphicon glyphicon-map-marker"></span> {{$user->local}}</p>
		<p><span class="glyphicon glyphicon-envelope"></span> {{$user->email}}</p>
		<p><span class="glyphicon glyphicon-earphone"></span> 0{{$user->phone}}</p> 
		<div class="pull-left">
			 <ul class="list-inline stats">
               <li>
                 <span style="color: #ff4444;">275</span>
                Bạn bè
              </li>
              <li>
                 <span style="color: #ff4444;">354</span>
                 Theo dõi
              </li>
               <li>
                 <span style="color: #ff4444;">186</span>
                 Ảnh
              </li>
              <li>
                 <span style="color: #ff4444;">219</span>
                 Bài đăng
              </li>
          </ul>
		</div>
		<div class="pull-right"> 
			@if ($user->id==Auth::user()->id)
				<a data-toggle="tooltip" data-placement="top" title="Sửa thông tin cá nhân" href="{{url('/users/infoEdit')}}"><span class="material-icons md-dark pmd-xs">mode_edit</span> </a>
			@endif
			<a data-toggle="tooltip" data-placement="top" title="Gửi tin nhắn" style="margin-left: 10px;" href=""><span class="material-icons md-dark pmd-xs">message</span></a>
			<a data-toggle="tooltip" data-placement="top" title="Kết bạn" style="margin-left: 10px;" href=""><span class="material-icons md-dark pmd-xs">person_add</span></a>
		</div>
	</div>
</div>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>