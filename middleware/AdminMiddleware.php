<?php 
namespace Middleware;

use App\Request;
use Exception;
use Override;
use Services\AuthService;

class AdminMiddleware extends Middleware{
    #[Override]
    public function handle(Request $request, $next)
    {
        $auth_service=new AuthService;
        if (!$auth_service->isAdmin()) {
            throw new Exception("Access denied! You are not an admin.", 1);
        }
        return $next;
    }
}