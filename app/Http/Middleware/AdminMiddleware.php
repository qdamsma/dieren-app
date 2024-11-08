<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
{
    if (Auth::check() && Auth::user()->role === 'admin') {
        return $next($request);
    }
    if (Auth::check() && Auth::user()->is_blocked) {
        Auth::logout();
        return redirect('/login')->with('error', 'Your account has been blocked.');
    }
    return redirect('/home')->with('error', 'Access Denied');
}
    
}
