<div class="col-md-3"> <!--side bar-->
		<div class="row">
			<div class="col-md-11 col-md-offset-1 v-sidebar" style="margin-top: 80px;">
				<p class="v-menu-header">Thống Kê Nhanh<p>
				<ul class="v-menu-list">
					<li class="v-menu-item"><a href="{{url('qa')}}"><samp class="glyphicon glyphicon-globe"></samp>&nbsp; Tất cả câu hỏi</a></li>
					<li class="v-menu-item"><a href="{{url('qa')}}"><samp class="glyphicon glyphicon-asterisk"></samp>&nbsp; Mới nhất</a></li>
					<li class="v-menu-item"><a href="{{url('qa')}}"><samp class="glyphicon glyphicon-star"></samp>&nbsp; Nổi bật nhất</a></li>
					<li class="v-menu-item"><a href="{{url('qa/resolved')}}"><samp class="glyphicon glyphicon-ok"></samp>&nbsp;&nbsp;Đã được trả lời</a></li>
					<li class="v-menu-item"><a href="{{url('qa/myquestion')}}"><span class="glyphicon glyphicon-user"></span>&nbsp; Câu hỏi của tôi</a></li>
					<li class="v-menu-item"><a href="#"><span class="glyphicon glyphicon-comment"></span>&nbsp; Câu trả lời của tôi</a></li>
					<li class="v-menu-item"><a href="{{url('qa/myfollowing')}}"><span class="glyphicon glyphicon-eye-open"></span>&nbsp;  Đang theo dõi</a></li>
				</ul>
				<p class="v-menu-header">Theo Danh Mục<p>
				<ul class="v-menu-list" id="menu-list">
					@foreach($superCategories as $superCategory)
						<li class="active v-menu-item">
							<a href="#" data-toggle="collapse" data-target="#sub-list-{{$superCategory->id}}" ><span class="glyphicon glyphicon-triangle-bottom"></span>&nbsp;{{$superCategory->title}} </a>
							@if($superCategory->children->count())
							<div class="collapse" id="sub-list-{{$superCategory->id}}" style="height: 0px;">
								<ul class="v-sub-menu-list">
									@foreach($superCategory->children as $child)
										<li class="v-menu-item">
											<a href="#" data-toggle="collapse" data-target="#sub-list-sub-{{$child->id}}"><span class="glyphicon glyphicon-triangle-right"></span>&nbsp; {{$child->title}} </a>
											@if($child->children->count())
											<div class="collapse" id="sub-list-sub-{{$child->id}}" style="height: 0px;">
												<ul class="v-sub-menu-list">
													@foreach($child->children as $subChild)
														<li class="v-menu-item">
															<a href="#"><span class="glyphicon glyphicon-triangle-right"></span>&nbsp; {{$subChild->title}} </a>
														</li>
													@endforeach
												</ul>
											</div>
											@endif	
										</li>
									@endforeach
								</ul>
							</div>
							@endif	
						</li>
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