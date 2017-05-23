<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Test;
use App\categories;
use Auth;
use App\writing_test;
class TestController extends Controller
{
    public function index()
    {
    	return view('tests.index');
    }

    public function create()
    {
        $categories=categories::all();
    	return view('tests.create_st1',compact('categories'));
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
        //demo with test type is writing test
    	return view('tests.create_st2_writing',compact('test'));
    }

    public function saveTest(Request $req)
    {
       $write_test=new writing_test;
       $write_test->test_id=$req->test_id;
       $write_test->content=$req->question;
       $write_test->explan=$req->answer;
       $write_test->save();
       return redirect('tests');
    }
}
