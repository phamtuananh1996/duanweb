<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\LikeAnswerComment;
class LikeAnswerCommentController extends Controller
{
    public function like(Request $req)
    {
    	if(LikeAnswerComment::where(['user_id'=>Auth::user()->id,'answer_comment_id'=>$req->answer_comment_id])->get()->count()==0)
    	{
    		$LikeAnswerComment=new LikeAnswerComment;
   			$LikeAnswerComment->user_id=Auth::user()->id;
   			$LikeAnswerComment->answer_comment_id=$req->answer_comment_id;
   			$LikeAnswerComment->save();
    		return 'true';	
    	}
    	else
    	{
    		return 'false';
    	}

    }

    public function disLike(Request $req)
    {
    	$LikeAnswerComment=LikeAnswerComment::where(['user_id'=>Auth::user()->id,'answer_comment_id'=>$req->answer_comment_id])->first();

    	if($LikeAnswerComment->count())
    	{
       	 	LikeAnswerComment::find($LikeAnswerComment->id)->delete();
       	 	return 'true';
    	}
    	else
    	{
    		return 'false';
    	}
    	
    }
}
