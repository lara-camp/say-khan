<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckGuest
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
        if (Auth::guard('doctor')->check()) {
            // Redirect authenticated doctors to the doctor dashboard
            return redirect()->route('doctor.index'); // Replace 'doctor.dashboard' with the actual doctor dashboard route name
        } elseif (Auth::guard('assistant')->check()) {
            // Redirect authenticated assistants to the assistant dashboard
            return redirect()->route('assistant.index'); // Replace 'assistant.dashboard' with the actual assistant dashboard route name
        } elseif (Auth::guard('admin')->check()) {
            // Redirect authenticated admins to the admin dashboard
            return redirect()->route('admin.index'); // Replace 'admin.dashboard' with the actual admin dashboard route name
        }

        return $next($request);
    }
}
