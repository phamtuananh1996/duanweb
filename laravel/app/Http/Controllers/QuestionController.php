<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Categories;
use Auth;
use Carbon\Carbon;
class QuestionController extends Controller
{
    public function index()
    {
        $categories = Categories::all();
    	$questions = Question::all()->sortByDesc('id');
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
        return redirect('qa/show/'.$question->id);
    }

    public function show($id) {
       
        $question = Question::find($id);
        $question->view_count++;
        $question->save();
        $categories =Categories::all();
        return view('qaviews.showQuestion',compact('question','categories'));
    }

    public function resolve(Request $rq)
    {
        $question = Question::find($rq->question_id);

        if ( $question->is_resolved == true) {
            $question->is_resolved = false;
        } else {
            $question->is_resolved = true;
        }
        $question->save(); 
        return response()->json($question);
    }
    
    public function edit(Request $rq)
    {
       $question = Question::find($rq->question_id);
       $question->question_title = $rq->title;
       $question->question_content = $rq->content;
       $question->save();
       return response()->json($question);
    }

    public function delete(Request $rq)
    {
        $question = Question::find($rq->question_id);
        $question->delete();
        $categories = Categories::all();
        $questions = Question::all()->sortByDesc('id');
        return view('qaviews.index',compact('questions','categories'));
    }
    
}
