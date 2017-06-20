@if($question->answers->count())
			@foreach ($question->answers->forPage(0,5) as $answer)
				<li class="list-group-item">
					<div class="media-left">
						@if ($answer->user->avatar)
							<img class="img-avt" src="{{ asset('') }}/images/users/{{$answer->user->avatar}}" alt="avatar">
						@endif
					</div>
					<div class="media-body" style="border-bottom: solid 1px #eee;">
						<h3 class="list-group-item-heading name-text">{{$answer->user->user_name}}</h3>
						<span class="list-group-item-text" id="answer_content" style="color: black;">{!!$answer->content!!}</span>
						<input type="hidden" name="answer_id_input_{{$answer->id}}" value="{{$answer->id}}">
						<p class="question-sub-info">
							<span id="count_vote_answer">{{$answer->voteAnswer->count()}}</span> <span class="glyphicon glyphicon-thumbs-up"></span>&nbsp;&nbsp;
							<span id="answer_comment_count">{{$answer->comments->count()}}</span> &nbsp;<span class="glyphicon glyphicon-comment"></span>&nbsp;&nbsp;
							<span class="created-time">{{$answer->created_at->diffForHumans()}}</span>
							<button class="btn pmd-btn-flat pmd-ripple-effect btn-success" type="button" id="show_answer" data-answer_id={{$answer->id}} style="margin-bottom:5px;"> Trả lời</button>
							@if (Auth::user()->voteAnswer->where('answer_id',$answer->id)->count()==0)
								<button class="btn pmd-btn-flat pmd-ripple-effect btn-success" type="button" id="vote_answer" style="margin-bottom:5px;"> Vote</button>
							@else
								<button class="btn pmd-btn-flat pmd-ripple-effect btn-success" type="button" id="un_vote_answer" style="margin-bottom: 5px;"> Bỏ vote</button>
							@endif
							@if(Auth::user()->id == $answer->user->id)
								<a id="show-edit_answer" data-answer_id='{{$answer->id}}' data-toggle="tooltip" data-placement="top" title="Sửa" style="margin-left: 10px;" href="#" ><span class="material-icons md-dark pmd-xs ">mode_edit</span></a>
								<a data-toggle="tooltip" id="show-delete-answer"  data-answer_id='{{$answer->id}}' data-placement="top" title="Xoá" style="margin-left:10px;" href="#"><span class="material-icons md-dark pmd-xs ">delete</span></a>
							@endif
						</p>
					</div>	

					<div id="group_comments_{{$answer->id}}" style="display: none">
						<div id="commentfield" style="margin:10px 0px 30px 55px; width: 70%;">
							<input type="hidden" id="answer_id" name="answer_id" value="{{ $answer->id}}">
							<div class="form-group comment-form"> 
								<label class="control-label">Bình luận</label> 
								<textarea style="background: #fff; height: 60px;" id="answer_comment_content" required class="form-control comment-box"></textarea>
							</div>
							<div class=" comment-form-action "> 
							<button id="answer_cmt" class="btn pmd-btn-outline pmd-ripple-effect btn-primary">Gửi</button>
							</div>
						</div>
						@if($answer->comments->count())
							@foreach($answer->comments as $comment)
							<div class="comment-list-item" >
								<div class="media-left">
									@if ($comment->user->avatar)
										<img class="img-avt" src="{{ asset('') }}/images/users/{{$comment->user->avatar}}" width="40" height="40" alt="avatar">
									@endif
								</div>
								<div class="media-body" style="margin-top:10px;">
									<h3 class="list-group-item-heading name-text">{{$comment->user->user_name}}</h3>
									<span class="list-group-item-text sub-text" style="color: black;">{{$comment->content}}</span>	
									<p class="question-sub-info">
										<span id="count_like">{{$comment->likeAnswerComment->count()}}</span> <span class="glyphicon glyphicon-thumbs-up"></span>&nbsp;&nbsp;
										<span class="created-time">{{$comment->created_at->diffForHumans()}}</span>
										@if (Auth::user()->likeAnswerComment->where('answer_comment_id',$comment->id)->count()==0)
											<button data-answer_comment_id={{$comment->id}} class="btn pmd-btn-flat pmd-ripple-effect btn-success" type="button" id="like" style="margin-bottom:5px;"> Vote</button>
										@else
											<button data-answer_comment_id={{$comment->id}} class="btn pmd-btn-flat pmd-ripple-effect btn-success" type="button" id="dislike" style="margin-bottom:5px;">Bỏ Vote</button>
										@endif

										@if(Auth::user()->id == $comment->user->id)
											<a data-answer_comment_id='{{$comment->id}}' data-toggle="tooltip" id="edit-answer-comment" data-placement="top" title="Sửa" style="margin-left: 10px;" href="#" ><span class="material-icons md-dark pmd-xs ">mode_edit</span></a>

											<a data-answer_comment_id='{{$comment->id}}' data-toggle="tooltip" id="show-delete-answer-comment" data-placement="top" title="Xoá" style="margin-left:10px;" href="#"><span class="material-icons md-dark pmd-xs ">delete</span></a>
										@endif
									</p>
								</div>
							</div>
							@endforeach
						@endif