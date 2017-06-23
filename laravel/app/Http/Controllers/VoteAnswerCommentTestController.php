<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\VoteAnswerCommentTest;
class VoteAnswerCommentTestController extends Controller
{
    public function store(Request $req)
    {
    	if(VoteAnswerCommentTest::where(['user_id'=>Auth::user()->id,'test_comment_replies_id'=>$req->answer_comment_id])->get()->count()==0)
    	{
    		$VoteAnswerCommentTest=new VoteAnswerCommentTest;
   			$VoteAnswerCommentTest->user_id=Auth::user()->id;
   			$VoteAnswerCommentTest->test_comment_replies_id=$req->answer_comment_id;
   			$VoteAnswerCommentTest->save();
    		return 'true';	
    	}
    	else
    	{
    		return 'false';
    	}
    }

    public function disLike(Request $req)
    {
    	$VoteAnswerCommentTest=VoteAnswerCommentTest::where(['user_id'=>Auth::user()->id,'test_comment_replies_id'=>$req->answer_comment_id])->first();

    	if($VoteAnswerCommentTest->count())
    	{
       	 	VoteAnswerCommentTest::find($VoteAnswerCommentTest->id)->delete();
       	 	return 'true';
    	}
    	else
    	{
    		return 'false';
    	}
    	
    }
}
