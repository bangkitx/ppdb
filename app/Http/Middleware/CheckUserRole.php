<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        if (auth()->check()) {
            $user = auth()->user();
            if ($user->role === 0) {
                // User role is 0, redirect to '/home'
                return redirect('/home');
            } elseif ($user->role === 1) {
                // User role is 1, redirect to '/siswa'
                return redirect('/siswa');
            }
        }

        // Continue to the next middleware or route handler
        return $next($request);
    }
}
