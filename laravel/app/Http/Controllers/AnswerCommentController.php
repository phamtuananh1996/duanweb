<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AnswerComment;
use Auth;
class AnswerCommentController extends Controller
{
    public function store(Request $rq)
    {
    	$comment = new AnswerComment;
    	$comment->user_id = Auth::user()->id;
    	$comment->answer_id = $rq->answer_id;
    	$comment->content = $rq->comment_content;
    	$comment->save();
    	//$comment->created_at=$comment->created_at->diffForHumans();
    	return response()->json($comment);
    }
}
