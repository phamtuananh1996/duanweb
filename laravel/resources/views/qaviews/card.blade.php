<li class="list-group-item">
	<div class="row">
		<div class="col-xs-2 col-md-1">
			<img class="img-avt" src="{{ asset('') }}/images/users/{{$question->user->avatar}}" alt="avatar">
		</div>
		<div class="col-xs-10 col-md-11">
			<div>
			<a class="list-title" href="{{ url('/qa/show/'.$question->id) }}">{{$question->question_title}}</a>
				<div class="mic-info">
					Đăng bởi <a href="#">{{$question->user->user_name}}</a> tại <a href="#"><span class="orange-text"> {{$question->category->title}} </span></a> 
				</div>
				<div class="action">
					<span class="question-sub-info">
					<span id="answer_count">{{$question->answers->count()}}</span>&nbsp;<span class="glyphicon glyphicon-comment"></span>&nbsp;&nbsp;
					<span id="vote_count">{{$question->voteQuestion->count()}} </span>&nbsp;<span class="glyphicon glyphicon-thumbs-up"></span>&nbsp;&nbsp;
					{{$question->view_count}} <span class="glyphicon glyphicon-eye-open"></span>
					<span class="pull-right"> {{$question->created_at->diffForHumans()}}</span>
				</div>
			</div>

		</div>
	</div>
</li>