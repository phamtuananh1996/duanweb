<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\VoteQuestion;
class VoteQuestionController extends Controller
{
   public function ajaxVote(Request $req)
   {
   		if(VoteQuestion::where(['user_id'=>Auth::user()->id,'question_id'=>$req->question_id])->get()->count()==0)
   		{
   			$VoteQuestion=new VoteQuestion;
   			$VoteQuestion->user_id=Auth::user()->id;
   			$VoteQuestion->question_id=$req->question_id;
   			$VoteQuestion->save();
   			return 'true';
   		}
   		else
   		{
   			return 'false';
   		}
   }

   public function ajaxDisVote(Request $req)
   {
   		$VoteQuestion=VoteQuestion::where(['user_id'=>Auth::user()->id,'question_id'=>$req->question_id])->first();

    	if($VoteQuestion->count())
    	{
       	 	VoteQuestion::find($VoteQuestion->id)->delete();
       	 	return 'true';
    	}
    	else
    	{
    		return 'false';
    	}
   }
}
