<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Auth;
use Mail;
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
        try{
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
        catch(\Exception $e){
            return 'true';
        }
        
    }

    public function ajaxCheckUserName(Request $req)
    {
         try{
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
        catch(\Exception $e){
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
        $user->status=0;
        $user->code=base64_encode(base64_encode(time()));
        $user->save();

        //gửi mail

        $data=$req->toArray();
        $data['link']=$_SERVER['REDIRECT_URL'].'/comfirm?code='. $user->code.'&email='.$req->email;
        Mail::send('email.register_comfirm',$data, function ($message) use ($data){
            $message->from('phamtuananh1110@gmail.com', 'Hoc2H');
          
            $message->to($data['email'],$data['name']);

            $message->replyTo('phamtuananh1110@gmail.com', 'Hoc2H');
        
            $message->subject('kích hoạt tai khoản');
        });

        return 'kiem tra mail';
    }


    public function registerComfirm(Request $req)
    {
        $user=User::where(['email'=>$req->email,'code'=>$req->code])->first();

       
        if($user->count()>0)
        {
            $user->status=1;
            $user->code='';
            $user->save();

            //xóa user chưa kích hoạt

            $users=User::where(['email'=>$req->email,'status'=>0]);
            $users->delete();

            return redirect('login')->with(['sucsecc'=>'Xác nhận thành công hãy đăng nhập']);
        }
        else
        {
            return redirect('404');
        }
    }
}
