{{-- created by tran.nham on 19.05.2017 --}}
@extends('tests.layout')


@section('test_content')
<div class="col-md-7 col-md-offset-1 main-content">
	<nav class="navbar navbar-light teal lighten-5 section-title">
		<h3 >Đề Thi Nổi Bật  <span class="badge red">Hot</span></h3>
	</nav>
	<div class="component-box hot-test-scroll-box "> <!--hot tests scrollbar-->
		<div class="pmd-card pmd-z-depth pmd-card-custom-form">
			<div class="pmd-card-body"> 
				<div id="hot-test-scroll" class="pmd-scrollbar">
					<div class="list-group" style="margin-top: 10px;">
						<a href="#" class="list-group-item list-group-item-action">
							<p class="hoc2h-list-heading">Đề Thi học kỳ 1 năm 2017 môn toán lớp 12</p>
							<p class="hoc2h-list-subtext">Đăng bởi Aries | Toán 12 | 2 giờ trước</p>
						</a>
						<a href="#" class="list-group-item list-group-item-action">
							<p class="hoc2h-list-heading">Đề Thi học kỳ 1 năm 2017 môn toán lớp 12 Đề Thi học kỳ 1 năm 2017 môn toán lớp 12</p>
							<p class="hoc2h-list-subtext">Đăng bởi Aries | Toán 12 | 2 giờ trước</p>
						</a>
						<a href="#" class="list-group-item list-group-item-action">
							<p class="hoc2h-list-heading">Đề Thi học kỳ 1 năm 2017 môn toán lớp 12</p>
							<p class="hoc2h-list-subtext">Đăng bởi Aries | Toán 12 | 2 giờ trước</p>
						</a>
						<a href="#" class="list-group-item list-group-item-action">
							<p class="hoc2h-list-heading">Đề Thi học kỳ 1 năm 2017 môn toán lớp 12</p>
							<p class="hoc2h-list-subtext">Đăng bởi Aries | Toán 12 | 2 giờ trước</p>
						</a>
						<a href="#" class="list-group-item list-group-item-action">
							<p class="hoc2h-list-heading">Đề Thi học kỳ 1 năm 2017 môn toán lớp 12</p>
							<p class="hoc2h-list-subtext">Đăng bởi Aries | Toán 12 | 2 giờ trước</p>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<nav class="navbar navbar-light section-title"">
		<h3>Đề Thi Mới Ra  <span class="badge green">New</span></h3>
	</nav>
	<div class="component-box hot-test-scroll-box "> <!--hot tests scrollbar-->
		<div class="pmd-card pmd-z-depth pmd-card-custom-form">
			<div class="pmd-card-body"> 
				<div id="new-test-scroll" class="pmd-scrollbar">
					<div class="list-group" style="margin-top: 10px;">
						<a href="#" class="list-group-item list-group-item-action">
							<p class="hoc2h-list-heading">Đề Thi học kỳ 1 năm 2017 môn toán lớp 12</p>
							<p class="hoc2h-list-subtext">Đăng bởi Aries | Toán 12 | 2 giờ trước</p>
						</a>
						<a href="#" class="list-group-item list-group-item-action">
							<p class="hoc2h-list-heading">Đề Thi học kỳ 1 năm 2017 môn toán lớp 12</p>
							<p class="hoc2h-list-subtext">Đăng bởi Aries | Toán 12 | 2 giờ trước</p>
						</a>
						<a href="#" class="list-group-item list-group-item-action">
							<p class="hoc2h-list-heading">Đề Thi học kỳ 1 năm 2017 môn toán lớp 12</p>
							<p class="hoc2h-list-subtext">Đăng bởi Aries | Toán 12 | 2 giờ trước</p>
						</a>
						<a href="#" class="list-group-item list-group-item-action">
							<p class="hoc2h-list-heading">Đề Thi học kỳ 1 năm 2017 môn toán lớp 12</p>
							<p class="hoc2h-list-subtext">Đăng bởi Aries | Toán 12 | 2 giờ trước</p>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>	
@include('tests.sidebar')
<script type="text/javascript" language="javascript" src="{{asset('pmd/components/custom-scrollbar/js/jquery.mCustomScrollbar.js')}}"></script>
<script>
	(function($){
		$(window).load(function(){
			$(".content").mCustomScrollbar({
				theme:"minimal"
			});
			// Scrollbar position outside card with buttons
			$("#quick-log-scroll").mCustomScrollbar({
				scrollButtons:{enable:true},
				axis:"y",
				theme:"dark-thick",
				scrollInertia:800,
				scrollbarPosition:"inside"
			});
			$("#hot-test-scroll").mCustomScrollbar({
				axis:"y",
				scrollInertia:800,
				scrollButtons:{enable:true},
				theme:"dark-thick",
				scrollbarPosition:"inside"
			});
			$("#new-test-scroll").mCustomScrollbar({
				axis:"y",
				scrollInertia:800,
				scrollButtons:{enable:true},
				theme:"dark-thick",
				scrollbarPosition:"inside"
			});
		});
	})(jQuery);
</script>
@endsection