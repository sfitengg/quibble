<?php

namespace App\Http\Middleware;

use Closure;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

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
            if (JWTAuth::parseToken()->authenticate()) {
                $token = JWTAuth::getToken();
                if (($request->isMethod('get') && $request->is(route('login'))) || 
                !$request->expectsJson()) {
                    return redirect()->route('home',['token'=>$token]);
                }
            
                return response()->json(['error'=>'Access denied.','redirect'=>'/?token='.$token]);
            }
        }catch(JWTException $e){
            // return response()->json(['error'=>$e]);
        }

        return $next($request);
    }
}
