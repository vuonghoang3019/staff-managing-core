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
        return $next($request);
//        if (Auth::check())
//        {
//            $user = Auth::user();
//            if ($user->status == 1)
//            {
//                return $next($request);
//            }
//            else
//            {
//                Auth::logout();
//                return redirect()->route('login');
//            }
//        }
//        else
//        {
//            return redirect()->route('login');
//        }
    }
}
