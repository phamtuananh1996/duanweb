<div class="question-list-item">
	<div id ="post-header">
		<div class="media-left">
			<img class="img-avt" src="{{ asset('') }}/images/users/{{$question->user->avatar}}" alt="avatar">
		</div>
		<div class="media-body media-middle">
			<p class="list-group-item-heading name-text">{{$question->user->user_name}}</p>
			<p class="sub-text">Đăng {{$question->created_at->diffForHumans()}} tại <span style="color:#e65100;"> 
			{{$question->category->title}}</span> | 
			<span class="question-sub-info">
			<span id="answer_count">{{$question->answers->count()}}</span>&nbsp;<span class="glyphicon glyphicon-comment"></span>&nbsp;&nbsp;
			<span id="vote_count">{{$question->voteQuestion->count()}} </span>&nbsp;<span class="glyphicon glyphicon-thumbs-up"></span>&nbsp;&nbsp;
			{{$question->view_count}} <span class="glyphicon glyphicon-eye-open"></span>
			</span>
			</p>
		</div>
		<div class="question-list-item-info">
			<a class="question-title" href="{{ url('/qa/show/'.$question->id) }}">{{$question->question_title}}
				@if($question->is_resolved == true)
					<span style="color: green;" class="glyphicon glyphicon-ok-sign"></span>
				@else
					<span style="color: red;" class="glyphicon glyphicon-question-sign"></span>
				@endif
			</a>
			<p>An efficient software developer is one who has a knack for producing what is needed and will be used</p>
		</div>
	</div>
</div>