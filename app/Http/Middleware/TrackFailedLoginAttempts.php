<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\FailedLogins;
use Illuminate\Support\Facades\Throttle;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class TrackFailedLoginAttempts
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Throttle::get($request, 5, 1)->check()) {
            // Too many login attempts within a short time
            // Log this failed login attempt
            FailedLogin::create([
                'ip_address' => $request->ip(),
                'email' => $request->input('email'),
            ]);

            return redirect()->route('auth.locked-out')->with('seconds', 60);
        }
        
        

        return $next($request);
    }
}
