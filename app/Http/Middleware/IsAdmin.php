<?php

namespace App\Http\Middleware;

use Closure;

class IsAdmin
{
    public function handle($request, Closure $next)
    {
        // Middleware sederhana untuk debugging
        return $next($request);
    }
}