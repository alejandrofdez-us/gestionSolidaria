<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;

class VolunteerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->user() && $request->user()->userType != 'voluntario')
        {
            return new Response(view('unauthorized')->with('role', 'voluntario'));
        }

        return $next($request);
    }
}
