<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsCliente
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
        if (auth()->check() && auth()->user()->rol === 'cliente') {
            return $next($request);
        }

        // If user is authenticated but not cliente, redirect to appropriate dashboard
        if (auth()->check()) {
            return redirect('/admin');
        }

        // If not authenticated, redirect to login
        return redirect('/login');
    }
}