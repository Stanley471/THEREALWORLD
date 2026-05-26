<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureSubscribed
{
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $user = auth()->user();

        // If the user has an explicit `is_subscribed` attribute treat truthy as subscribed.
        // If the attribute is missing or falsy, require checkout.
        $isSubscribed = $user->is_subscribed ?? false;

        if ($isSubscribed) {
            return $next($request);
        }

        return redirect()->route('checkout')->with('info', 'Please subscribe to access this page.');
    }
}
