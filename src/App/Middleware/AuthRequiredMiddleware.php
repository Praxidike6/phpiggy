<?php

declare(strict_types=1);

namespace App\Middleware;

use Framework\Contracts\MiddlewareInterface;

class AuthRequiredMiddleware implements MiddlewareInterface
{
    public function process(callable $next)
    {
        # user is in the session only if the user is logged in
        if (empty($_SESSION['user']))
        {
            redirectTo('/login');
        }
        $next();
    }
}
