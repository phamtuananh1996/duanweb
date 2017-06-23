<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TestComment;
use Auth;
class TestCommentController extends Controller
{
	public function store(Request $req)
	{
		$TestComment=new TestComment;
		$TestComment->user_id=Auth::user()->id;
		$TestComment->test_id=$req->test_id;
		$TestComment->content=$req->content;
		$TestComment->save();
		return $TestComment;
	}
	public function edit(Request $req)
	{
	   $TestComment = TestComment::find($req->id_comment);
       $TestComment->content = $req->comment_content;
       $TestComment->save();
       return response()->json($TestComment);
	}
	public function delete(Request $req)
	{
		 $TestComment = TestComment::find($req->id_comment);
		 $TestComment->delete();
	}
}
