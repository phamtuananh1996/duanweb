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
}
