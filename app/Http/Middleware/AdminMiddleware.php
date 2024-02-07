<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|array  $roles
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roles)
    {
        // Memeriksa apakah pengguna sudah login
        if (!auth()->check()) {
            return redirect('/login');
        }

        // Mendapatkan ID pengguna yang saat ini masuk
        $userId = auth()->id();

        // Mendapatkan informasi pengguna dari database
        $user = User::find($userId);

        // Memeriksa apakah pengguna ada dan memiliki role yang diperlukan
        if ($user && in_array($user->role, $roles)) {
            return $next($request);
        }

        // Jika pengguna tidak memiliki akses, munculkan halaman error 403
        return abort(403, 'Unauthorized');
    }
}
