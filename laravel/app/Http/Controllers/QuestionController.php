<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Categories;
use Auth;
class QuestionController extends Controller
{
    public function index()
    {
        $categories = Categories::all();
    	$questions = Question::all();
    	return view('qaviews.index',compact('questions','categories'));
    }

    public function create() {

    }

    public function store(Request $rq) {
        $question = new Question;
        $question->user_id = Auth::user()->id;
        $question->categories_id = $rq->category;
        $question->question_title = $rq->title;
        $question->question_content = $rq->content;
        $question->is_resolved = false;
        $question->vote_count = 0;
        $question->view_count = 0;
        $question->answer_count= 0;
        $question->as_anonymously = false;
        // if($rq->has('as_anonymously')) {
        //     $question->as_anonymously = true;
        // } else {
        //     $question->as_anonymously = false;
        // }
        $question->save();

        $categories =Categories::all();
        return view('qaviews.showQuestion',compact('question','categories'));
    }

    public function show($id) {
         $question = Question::find($id);
        // $question->view_count ++;
        // $question->save();
        $categories =Categories::all();
        return view('qaviews.showQuestion',compact('question','categories'));
    }

    public function resolved(Request $rq)
    {
        $question = Question::find($rq->question_id);
        $question->is_resolved = true;
        $question->save();
        return back();
    }
    
    public function edit(Request $rq)
    {
        // dd($rq);
        Question::where('id',$rq->question_id)
         ->update(['question_title' => $rq->edit_title,'question_content' =>  $rq->edit_content,'is_resolved'=>false ]);
        return back();
    }
}
