<?php

namespace App\Http\Middleware;

use Closure;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

class RedirectIfAuthenticatedViaJwt
{
    /**
    * Handle an incoming request.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \Closure  $next
    * @param  string|null  $guard
    * @return mixed
    */
    public function handle($request, Closure $next, $guard = null)
    {
        try{
            try{
                if (JWTAuth::parseToken()->authenticate()) {
                    $token = JWTAuth::getToken();
                    if (($request->isMethod('get') && $request->is(route('login'))) || 
                    !$request->expectsJson()){
                        return redirect()->route('home',['token'=>$token]);
                    }
                    
                    //Return error in json format, if json is expected
                    return response()->json(['error'=>'Access denied.','redirect'=>'/?token='.$token]);
                }
            }catch(\Exception $e){
                // If there is token error, then only show
                // the error if request is except for login.
                if(!$request->is('*/login')){
                    // Throw error if url is other than
                    // login
                    throw $e;
                }
            }
        }catch (TokenExpiredException $e) {
            return response()->json(['error'=>'token_expired']);
        }catch (TokenInvalidException $e) {
            return response()->json(['error'=>'token_invalid']);
        }catch (JWTException $e) {
            return response()->json(['error'=>'token_absent']);
        }
        
        return $next($request);
    }
}
