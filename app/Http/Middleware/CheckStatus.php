<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckStatus
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
        $response = $next($request);
        if(Auth::guard('student')->check() && Auth::guard('student')->user()->status != 1){
            Auth::logout();
            return redirect()->route('login')->with('error', 'Email của bạn chưa kích hoạt, vui lòng kích hoạt Email');
        }
        return $response;
    }
}
