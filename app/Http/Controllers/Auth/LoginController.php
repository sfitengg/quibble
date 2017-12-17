<?php

namespace App\Http\Controllers\Auth;

use Validator;
use Exception;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;

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
    use ThrottlesLogins;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Credentials required for login
     *
     * @var array
     */
    protected $credentials = ['email','password'];

    /**
     * Custom validation messages
     *
     * @var array
     */
    protected $validationMessage = [
        'required' => 'The :attribute is required',
        'email'    => 'Invalid email-id',
    ];
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        $this->middleware('guest')->except('logout');
    }
    
    /**
     * Displays the login form
     *
     * @return void
     */
    public function showLoginForm(){
        return view('auth.login');
    }

    /**
     * Performs user authentication and generates token for
     * authenticated users.
     *
     * @param Request $request
     * @return void
     */
    public function login(Request $request)
    {
        // Disable login for certain time if
        // too many failed attempts occur
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }

        // Validate input parameters
        try{
            $this->validateLogin($request);
        }catch(Exception $e){
            return $this->sendValidationFailedResponse($e);
        }
        

        // Retrieve login details
        $credentials = $this->credentials($request);

        // Authenticate user
        try{
            if ($token = JWTAuth::attempt($credentials)) {
                // User authenticated
                return $this->sendLoginResponse($request , $token);
            }
        }catch(JWTException $e){
            return $this->sendTokenErrorResponse($e);
        }

        // Authentication failed
        return $this->sendFailedLoginResponse($request);
    }

    /**
     * Validated the input parameters for login
     *
     * @param Request $request
     * @return void
     */
    public function validateLogin(Request $request)
    {
        $validator = Validator::make(
            $this->credentials($request) ,
            [
                'email' => 'required|email',
                'password' => 'required|string'
            ] ,
            $this->validationMessage
        );

        if ($validator->fails()) {
            throw new Exception($validator->errors()->first());
        }
    }

    protected function sendValidationFailedResponse(Exception $e){
        return response()->json(['error'=>$e->getMessage()]);
    }

    /**
     * Returns the credentials from Request
     *
     * @param Request $request
     * @return void
     */
    protected function credentials(Request $request)
    {
        return $request->only($this->credentials);
    }

    /**
     * Sends a lockout response when exceeded
     * login attempts
     *
     * @param Request $request
     * @return void
     */
    /*protected function sendLockoutResponse(Request $request)
    {
        $seconds = $this->limiter()->availableIn(
            $this->throttleKey($request)
        );

        return response()->json(
            [
                'error'=>"Too many login attempts.Please login after {$seconds}sec."
            ]
        );
    }*/

    /**
     * Performs failed login process
     *
     * @param Request $request
     * @return void
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        // Increment failed login attempts
        $this->incrementLoginAttempts($request);

        return response()->json(['error'=>'Email/password is invalid'] , 401);
    }

    /**
     * Performs post login task
     *
     * @param Request $request
     * @param string $token
     * @return void
     */
    protected function sendLoginResponse(Request $request,string $token)
    {
        // Clear failed login attempts
        $this->clearLoginAttempts($request);

        return response()->json(
            [
                'success' => 1,
                'token' => $token,
            ]
        );
    }

    /**
     * Sends a server error as response when
     * there is some token related exception
     *
     * @param JWTException $e
     * @return void
     */
    protected function sendTokenErrorResponse(JWTException $e)
    {
        //Create an notice log
        Log::notice('token_create_exception:'.$e);
        return response()->json(['error' => 'Oops! Something went wrong..'] , 500);
    }

    /**
     * Invalidates JWT token and logout the user
     * from the application
     *
     * @return void
     */
    public function logout()
    {
        JWTAuth::invalidate(JWTAuth::getToken());

        return redirect()->route('login');
    }

    /**
     * Returns the username that is to be used
     * by the controller
     *
     * @return void
     */
    protected function username()
    {
        return 'email';
    }
}