<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminAcess
{
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check() && auth()->user()->type === 'admin') {
            return $next($request);
        }
        return redirect('/')->with('error', 'Você não tem permissão para acessar esta página.');
    }
}
