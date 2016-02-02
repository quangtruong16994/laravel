<?php

namespace App\Http\Middleware;

use Closure;
use Cache;

class BeforeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $key = $request->url();
        if (Cache::has($key)) return Cache::get($key);
        return $next($request);
    }
}
