<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AminOrSuperAdminOnlyRoutes
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();
            // 1 is super admin and 2 is admin
            return $user->role == 1 || $user->role == 2 ? $next($request) : redirect('/404');
        }
        return redirect('/login');
    }
}
