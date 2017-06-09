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

    public function infoEdit()
    {	if (Auth::check()) {
        
  
    	   $user = User::find(Auth::user()->id);
    	   return view('users.info_edit',compact('user'));

          }

          else
          {
            return redirect('login');
          }
    }

    public function editUser(Request $req)
    {   
    	if (Auth::check()) {
    	$user=User::find(Auth::user()->id);

    	$user->name=trim($req->name);
    	$user->phone=trim($req->phone);
    	$user->class=trim($req->class);
    	$user->gender=$req->gender;
    	$user->birthday=$req->birthday;
    	$user->local=trim($req->local);
    	$user->description=trim($req->description);

    	//upload avatar

    	 if($req->avatar)
            {
               
                $nameImage=time().".".$req->avatar->getClientOriginalExtension();
                $req->avatar->move('images/users/', $nameImage);
                //nếu ảnh đã tồn tại thì xóa ảnh cũ thay bằng ảnh mới
                if(file_exists('images/users/'.$user->avatar)&&$user->avatar!='profile.jqg')
                {
                	unlink('images/users/'.$user->avatar);
                }
                $user->avatar=$nameImage; 
             }

           $user->save();

          return redirect('users/infodetail/'.Auth::user()->id);
      }
      else
      {
      	return redirect('login');
      }

    }

}
