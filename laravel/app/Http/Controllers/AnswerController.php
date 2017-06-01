<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Answer;
use App\Question;
use App\Categories;
use Auth;
class AnswerController extends Controller
{
     public function store(Request $rq)
    {
    	$answer = new Answer;
    	$answer->user_id = Auth::user()->id;
    	$answer->question_id = $rq->question_id;
    	$answer->content = $rq->content;
    	$answer->save();
        return response()->json($answer);
    }
}
