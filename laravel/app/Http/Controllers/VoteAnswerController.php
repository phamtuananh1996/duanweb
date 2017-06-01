<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\VoteAnswer;
class VoteAnswerController extends Controller
{
    public function voteAnswer(Request $req)
    {
    	$VoteAnswer =new VoteAnswer;
    	$VoteAnswer->user_id=Auth::user()->id;
    	$VoteAnswer->answer_id=$req->answer_id;
    	$VoteAnswer->save();
    	return 'true';
    }

    public function disVoteAnswer(Request $req)
    {
    	$VoteAnswer=VoteAnswer::where(['user_id'=>Auth::user()->id,'answer_id'=>$req->answer_id])->get();
    	if($VoteAnswer->count())
    	{
    		VoteAnswer::find($VoteAnswer->first()->id)->delete();
    		return 'true';
    	}
    	else
    	{
    		return 'false';
    	}
    }
}
