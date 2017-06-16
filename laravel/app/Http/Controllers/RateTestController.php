<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RateTest;
use Auth;
class RateTestController extends Controller
{
    public function store(Request $req)
    {
    	if(RateTest::where(['user_id'=>Auth::user()->id,'test_id'=>$req->test_id])->get()->count()==0)
    	{
    		$RateTest=new RateTest;
    		$RateTest->test_id=$req->test_id;
    		$RateTest->user_id=Auth::user()->id;
    		$RateTest->rate=$req->rate;
    		$RateTest->save();

    		return round(RateTest::where(['user_id'=>Auth::user()->id,'test_id'=>$req->test_id])->avg('rate'));
    	}
    	else
    	{
    		$Rate=RateTest::where(['user_id'=>Auth::user()->id,'test_id'=>$req->test_id])->first();
    		$RateTest=RateTest::find($Rate->id);
    		$RateTest->test_id=$req->test_id;
    		$RateTest->user_id=Auth::user()->id;
    		$RateTest->rate=$req->rate;
    		$RateTest->save();
    		return round(RateTest::where(['user_id'=>Auth::user()->id,'test_id'=>$req->test_id])->avg('rate'));
    	}
    }
}
