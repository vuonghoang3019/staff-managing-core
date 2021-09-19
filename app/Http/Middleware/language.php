<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class language
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $language = session()->get('language', config('app.locale'));
        switch ($language) {
            case 'vi':
                $language = 'vi';
                break;
            default:
                $language = 'en';
                break;
        }
        App::setLocale($language);
        return $next($request);
    }
}
