@extends('users.info')
@section('info_content')	
	<link href="{{asset('pmd/components/dropdown/css/dropdown.css')}}" type="text/css" rel="stylesheet"/>

	<style type="text/css">
		.friends-list-item {padding:10px; border:solid 1px #2bbbad; border-radius:5px;}
		.friends-list-item:hover {background:#f5f5f5;}

	</style>
<!--Tab with Dropdown example -->
<div class="pmd-card pmd-z-depth dropdown-tab" style="box-shadow: none;"> 
	<div class="pmd-tabs pmd-tabs-bg">
		<div class="pmd-tab-active-bar"></div>
		<ul class="nav nav-tabs" role="tablist">
			<li role="presentation" class="active"><a href="#friends-list" aria-controls="home" role="tab" data-toggle="tab">Bạn Bè</a></li>
			<li role="presentation"><a href="#friends-request" aria-controls="about" role="tab" data-toggle="tab">Đang yêu cầu</a></li>
			<li role="presentation"><a href="#request-friends" aria-controls="work" role="tab" data-toggle="tab">Đã yêu cầu</a></li>
			<li class="dropdown pmd-dropdown" role="presentation"> <a aria-expanded="false" role="button" href="javascript:void(0);" data-toggle="dropdown" class="dropdown-toggle"> Xem thêm <span class="caret"></span> </a>
				<ul role="menu" class="dropdown-menu">
					<li><a href="javascript:void(0);">Profile</a></li>
					<li><a href="javascript:void(0);">Messages</a></li>
				</ul>
			</li>
		</ul>
	</div>
	<div class="pmd-card-body">
		<div class="tab-content">
			{{-- friends list tab --}}
			<div role="tabpanel" class="tab-pane active" id="friends-list">
				<div class="row">
					<div class="col-md-4 ">
						<div class="text-center friends-list-item">
							<h3 style="color:#00695c; font-weight:bold;">{{$user->user_name}}</h3>
							<img src="{{ asset('') }}/images/users/{{$user->avatar}}" alt="Avatar" style="width:80%; border:solid 2px #2bbbad;">
							<a class="action-link" href="#nothing"><h5>20 bạn chung</h5></a>
							 <span class="dropdown pmd-dropdown clearfix">
							    <button class="btn pmd-ripple-effect btn-info dropdown-toggle pmd-dropdown-hover" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-expanded="true">Hành động<span class="caret"></span></button>
							    <ul aria-labelledby="dropdownMenu2" role="menu" class="dropdown-menu">
							        <li role="presentation"><a href="javascript:void(0);" tabindex="-1" role="menuitem">Xem thông tin</a></li>
							        <li role="presentation"><a href="javascript:void(0);" tabindex="-1" role="menuitem">Nhắn tin</a></li>
							    </ul>
							</span>
						</div>
					</div>
					<div class="col-md-4 ">
						<div class="text-center friends-list-item">
							<h3 style="color:#00695c; font-weight:bold;">{{$user->user_name}}</h3>
							<img src="{{ asset('') }}/images/users/{{$user->avatar}}" alt="Avatar" style="width:80%; border:solid 2px #2bbbad;">
							<a class="action-link" href="#nothing"><h5>20 bạn chung</h5></a>
							 <span class="dropdown pmd-dropdown clearfix">
							    <button class="btn pmd-ripple-effect btn-info dropdown-toggle pmd-dropdown-hover" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-expanded="true">Hành động<span class="caret"></span></button>
							    <ul aria-labelledby="dropdownMenu2" role="menu" class="dropdown-menu">
							        <li role="presentation"><a href="javascript:void(0);" tabindex="-1" role="menuitem">Xem thông tin</a></li>
							        <li role="presentation"><a href="javascript:void(0);" tabindex="-1" role="menuitem">Nhắn tin</a></li>
							    </ul>
							</span>
						</div>
					</div>
					<div class="col-md-4 ">
						<div class="text-center friends-list-item">
							<h3 style="color:#00695c; font-weight:bold;">{{$user->user_name}}</h3>
							<img src="{{ asset('') }}/images/users/{{$user->avatar}}" alt="Avatar" style="width:80%; border:solid 2px #2bbbad;">
							<a class="action-link" href="#nothing"><h5>20 bạn chung</h5></a>
							 <span class="dropdown pmd-dropdown clearfix">
							    <button class="btn pmd-ripple-effect btn-info dropdown-toggle pmd-dropdown-hover" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-expanded="true">Hành động<span class="caret"></span></button>
							    <ul aria-labelledby="dropdownMenu2" role="menu" class="dropdown-menu">
							        <li role="presentation"><a href="javascript:void(0);" tabindex="-1" role="menuitem">Xem thông tin</a></li>
							        <li role="presentation"><a href="javascript:void(0);" tabindex="-1" role="menuitem">Nhắn tin</a></li>
							    </ul>
							</span>
						</div>
					</div>
					<div class="col-md-4 ">
						<div class="text-center friends-list-item">
							<h3 style="color:#00695c; font-weight:bold;">{{$user->user_name}}</h3>
							<img src="{{ asset('') }}/images/users/{{$user->avatar}}" alt="Avatar" style="width:80%; border:solid 2px #2bbbad;">
							<a class="action-link" href="#nothing"><h5>20 bạn chung</h5></a>
							 <span class="dropdown pmd-dropdown clearfix">
							    <button class="btn pmd-ripple-effect btn-info dropdown-toggle pmd-dropdown-hover" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-expanded="true">Hành động<span class="caret"></span></button>
							    <ul aria-labelledby="dropdownMenu2" role="menu" class="dropdown-menu">
							        <li role="presentation"><a href="javascript:void(0);" tabindex="-1" role="menuitem">Xem thông tin</a></li>
							        <li role="presentation"><a href="javascript:void(0);" tabindex="-1" role="menuitem">Nhắn tin</a></li>
							    </ul>
							</span>
						</div>
					</div>
					<div class="col-md-4 ">
						<div class="text-center friends-list-item">
							<h3 style="color:#00695c; font-weight:bold;">{{$user->user_name}}</h3>
							<img src="{{ asset('') }}/images/users/{{$user->avatar}}" alt="Avatar" style="width:80%; border:solid 2px #2bbbad;">
							<a class="action-link" href="#nothing"><h5>20 bạn chung</h5></a>
							 <span class="dropdown pmd-dropdown clearfix">
							    <button class="btn pmd-ripple-effect btn-info dropdown-toggle pmd-dropdown-hover" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-expanded="true">Hành động<span class="caret"></span></button>
							    <ul aria-labelledby="dropdownMenu2" role="menu" class="dropdown-menu">
							        <li role="presentation"><a href="javascript:void(0);" tabindex="-1" role="menuitem">Xem thông tin</a></li>
							        <li role="presentation"><a href="javascript:void(0);" tabindex="-1" role="menuitem">Nhắn tin</a></li>
							    </ul>
							</span>
						</div>
					</div>
				</div>
			</div>{{-- end friends list tab --}}

			<div role="tabpanel" class="tab-pane" id="friends-request">
				
			</div>
			<div role="tabpanel" class="tab-pane" id="request-friends">
				
			</div>
		</div>
	</div>
</div> <!--Tab with Dropdown example end-->
<script src="http://propeller.in/components/dropdown/js/bootstrap-hover-dropdown.js"></script>
<script type="text/javascript">
	$(document).ready( function() {
		$('.pmd-tabs').pmdTab();
		$('.pmd-dropdown-hover').dropdownHover().dropdown();
	});
</script>
@endsection