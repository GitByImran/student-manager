<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckStudentLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    public function handle(Request $request, Closure $next)
    {
        if (!Auth::guard('student')->check()) {
            if (Auth::check()) {
                return $next($request);
            }

            return redirect()->route('student.login')->with('error', 'You need to log in first.');
        }

        return $next($request);
    }
}
