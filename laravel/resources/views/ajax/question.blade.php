<div class="it">
@foreach ($questions as $question)
<li class="list-group-item" >
	<div class="row">
		<div class="col-xs-2 col-md-1">
			<img class="img-avt" src="{{ asset('') }}/images/users/{{$question->user->avatar}}" alt="avatar">
		</div>
		<div class="col-xs-10 col-md-11">
			<div>
			<a class="list-title" href="{{ url('/qa/show/'.$question->id) }}">{{$question->question_title}}
				@if($question->is_resolved == true)
					<span class="glyphicon glyphicon-ok-sign green-text"></span>
				@else
					<span class="glyphicon glyphicon-question-sign red-text"></span>
				@endif
			</a>
				<div class="mic-info">
					Đăng bởi <a href="#">{{$question->user->user_name}}</a> tại <a href="{{url('qa/categories/'.$question->category->id)}}"><span class="orange-text"> {{$question->category->title}} </span></a> 
				</div>
				<div class="action">
					<span class="question-sub-info">
					<span id="answer_count">{{$question->answers->count()}}</span>&nbsp;<span class="glyphicon glyphicon-comment"></span>&nbsp;&nbsp;
					<span id="vote_count">{{$question->voteQuestion->count()}} </span>&nbsp;<span class="glyphicon glyphicon-thumbs-up"></span>&nbsp;&nbsp;
					{{$question->view_count}} <span class="glyphicon glyphicon-eye-open"></span>
					<span class="pull-right">
						@php
							Carbon\Carbon::setLocale('vi');
							if($question->created_at->diffInWeeks(Carbon\Carbon::now()) > 1)
							 echo $question->created_at->format('j M Y');
							else 
							 echo  $question->created_at->diffForHumans();
						@endphp
					</span>
				</div>
			</div>

		</div>
	</div>
</li>
@endforeach
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$('.it').addClass('animated fadeIn');
	});
</script>