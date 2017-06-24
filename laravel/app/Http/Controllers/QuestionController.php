<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Categories;
use App\FollowQuestion;
use Auth;
use Carbon\Carbon;
use DB;
class QuestionController extends Controller
{
    public function index()
    {
        $superCategories = Categories::where('super_category_id',0)->orderBy('order_display')->get();
    	$questions = Question::all()->sortByDesc('id');
    	return view('qaviews.index',compact('questions','categories','superCategories'));
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
        $superCategories = Categories::where('super_category_id',0)->orderBy('order_display')->get();
        return view('qaviews.showQuestion',compact('question','superCategories'));
    }

    public function showMyQuestion() {
        $questions = Question::where('user_id',Auth::user()->id)->get();
        $superCategories = Categories::where('super_category_id',0)->get();
        return view('qaviews.index',compact('questions','superCategories'));
    }

    public function showMyFollowing(){
       
        $questions = Auth::user()->listFollowingQuestions()->get();
       $superCategories = Categories::where('super_category_id',0)->orderBy('order_display')->get();
        return view('qaviews.index',compact('questions','superCategories'));
    }

    public function showAllResolved() {
        $questions = Question::where('is_resolved',true)->get();
        $superCategories = Categories::where('super_category_id',0)->orderBy('order_display')->get();
        return view('qaviews.index',compact('questions','superCategories'));
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
        $superCategories = Categories::where('super_category_id',0)->orderBy('order_display')->get();
        $questions = Question::all()->sortByDesc('id');
        return view('qaviews.index',compact('questions','superCategories'));
    }
    
}
