<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AnswerComment;
use Auth;
use Carbon\Carbon;
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

    public function edit(Request $rq)
    {

        $AnswerComment = AnswerComment::find($rq->answer_comment_id);
        $AnswerComment->content = $rq->answer_comment_content;
        $AnswerComment->save();

        return response()->json($AnswerComment);   
    }

       public function delete(Request $rq)
    {
        $AnswerComment = AnswerComment::find($rq->answer_comment_id);
        $AnswerComment->delete();
        return response()->json($AnswerComment);   
    }
}
