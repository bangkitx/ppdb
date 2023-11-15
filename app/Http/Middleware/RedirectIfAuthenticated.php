<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                switch (Auth::guard($guard)->user()->role){
                    // Redirect Admin Dashboard
                    case 0:
                     return redirect('/home');
                    case 1:
                     return redirect('/siswa');
                    break;
 
                   // If need any Roles for example:
                //    case: 'RoleName':
                //    return redirect('url');
                //    break;
                //    default: return  redirect('/GeneralDashboard');
                }
            }
        }

        return $next($request);
    }
}
