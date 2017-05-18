<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Auth;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('guest');
    // }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'class' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'user_name' => $data['user_name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'class' => $data['class'],
            'local' => $data['local'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function ajaxCheckEmail(Request $req)
    {
        $user=User::where(['email'=>$req->email,'status'=>1]);
        if($user->count()>0)
        {
            return 'false';
        }
        else
        {
            return 'true';
        }
    }

    public function ajaxCheckUserName(Request $req)
    {
         $user=User::where(['user_name'=>$req->username,'status'=>1]);
        if($user->count()>0)
        {
            return 'false';
        }
        else
        {
            return 'true';
        }
    }

    public function postRegister(Request $req)
    {
        
       $user =new User;
       $user->name=$req->name;
       $user->user_name=$req->user_name;
        $user->email=$req->email;
        $user->password=bcrypt($req->password);
        $user->local=$req->local;
        $user->class=$req->class;
        $user->phone=$req->phone;
        $user->save();
        Auth::login($user);
        return redirect('home');
    }
}
