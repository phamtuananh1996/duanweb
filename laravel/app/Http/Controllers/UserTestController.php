<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserTest;
use App\Test;
use App\UserWritingTestAnswer;
use Auth;
class UserTestController extends Controller
{
    public function store(Request $rq)
    {
    	$userTest = new UserTest;
    	$userTest->test_id = $rq->test_id;
    	$userTest->user_id = Auth::user()->id;
    	$userTest->save();

    	$userTestAnswer = new UserWritingTestAnswer;
    	$userTestAnswer->user_test_id = $userTest->id;
    	$userTestAnswer->result_content = $rq->user_test_answer;
    	$userTestAnswer->save();
    	return redirect('tests/usetest/result/'.$userTest->id.'/0');
    }

    public function result($usertest_id, $countIsCorrect) {
        $userTest = UserTest::find($usertest_id);
        $user = $userTest->user;
        $test = $userTest->test;
        if ($test->test_type == 0) {
            $multiChoiceTestAnswers = $userTest->multiChoiceTestAnswers;
            return view('tests.test_result',compact('userTest','user','test','multiChoiceTestAnswers','countIsCorrect'));
        }else {
            $userTestAnswers = UserWritingTestAnswer::where('user_test_id',$userTest->id)->get();
            $userTestAnswer = $userTestAnswers[0];
            return view('tests.test_result',compact('userTest','user','test','userTestAnswer'));
        }
    }

    public function testedList() {
        $UserTest=UserTest::where('user_id',Auth::user()->id)->get()->unique('test_id');
        //dd( $UserTest);
        return view('tests.user_tested_list',compact('UserTest'));
    }
}
