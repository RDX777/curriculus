<?php

namespace App\Http\Middleware\Auth;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use function App\Helpers\getUserMiddlewares;
use function App\Helpers\verify;

class EnsureUserHasRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next, string $rolePermited
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {

        if (!auth()->check()) {
            abort(403, "Without route access!");
        }

        $permited = getUserMiddlewares();

        if ($permited and verify($permited, "middlewares", $role)) {
            return $next($request);
        }

        abort(403, "Without route permission!");
    }
}
