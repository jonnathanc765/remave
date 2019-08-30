<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        /* Redirect depending type of user */
        if (Auth::guard($guard)->check()) {
            if (Auth::user()->hasRole('superadmin')) {
                return redirect()->route('administrator');
            } elseif (Auth::user()->hasAllRoles('provider|client')) {
                return redirect()->route('provider');
            } elseif (Auth::user()->hasRole('client')) {
                return redirect()->route('home');
            }
        }
        return $next($request);
    }
}
