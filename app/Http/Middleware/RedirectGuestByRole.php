<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectGuestByRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $user = Auth::user();

            if (!$user->is_onboarded) {
                return redirect()->route('onboarding');
            } else {
                return $user->globals_role == 'user' ? redirect()->route('user.home') : redirect()->route('admin.home');
            }
        }

        return $next($request);
    }
}
