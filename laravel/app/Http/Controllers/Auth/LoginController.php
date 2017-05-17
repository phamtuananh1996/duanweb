<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
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
        if(Auth::attempt(['email' => $req->email, 'password' =>  $req->password]))
        {
            return redirect('home');
        }
        else
        {
            return redirect('login');
        }
    }

    public function postLogout()
    {
        Auth::logout();
       return redirect('login');
    }
}
