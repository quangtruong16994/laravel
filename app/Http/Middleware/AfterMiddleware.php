<?php

namespace App\Http\Middleware;

use Closure;
use Cache;

class AfterMiddleware
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
        $response = $next($request);
        $key = $request->url();
        if (!Cache::has($key)) {
            Cache::put($key, $response->getContent(), 60);
        }
        return $next($request);
    }
}
