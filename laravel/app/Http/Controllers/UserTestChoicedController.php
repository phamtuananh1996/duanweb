<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MultiChoiceTest;
use App\UserTestChoiced;
use App\UserTest;
use Auth;
class UserTestChoicedController extends Controller
{
    public function store(Request $req)
    {
        //dd($req);
    	$userTest = new UserTest;
    	$userTest->test_id = $req->test_id;
    	$userTest->user_id = Auth::user()->id;
        $userTest->save();
        $countIsCorrect=0;
    	foreach ($req->all() as $key => $value) {
    		if($key!='test_id' &&  $key!='_token')
    		{
                if(MultiChoiceTest::find($key)->where('id_MultiChoiceTestChoice_correct',$value)->count())
                {
                    $countIsCorrect++;
                }

    			$UserTestChoiced=new UserTestChoiced;
    			$UserTestChoiced->user_test_id=$userTest->id;
    			$UserTestChoiced->multi_choice_test_id=$key;
    			$UserTestChoiced->user_test_choiced=$value;
    			$UserTestChoiced->save();
    		}
    	}
        return redirect('tests/usetest/result/'.$userTest->id.'/'.$countIsCorrect);
    }
}
