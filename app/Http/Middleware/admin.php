<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // auth() es igual a Auth::user()
        // auth() es un helper de laravel
        // Auth es una fachada de laravel 
        if(Auth::user()->role !== 'admin'){
            return redirect('/');
        }

        return $next($request);
    }
}
