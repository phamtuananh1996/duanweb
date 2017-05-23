<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Test;
class TestController extends Controller
{
    public function index()
    {
    	return view('tests.index');
    }

    public function create()
    {
    	return view('tests.create_st1');
    }

    public function store()
    {
        //demo with test type is writing test
    	return view ('tests.create_st2_writing');
    }
}
