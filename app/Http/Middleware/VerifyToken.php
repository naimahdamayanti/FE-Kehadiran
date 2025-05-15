<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerifyToken
{
    public function handle(Request $request, Closure $next, $role = null)
    {
        if (!session()->has('token') || !session()->has('user_id')) {
            return redirect()->route('login')->withErrors(['login_error' => 'Silakan login terlebih dahulu']);
        }
        if ($role && session('role') !== $role) {
            return redirect()->route('dashboard')->withErrors(['Unauthorized' => '']);
        }
        return $next($request);
    }
}
