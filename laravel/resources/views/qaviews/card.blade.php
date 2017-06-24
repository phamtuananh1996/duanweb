<div class="question-list">
	<div class="post-header">
		<div class="media-left">
			@if ($question->user->avatar)
			<img class="img-avt" src="{{ asset('') }}/images/users/{{$question->user->avatar}}" width="40" height="40" alt="avatar">
			@endif
		</div>
		<div class="media-body media-middle">
			<p class="list-group-item-heading name-text">{{$question->user->user_name}}</p>
			<p class="sub-text">Đăng {{$question->created_at->diffForHumans()}} tại <span style="color: #e65100 ;"> {{$question->category->title}}</span></p>
		</div>
	</div>
	<a class="question-title" href="{{ url('/qa/show/'.$question->id) }}">{{$question->question_title}}
		@if($question->is_resolved == true)
			<span style="color: green;" class="glyphicon glyphicon-ok-sign"></span>
		@else
			<span style="color: red;" class="glyphicon glyphicon-question-sign"></span>
		@endif
	</a>
	<p class="question-content-limit">Currently I try to implement in a existing project hasOne/hasMany relations to a existing database. Problem is here, that I can't define the foreign key with help of a id column...</p>
	<p class="question-sub-info">
		<span id="answer_count">{{$question->answers->count()}}</span>&nbsp;<span class="glyphicon glyphicon-comment"></span>&nbsp;&nbsp;
		<span id="vote_count">{{$question->voteQuestion->count()}} </span>&nbsp;<span class="glyphicon glyphicon-thumbs-up"></span>&nbsp;&nbsp;
		{{$question->view_count}} <span class="glyphicon glyphicon-eye-open"></span>
	</p>
</div>