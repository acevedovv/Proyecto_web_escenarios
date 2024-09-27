<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string  $roles
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $roles): Response
    {
        $newRol = explode('|', $roles);
        $roleName = strtolower($request->user()?->role?->nombre_rol ?? 'guest'); // Usa 'nombre_rol'

        Log::info('Rol del usuario: ' . $roleName);
        Log::info('Roles permitidos: ' . implode(', ', $newRol));

        if (!in_array($roleName, $newRol)) {
            return abort(403, __('Unauthorized,Your role does not meet the requirements'));
        }

        return $next($request);
    }
}
