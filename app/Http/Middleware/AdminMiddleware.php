<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if user is authenticated
        if (!Auth::check()) {
            return redirect()->route('admin.login')->with('error', 'Please login first.');
        }

        // Check if user is an admin
        if (!Auth::user()->is_admin) {
            Auth::logout();
            return redirect()->route('admin.login')->with('error', 'Unauthorized access. Admin privileges required.');
        }

        // Check if the user's is_admin attribute is properly set
        if (!is_bool(Auth::user()->is_admin)) {
            Auth::logout();
            return redirect()->route('admin.login')->with('error', 'Invalid user configuration. Please contact support.');
        }

        return $next($request);
    }
}