<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Test;
use App\categories;
use Auth;
use App\WritingTest;
class TestController extends Controller
{
    public function index()
    {
        $tests = Test::all();
    	return view('tests.index',compact('tests'));
    }

    public function show($id)
    {
        $test = Test::find($id);
        return view('tests.show',compact('test'));
    }
    public function create()
    {   
        $superCategories = Categories::where('super_category_id',0)->orderBy('order_display')->get();
        $categories=categories::all();
    	return view('tests.create_st1',compact('categories','superCategories'));
    }

    public function store(Request $req)
    {
       
        $test=new Test;
        $test->user_id=Auth::user()->id;
        $test->title=$req->title;
        $test->number_of_questions=$req->number_of_questions;
        $test->total_time=$req->total_time;
        $test->category_id=$req->category;
        $test->test_type=$req->test_type;
        $test->level=$req->level;
        $test->save();
        if ($test->test_type == 0) {
            return view('tests.create_st2_multi',compact('test'));
        } else {
            return view('tests.create_st2_writing',compact('test'));
        }	
    }

    public function edit(Request $rq)
    {
        $test = Test::find($rq->test_id);
        $test->title=$rq->title;
        $test->number_of_questions=$rq->number_of_questions;
        $test->total_time=$rq->total_time;
        $test->category_id=$rq->category;
        $test->test_type=$rq->test_type;
        $test->level=$rq->level;
        $test->save();
        return redirect('tests/user/created/show/'.$test->id);
    }

    public function showCreateStep2($test_id) {
        $test = Test::find($test_id);
        if ($test->test_type == 0) {
            return view('tests.create_st2_multi',compact('test'));
        } else {
            return view('tests.create_st2_writing',compact('test'));
       }   
    }

    public function userTest(Request $rq) {
        $is_time_count = $rq->is_time_count;
        $test = Test::find($rq->test_id);
        return view('tests.user_test',compact('test','is_time_count'));
    }

    public function deleteTest($id)
    {
        $test=Test::find($id);
        if($test)
        {
            $test->delete();
            
        }
       return redirect('tests/user/created');
    }


}
