<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MultiChoiceTest;
use App\Test;
use App\MultiChoiceTestChoice;
class MultiChoiceTestController extends Controller
{
    public function index($test_id)
    {
        $test = Test::find($test_id);
        return view('tests.create_st2_multi',compact('test'));
    }

    public function ajaxSaveTest(Request $req)
    {
      
       $multiChoiceTest = new MultiChoiceTest;
       $multiChoiceTest->test_id = $req->test_id;
       $multiChoiceTest->title = $req->title;
       $multiChoiceTest->max_point = $req->max_point;
        $multiChoiceTest->save();
       foreach ($req->answer as $key => $value) {

           $MultiChoiceTestChoice=new MultiChoiceTestChoice;
           $MultiChoiceTestChoice->multi_choice_test_id=$multiChoiceTest->id;
           $MultiChoiceTestChoice->title=$value;
           $MultiChoiceTestChoice->save();
            if($req->is_correct==$key)
            {
                 $MultiChoiceTestChoice->is_answer=1;
                 $multiChoiceTest->id_MultiChoiceTestChoice_correct=$MultiChoiceTestChoice->id;
            }
            else
            {
                $MultiChoiceTestChoice->is_answer=0;
            }

            $MultiChoiceTestChoice->save();
            
       }
       $multiChoiceTest->save();
       //added by nham on 1.06.2017 -- update test state to release this test on index page
       $test = Test::find($req->test_id);
       $test->state = 1;
       $test->save();
    }
}
