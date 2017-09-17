<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

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
    public function __construct(){
        $this->middleware('guest')->except('logout');
    }
    
    protected function sendLoginResponse(Request $request, $token){
        $this->clearLoginAttempts($request);     
        return $this->authenticated($request, $this->guard()->user(), $token);
    }

    protected function authenticated(Request $request, $user, $token){
        return response()->json([
            'token' => $token,
            'redirect' => session()->get('url.intended'),
        ])->header("Authorization","Bearer $token");
    }

    protected function sendFailedLoginResponse(Request $request){
        return response()->json([
            'error' => 'Login failed',
        ], 401);
    }
    
    /**
    * Send the response after the user was authenticated.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    
    public function login(Request $request){
        $this->validateLogin($request);
        
        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            
            return $this->sendLockoutResponse($request);
        }
        
        $credentials = $this->credentials($request);
        try{
            
            if ($token = JWTAuth::attempt($credentials)){
                return $this->sendLoginResponse($request,$token);
            }
        }catch(JWTException $e){
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
        
        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);
        
        return $this->sendFailedLoginResponse($request);
    }


    public function logout(){
        JWTAuth::invalidate(JWTAuth::getToken());

        return redirect()->route('login');
    }
}