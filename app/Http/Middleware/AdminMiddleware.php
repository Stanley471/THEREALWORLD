<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        // Allow if user has 'admin' role (Spatie) OR is user id=1 (fallback)
        $user = auth()->user();
        $isAdmin = ($user->hasRole('admin') ?? false) || $user->id === 1;

        if (!$isAdmin) {
            abort(403, 'Access denied. Admins only.');
        }

        return $next($request);
    }
}
