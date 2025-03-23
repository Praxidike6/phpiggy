<?php

declare(strict_types=1);

namespace App\Middleware;

use Framework\Contracts\MiddlewareInterface;

class CsrfGuardMiddleware implements MiddlewareInterface
{
    public function process(callable $next)
    {
        $requestMethod = strtoupper($_SERVER['REQUEST_METHOD']);
        $validMethods = ['POST', 'PATCH', 'DELETE'];

        if (!in_array($requestMethod, $validMethods))
        {
            $next();
            return;
        }

        # if they don't match then form has failed validation
        if ($_SESSION['token'] !== $_POST['token'])
        {
            redirectTo('/');
        }
        #tokens should only be used once for form validation then destroyed
        unset($_SESSION['token']);
        $next();
    }
}
