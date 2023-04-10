<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class StaffMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //admin role == 1
        //user role == 0
        //employee role == 2
        if(Auth::check() && Auth::user()->role == 2){
            return $next($request);
        }
        return abort(403, 'You are not personnal');
    }
}
