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

    public function editUser(Request $req)
    {
    	if (Auth::check()) {
    		
    	
    	$user=User::find(Auth::user()->id);

    	$user->name=$req->name;
    	$user->phone=$req->phone;
    	$user->class=$req->class;
    	$user->gender=$req->gender;
    	$user->birthday=$req->birthday;
    	$user->local=$req->local;
    	$user->description=$req->description;

    	//upload avatar

    	 if($req->avatar)
            {
                $nameImage=$req->avatar->getClientOriginalName().time().".".$req->avatar->getClientOriginalExtension();
                $req->avatar->move('images/users', $nameImage);
                //nếu ảnh đã tồn tại thì xóa ảnh cũ thay bằng ảnh mới
                if(file_exists('images/users/'.$user->avatar))
                {
                	unlink('images/users/'.$user->avatar);
                }

                $user->avatar=$nameImage;
             }

           $user->save();

          return redirect('info');
      }
      else
      {
      	return redirect('login');
      }

    }
}
