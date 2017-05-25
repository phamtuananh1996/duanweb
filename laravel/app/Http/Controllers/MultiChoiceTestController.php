<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MultiChoiceTest;
use App\Test;
class MultiChoiceTestController extends Controller
{
    public function index($test_id)
    {
        $test = Test::find($test_id);
        return view('tests.create_st2_multi',compact('test'));
    }
    public function store(Request $req)
    {
    	$multiChoiceTest = new MultiChoiceTest;
    	$multiChoiceTest->test_id = $req->test_id;
    	$multiChoiceTest->title = $req->title;
    	$multiChoiceTest->max_point = $req->max_point;
    	$multiChoiceTest->question_time = $req->question_time;
    	$multiChoiceTest->explan = $req->explan;
    	$multiChoiceTest->save();
        $test = Test::find($req->test_id);
    	return view('tests.create_st2_multi', compact('test'));
    }

    public function updateState(Request $rq) {

        $question = MultiChoiceTest::find($rq->multi_choice_test_id);
        $question->state = 1;
        $question->save();

        $test = Test::find($question->test_id);
        return redirect('tests/createst2/multi/index/'.$test->id);
    }
}
