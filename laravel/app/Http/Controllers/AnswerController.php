<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Answer;
use App\Question;
use Auth;
use Carbon\Carbon;
class AnswerController extends Controller
{
     public function store(Request $rq)
    {
        $answer=Answer::find(1);
    	$answer = new Answer;
    	$answer->user_id = Auth::user()->id;
    	$answer->question_id = $rq->question_id;
    	$answer->content = $rq->content;
    	$answer->save();
        return response()->json($answer);
    }
    public function edit(Request $rq)
    {
        $answer = Answer::find($rq->answer_id);
        $answer->content = $rq->answer_content;
        $answer->save();

        return response()->json($answer);   
    }
      public function delete(Request $rq)
    {
        $answer = Answer::find($rq->answer_id);
        $answer->delete();
        return response()->json($answer);   
    }

}
