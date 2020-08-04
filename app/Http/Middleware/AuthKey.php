<?php

namespace App\Http\Middleware;

use Closure;

class AuthKey
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $token = request()->header('App-Key');
        if($token != "ABCDEFGHIJKLM123" ){
            return response()->json(['message'=>"clef de l application introuvable"],401);
        }
        return $next($request);
    }
}
