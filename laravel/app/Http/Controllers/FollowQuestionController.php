<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\FollowQuestion;
class FollowQuestionController extends Controller
{
    public function ajaxFollow(Request $req)
    {
    	if(FollowQuestion::where(['user_id'=>Auth::user()->id,'question_id'=>$req->question_id])->get()->count()==0)
    	{
       	 	$FollowQuestion=new FollowQuestion;
       	 	$FollowQuestion->user_id=Auth::user()->id;
       	 	$FollowQuestion->question_id=$req->question_id;
        	$FollowQuestion->save();
        	return 'true';
    	}
    }

    public function ajaxDisFollow(Request $req)
    {
    	$FollowQuestion=FollowQuestion::where(['user_id'=>Auth::user()->id,'question_id'=>$req->question_id])->first();

    	if($FollowQuestion->count())
    	{
       	 	FollowQuestion::find($FollowQuestion->id)->delete();
       	 	return 'true';
    	}
    	else
    	{
    		return 'false';
    	}
    }
}
