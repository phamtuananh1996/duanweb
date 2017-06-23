<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TestCommentReply;
use Auth;
class TestCommentReplyController extends Controller
{
    public function store(Request $rq)
    {
    	$TestCommentReply = new TestCommentReply;
    	$TestCommentReply->user_id = Auth::user()->id;
    	$TestCommentReply->test_comment_id = $rq->comment_id;
    	$TestCommentReply->content = $rq->comment_content;
    	$TestCommentReply->save();
    	//$comment->created_at=$comment->created_at->diffForHumans();
    	return response()->json($TestCommentReply);
    }

     public function edit(Request $rq)
    {

        $TestCommentReply = TestCommentReply::find($rq->answer_comment_id);
        $TestCommentReply->content = $rq->answer_comment_content;
        $TestCommentReply->save();

        return response()->json($TestCommentReply);   
    }

       public function delete(Request $rq)
    {
        $TestCommentReply = TestCommentReply::find($rq->answer_comment_id);
        $TestCommentReply->delete();
        return response()->json($TestCommentReply);   
    }
}
