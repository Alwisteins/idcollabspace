<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            if (!Auth::user()->is_onboarded) {
                return redirect()->route('onboarding');
            }

            if (Auth::user()->globals_role === "user") {
                return $next($request);
            } else {
                return redirect()->route('admin.home');
            }
        } else {
            return redirect()->route('login');
        }
    }
}
