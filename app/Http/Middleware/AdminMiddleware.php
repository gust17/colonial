<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Verifica se o usuário está autenticado e é um administrador
        if ($request->user() && $request->user()->is_admin) {
            return $next($request);
        }

        // Se não for um administrador, redireciona para página de acesso negado ou outra rota
        return redirect()->route('acesso.negado');
    }
}
