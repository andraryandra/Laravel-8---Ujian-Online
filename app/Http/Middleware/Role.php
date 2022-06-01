<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        if ($user->role == 'admin' || $user->role == 'guru' || $user->role == 'siswa') {
            return $next($request);
        } elseif($user->role == 'guru') {
            return redirect('/blank');
        } elseif($user->role == 'siswa') {
            return redirect('/blank');
        }

        return $next($request);
    }
}
