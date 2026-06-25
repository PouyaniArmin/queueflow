<?php

namespace Middleware;

use App\Request;
use Exception;
use Override;

class AuthMiddleware extends Middleware
{
    #[Override]
    public function handle(Request $request, $next)
    {
        if (!isset($_SESSION['user'])) {
            throw new Exception("Unauthorized", 401);
        }
        return $next($request);
    }
}
