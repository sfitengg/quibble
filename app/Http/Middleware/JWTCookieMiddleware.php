<?php

namespace App\Http\Middleware;

use Closure;

class JWTCookieMiddleware
{
    /**
     * Copies the token which is stored in cookie
     * into the request's query parameter 
     * "token". This is because tymon/jwt-auth
     * don't read token from cookie
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $token = str_replace('Bearer ','',$request->cookie('token'));
        if(!empty(trim($token))){
            // Copy the cookie token to request
            $request->request->add(['token'=>$token]);
        }
        return $next($request);
    }
}
