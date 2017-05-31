<div class="pmd-card pmd-card-media-inline pmd-card-default pmd-z-depth qa-card">
	<div class="post-header">
		<div class="media-left">
			@if ($question->user->avatar)
               	<img src="{{ asset('') }}/images/users/{{$question->user->avatar}}" width="40" height="40" alt="avatar">
            @else
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT2-dYlakPdqfKcuptmGaAsh1ynwhzFDohsAioI4Ek_Cb7ecw_s" width="40" height="40" alt="avatar">
            @endif
		</div>
		<div class="media-body media-middle">
		<h3 class="list-group-item-heading">{{$question->user->user_name}}</h3>
			<span class="list-group-item-text">{{$question->created_at->toDateTimeString()}} .... tai {{$question->category->title}}</span>
		</div>
	</div>
	<div class="pmd-card-media">
		<div class="media-body">
			<h2 class="pmd-card-title-text" style="color: green;"><a href="{{ url('/qa/show/'.$question->id) }}">{{$question->question_title}}</a></h2>
			<p>{{$question->answers->count()}} trả lời | {{$question->voteQuestion->count()}} vote | {{$question->view_count}} lượt xem
				@if($question->is_resolved == true)
					<button class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-success" type="button"><i class="material-icons pmd-sm">check</i></button>
				@endif
			</p>
		</div>
	</div>
</div>