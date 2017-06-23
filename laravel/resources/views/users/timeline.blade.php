@extends('users.info')
@section('info_content')
	<div class="row" style="padding-left: 20px;">
		<div class="col-md-12 section" style="background:#fff; padding: 10px; border-radius: 3px;">
			<div id="commentField" class="form-group comment-form">
				<textarea  class="form-control comment-box" placeholder="Bạn đang nghĩ gì...?"></textarea>
				<div class=" comment-form-action "> 
					<button id="submit_comment" type="button" class=" my-btn pull-right" >Đăng</button>
					<div class="pull-left">
						<a href="#nothing"><i class="fa fa-picture-o fa-lg" aria-hidden="true"></i></a>
						<a href="#nothing"><i style="margin-left: 10px;" class="fa fa-meh-o fa-lg" aria-hidden="true"></i></a>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-12 section" style="margin-top: 20px; padding:10px; background: #fff; border-radius: 3px;">
			<div class="pmd-card pmd-card-default pmd-z-depth" style="box-shadow: none;">
				<!-- Card header -->
			    <div class="pmd-card-title">
			        <div class="media-left">
			            <a class="avatar-list-img" href="javascript:void(0);">
			               <img  alt="" src="{{ asset('') }}/images/users/{{$user->avatar}}" width="40" height="40">
			            </a>
			        </div>
			        <div class="media-body media-middle">
			            <h3 class="pmd-card-title-text"><span style="color:#00695c; font-size: 18px;">{{$user->user_name}} </span>đã đăng một ảnh</h3>
			            <span class="pmd-card-subtitle-text">15 phút trước</span>
			        </div>
			    </div>
			    
			     <!-- Card body -->
			    <div class="pmd-card-body">
			        Cards provide context and an entry point to more robust information and views. Don't overload cards with extraneous information or actions.
			    </div>

			    <!-- Card media -->
			    <div class="pmd-card-media">
			        <img src="http://propeller.in/assets/images/profile-pic.png" width="1184" height="666" class="img-responsive">
			    </div>
			    
			    <!-- Card media actions -->
			    <div class="pmd-card-actions" style="border-bottom:solid 1px #2BBBAD;">
			        <button class="btn btn-sm pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-primary" type="button">10 <i class="fa fa-thumbs-o-up" aria-hidden="true"></i></button>
			        <button class="btn btn-sm pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-primary" type="button">5 <i class="fa fa-comment-o" aria-hidden="true"></i></button>
			        <button class="btn btn-sm pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-primary" type="button">1 <i class="fa fa-share-alt" aria-hidden="true"></i></button>
			    </div>
			    <!-- Card actions -->
			    <div class="pmd-card-actions">
			        <button class="btn pmd-btn-flat pmd-ripple-effect btn-primary" type="button">Thích</button>
			        <button type="button" class="btn pmd-btn-flat pmd-ripple-effect btn-default">Bình luận</button>
			    </div>
		    </div>
		</div>
	</div>
@endsection