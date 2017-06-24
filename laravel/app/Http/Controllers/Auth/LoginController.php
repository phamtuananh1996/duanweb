<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Http\Request;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
    //     $this->middleware('guest')->except('logout');
    // }

    public function getLogin()
    {
        if(Auth::check())
        {
            return redirect('home');
        }
        else
        {
            return view('auth.login');
        }
    }

    public function postLogin(Request $req)
    {
        
        $remember=false;   

        if($req->accept_rule=='on')
        {
             $remember=true;
        }
        if(Auth::attempt(['email' => $req->email, 'password' => $req->password,'status'=>1],$remember) or Auth::attempt(['user_name' => $req->email, 'password' => $req->password,'status'=>1],$remember))
        {
            return redirect('/');
        }
        else
        {
            return redirect('login')->with(['errorr'=>'Tài Khoản mật khẩu không chính xác']);
        }
    }

    public function postLogout()
    {
        Auth::logout();
        return redirect('login');
    }


    public function getRegister()
    {
        if(Auth::check())
        {
            return redirect('home');
        }
        else
        {
            return view('auth.register');
        }
    }

    public function postRegister(Request $req)
    {
        
    }


}
