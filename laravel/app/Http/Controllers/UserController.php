<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Role;
use App\Http\Requests\UserRequest;
use App\Http\Requests\updateUserRequest;

use Hash;

class UserController extends Controller
{
  public function index(){
    $user = User::all();
    //dd($user);
    return view('admin.business.user.index',compact('user'));
  }

  public function getCreate(){
    $role = Role::all();
    return view('admin.business.user.create',compact('role'));
  }

  public function postCreate(UserRequest $request,User $user){

    $user = new User();
    $user->name=$request->name;
    $user->user_name=$request->user_name;
    $user->email=$request->email;
    $user->role_id=$request->role;
    $user->phone=$request->phone;
    $user->class=$request->class;
    $user->gender=$request->gender;
    $user->birthday=$request->birthday;
    if($request->hasFile('avatar')){
      $path = 'images/user/';
      $file = $request->file('avatar');
      $name = $file->getClientOriginalName();
      do{
        $filename = str_random(4)."_".$name;
      }while(file_exists("images/user/".$filename));
      $file->move($path,$filename);
      $user->avatar = $filename;    
    }
    else {
      $user->avatar="";
    }
    $user->local=$request->local;
    $user->coin=$request->coin;
    $user->status=$request->status;
    $user->description=$request->description;
    $user->password=Hash::make($request->password);
    $user->code=$request->code;
    return $user;
    $user->save();
    return redirect('admin/user');
  }

  public function destroy($id){
    $User = User::find($id);
    $User->delete();
    \Session::flash('notify','Xóa thành công');
    return redirect()->route('indexUser');
  }

  public function Show($id){
    $user = User::find($id);
    $role = Role::all();
    return view('admin.business.user.show',compact('user','role'));
  }

  public function update(updateUserRequest $request,User $user){

  }
  public function timeLine($id)
  {
   $user = User::find($id);
   return view('users.timeline', compact('user'));
 }

  public function infoDetail($id) {
    $user = User::find($id);
    return view('users.infodetail',compact('user'));
  }
  public function friends($id)
  {
    $user = User::find($id);
    return view('users.friends',compact('user'));
  }
 public function infoEdit()
 {  if (Auth::check()) {


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
   $user->phone=$req->phone;
   $user->class=$req->class;
   $user->gender=$req->gender;
   $user->birthday=$req->birthday;
   $user->local=$req->local;
   $user->description=$req->description;

      //upload avatar

   if($req->avatar)
   {

    $nameImage=time().".".$req->avatar->getClientOriginalExtension();
    $req->avatar->move('images/users/', $nameImage);
                //nếu ảnh đã tồn tại thì xóa ảnh cũ thay bằng ảnh mới
    if(file_exists('images/users/'.$user->avatar)&&$user->avatar!=null)
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