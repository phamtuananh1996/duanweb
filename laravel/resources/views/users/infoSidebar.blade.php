<div class="col-md-3"> <!--side bar-->
		<div class="row">
			<div class="col-md-11 col-md-offset-1 v-sidebar">
				<div>
					<div class="text-center" style="margin-bottom: 10px;">
						@if ($user->avatar)
							<img style="width:80%; margin-top:10px; border:solid 2px #2bbbad; border-radius: 5px;" alt="" src="{{ asset('') }}/images/users/{{$user->avatar}}">
						@endif
                        <h1 style="color:#00695c; font-weight:bold;">{{$user->user_name}}</h1>
                        <span style="padding:10px;color: #757575 ;">{{$user->role->title}}</span>
                    </div>
                   {{--  user options --}}
                   @if($user->id != Auth::user()->id)
                    <div class="row" style="margin-bottom: 20px; border-top:1px dashed #cccccc;">
                    	<div class="col-md-4 text-center">
                    		<a data-toggle="tooltip" data-placement="top" title="Kết bạn" style="margin-left: 10px;" href=""><i class="fa fa-user-plus fa-lg" aria-hidden="true"></i></a>
                    	</div>
                    	<div class="col-md-4 text-center">
                    		<a data-toggle="tooltip" data-placement="top" title="Gửi tin nhắn" style="margin-left: 10px;" href=""><i class="fa fa-comment-o fa-lg" aria-hidden="true"></i></a>
                    	</div>
						<div class="col-md-4 text-center dropdown pmd-dropdown dropup clearfix">
							<a  data-toggle="dropdown" aria-expanded="true" style="margin-left: 10px;" href=""><i class="fa fa-ellipsis-v fa-lg" aria-hidden="true"></i></a>
							 <ul aria-labelledby="dropdownMenu3" role="menu" class="dropdown-menu pmd-dropdown-menu-top-left">
						        <li role="presentation"><a href="javascript:void(0);" tabindex="-1" role="menuitem">Báo cáo</a></li>
						        <li role="presentation"><a href="javascript:void(0);" tabindex="-1" role="menuitem">...</a></li>
						    </ul>
						</div>
                    </div> 
                   @endif
				</div>
				<p class="v-menu-header">Tài Khoản<p>
				<ul class="v-menu-list">
					<li class="v-menu-item"><a href="{{ url('users/timeline/'.$user->id) }}"><i class="fa fa-user-circle" aria-hidden="true"></i>&nbsp; Trang cá nhân</a></li>
					<li class="v-menu-item"><a href="{{url('/users/infodetail/'.$user->id)}}"><i class="fa fa-info-circle"></i>&nbsp; Thông tin chi tiết</a></li>
					<li class="v-menu-item"><a href="{{url('/users/friends/'.$user->id)}}"><i class="fa fa-users" aria-hidden="true"></i>&nbsp; Bạn bè</a></li>
					<li class="v-menu-item"><a href="#nothing"><i class="fa fa-comments-o" aria-hidden="true"></i>&nbsp; Tin nhắn</a></li>
					<li class="v-menu-item"><a href="#nothing"><i class="fa fa-cog" aria-hidden="true"></i>&nbsp; Cài đặt</a></li>
				</ul>
			</div>
		</div>
	</div><!--end sidebar-->

	<script>
		$(document).ready(function(){
	    	$('[data-toggle="tooltip"]').tooltip();   
		});
	</script>