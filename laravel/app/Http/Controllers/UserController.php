<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
class UserController extends Controller
{
    public function info($id)
    {
    	$user = User::find($id);
    	return view('users.infodetail', compact('user'));
    }

    public function infoEdit($id)
    {	
    	$user = User::find($id);
    	return view('users.info_edit',compact('user'));
    }
}
