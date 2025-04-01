<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;

class Role
{
    public function handle($request, Closure $next, string $role)
    {
        if (!Auth::check()) {
            abort(403, 'No tienes permisos para acceder a esta página.');
        }

        if (!Auth::check() || Auth::user()->role !== $role) {
            abort(403, 'Acceso denegado.');
        }

        return $next($request);
    }
}

