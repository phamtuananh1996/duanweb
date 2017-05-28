<div class="pmd-card pmd-card-media-inline pmd-card-default pmd-z-depth qa-card">
	<div class="post-header">
		<div class="media-left">
			<a class="avatar-list-img avatar-list-img-custom" href="javascript:void(0);">
				<img data-holder-rendered="true" src="http://propeller.in/components/list/img/40x40.png" class="img-responsive" data-src="holder.js/40x40" alt="40x40">
			</a>
		</div>
		<div class="media-body media-middle">
		<h3 class="list-group-item-heading">{{$question->user->user_name}}</h3>
			<span class="list-group-item-text">Dang luc .... tai {{$question->category->title}}</span>
		</div>
	</div>
	<div class="pmd-card-media">
		<div class="media-body">
			<h2 class="pmd-card-title-text" style="color: green;"><a href="{{ url('/qa/show/'.$question->id) }}">{{$question->question_title}}</a></h2>
			<p>{{$question->answers->count()}} trả lời | {{$question->vote_count}} vote | {{$question->view_count}} lượt xem
				@if($question->is_resolved == true)
					<button class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-success" type="button"><i class="material-icons pmd-sm">check</i></button>
				@endif
			</p>
		</div>
	</div>
</div>