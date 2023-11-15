<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next,$role)
    {
        if (!auth()->check()) {
            // Pengguna sudah login, lanjutkan ke request selanjutnya
            return redirect('/login');
        }


        $userId = auth()->id(); // ID pengguna yang saat ini masuk
        
        $user = User::find($userId);

        // dd($role);
        if ($user) {
            $databaseValue = $user->role; // Ganti dengan nama kolom di database Anda
            if ($databaseValue === (int)$role) {
                return $next($request);
            }
        }

        return abort(403, 'Unauthorized');
    }
}
