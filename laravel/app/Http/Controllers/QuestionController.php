<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
class QuestionController extends Controller
{
    public function index()
    {
    	$questions = Question::all();
    	return view('qaviews.index',compact('questions'));
    }

    public function create() {

    }

    public function store() {

    }

    public function show($id) {

    }
    
}
