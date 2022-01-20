<?php

namespace App\Http\Middleware;

use Closure;

class AuthUser
{
    public function handle($request, Closure $next)
    {
        if(auth()->check()) {
            if (!auth()->user()->admin())
                return $next($request);
        }

        return redirect('/');
    }
}
