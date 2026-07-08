<?php

namespace Middleware;

use App\Auth;
use App\Request;
use Exception;
use Override;

class AuthMiddleware extends Middleware
{
    #[Override]
    public function handle(Request $request, $next)
    {
        if (!Auth::check()) {
            header("Location:/login");
            exit;
        }
        return $next($request);
    }
}
