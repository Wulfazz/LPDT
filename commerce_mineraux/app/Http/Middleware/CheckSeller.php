<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckSeller
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->user_type === 'seller') {
            return $next($request);
        }
        return redirect('/');
    }
}
