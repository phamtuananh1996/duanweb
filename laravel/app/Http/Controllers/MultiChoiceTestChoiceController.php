<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MultiChoiceTestChoice;
use App\MultiChoiceTest;
use App\Test;

class MultiChoiceTestChoiceController extends Controller
{
    public function store(Request $rq)
    {	

    	$answer = new MultiChoiceTestChoice;
    	$answer->multi_choice_test_id = $rq->multi_choice_test_id;
    	$answer->title = $rq->title;
        if($rq->is_correct == 0) {
    	   $answer->is_answer = 1;
        } else {
              $answer->is_answer = 0;
        }
    	$answer->save();
        return redirect('tests/createst2/multi/index/'.$rq->test_id);
    }
}
