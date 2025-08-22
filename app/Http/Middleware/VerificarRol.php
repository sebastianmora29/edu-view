<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerificarRol
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user = $request->user();

        

        if (!$user) {
            abort(401, 'No autenticado');
        }

        
        // Forzar string, quitar espacios y convertir a minúscula para asegurar coincidencia
        $userRole = strtolower(trim((string) $user->role));
        $allowedRoles = array_map(fn($r) => strtolower(trim((string) $r)), $roles);

        if (!in_array($userRole, $allowedRoles)) {
            abort(403, 'Acceso denegado');
        }

        return $next($request);
}


}