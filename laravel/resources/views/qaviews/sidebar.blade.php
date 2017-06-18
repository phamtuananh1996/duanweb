<div class="col-md-3"> <!--side bar-->
		<div class="row">
			<div class="col-md-11 col-md-offset-1 v-sidebar">
				<p class="v-menu-header">Thống Kê<p>
				<ul class="v-menu-list">
					<li class="v-menu-item"><a href="{{url('qa')}}"><samp class="glyphicon glyphicon-globe"></samp>&nbsp; Tất cả câu hỏi</a></li>
					<li class="v-menu-item"><a href="{{url('qa')}}"><samp class="glyphicon glyphicon-asterisk"></samp>&nbsp; Mới nhất</a></li>
					<li class="v-menu-item"><a href="{{url('qa')}}"><samp class="glyphicon glyphicon-star"></samp>&nbsp; Nổi bật nhất</a></li>
					<li class="v-menu-item"><a href="{{url('qa/resolved')}}"><samp class="glyphicon glyphicon-ok"></samp>&nbsp;&nbsp;Đã được trả lời</a></li>
					<li class="v-menu-item"><a href="{{url('qa/myquestion')}}"><span class="glyphicon glyphicon-user"></span>&nbsp; Câu hỏi của tôi</a></li>
					<li class="v-menu-item"><a href="#"><span class="glyphicon glyphicon-comment"></span>&nbsp; Câu trả lời của tôi</a></li>
					<li class="v-menu-item"><a href="{{url('qa/myfollowing')}}"><span class="glyphicon glyphicon-eye-open"></span>&nbsp;  Đang theo dõi</a></li>
				</ul>
				<p class="v-menu-header">Danh Mục<p>
				<ul class="v-menu-list">
					@foreach($superCategories as $superCategory)
						 @include('qaviews.recursive_partials', $superCategory)
					@endforeach
				</ul>
			</div>
		</div>
	</div><!--end sidebar-->

	<script type="text/javascript">
		$(document).ready(function() {
			$('#menu-list').on('click','#super-menu-item',function(event){
				$('#sub-meu-list').slideToggle("fast");
			});
		});
	</script>