<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

/*use Illuminate\Support\Facades\Validator as Validator;
use Illuminate\Support\Facades\Input as Input;
use Illuminate\Support\Facades\Auth as Auth;*/

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
    protected $redirectTo = '/';
    
    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    /**
    * Send the response after the user was authenticated.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();
        
        $this->clearLoginAttempts($request);
        if($request->expectsJson()){
            return $this->authenticated($request, $this->guard()->user())
            ?: response()->json(['success'=>'Login was successful','redirect'=>$this->redirectTo]);
        }
        
        return $this->authenticated($request, $this->guard()->user())
        ?: redirect()->intended($this->redirectPath());
    }
    
    public function doLogin(Request $request){
        /*$rules = [
            'email' => 'required',
            'password' => 'required'
        ];
        
        $validator = Validator::make(Input::all(),$rules);
        if($validator->fails()){
            return response()->json([
                'errors'=>$validator->errors()
                ]);
            }
            
            $userdata = [
                'email' => Input::get('email'),
                'password' => Input::get('password'),
            ];
            
            if(!Auth::attempt($userdata)){
                return response()->json([
                    'error'=> 'Invalid email/password'
                    ]);
                }
                
                return redirect()->intended($redirectTo);*/
                
                return $this->login($request);
                //return response()->json(['op'=>print_r($response)]);
            }
        }
        