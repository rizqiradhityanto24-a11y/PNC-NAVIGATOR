<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuth
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect('/admin/login');
        }

        $user = Auth::user();
        if (!$user->is_admin) {
            return redirect('/admin/login')->with('error', 'Hanya admin yang bisa akses.');
        }

        return $next($request);
    }
}