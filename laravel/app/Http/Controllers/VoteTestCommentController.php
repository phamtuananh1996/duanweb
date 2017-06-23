<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VoteCommentTest;
use Auth;
class VoteTestCommentController extends Controller
{
    public function vote(Request $req)
    {
    	if(VoteCommentTest::where(['user_id'=>Auth::user()->id,'comment_tests_id'=>$req->comment_id])->get()->count()==0)
   		{
   			$VoteCommentTest=new VoteCommentTest;
   			$VoteCommentTest->user_id=Auth::user()->id;
   			$VoteCommentTest->comment_tests_id=$req->comment_id;
   			$VoteCommentTest->save();
   			return 'true';
   		}
   		else
   		{
   			return 'false';
   		}
    }

    public function unVote(Request $req)
    {
    	$VoteCommentTest=VoteCommentTest::where(['user_id'=>Auth::user()->id,'comment_tests_id'=>$req->comment_id])->first();

    	if($VoteCommentTest->count())
    	{
       	 	VoteCommentTest::find($VoteCommentTest->id)->delete();
       	 	return 'true';
    	}
    	else
    	{
    		return 'false';
    	}
    }
}
