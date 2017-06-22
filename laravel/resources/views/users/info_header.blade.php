<div class="row" style="background:#fff; padding:10px; border:solid 1px #2BBBAD; border-radius: 5px;">
	<div class="col-md-12 text-center">
		@if ($user->avatar)
		<img style="border-radius:50%;"  alt="" src="{{ asset('') }}/images/users/{{$user->avatar}}" width="150" height="150">
		@endif
	</div>
	<div class="col-md-12" style="text-align: left; margin-top: 10px; color:#00695c;">
		<p style="font-size: 20px; color:#0d47a1; text-align: center;"><STRONG>
			@if($user->name)
				{{$user->name}}
			@else
				{{$user->user_name}}
			@endif
		</STRONG></p>
		<div class="text-center">
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
				<a data-toggle="tooltip" data-placement="top" title="Sửa thông tin cá nhân" href="{{url('/users/infoEdit')}}"><i class="fa fa-cog fa-lg" aria-hidden="true"></i></a>
			@endif
			<a data-toggle="tooltip" data-placement="top" title="Gửi tin nhắn" style="margin-left: 10px;" href=""><i class="fa fa-comment-o fa-lg" aria-hidden="true"></i></a>
			<a data-toggle="tooltip" data-placement="top" title="Kết bạn" style="margin-left: 10px;" href=""><i class="fa fa-user-plus fa-lg" aria-hidden="true"></i></a>
		</div>
	</div>
</div>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>