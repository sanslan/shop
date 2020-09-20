<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class GetLanguage
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
        $lang = $request->header('Accept-Language') ?? 'az';
        App::setLocale($lang);
        return $next($request);
    }
}
