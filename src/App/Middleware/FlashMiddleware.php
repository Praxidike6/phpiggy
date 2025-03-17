<?php

declare(strict_types=1);

namespace App\Middleware;

use Framework\Contracts\MiddlewareInterface;
use Framework\TemplateEngine;

class FlashMiddleware implements MiddlewareInterface
{
    public function __construct(private TemplateEngine $view)
    {
    }
    public function process(callable $next)
    {
        # expose any errors to templates that need them 
        $this->view->addGlobal('errors', $_SESSION['errors'] ?? []);

        # clear errors when screen refreshed
        unset($_SESSION['errors']);

        # expose any submitted form data to templates that need them 
        $this->view->addGlobal('oldFormData', $_SESSION['oldFormData'] ?? []);
        unset($_SESSION['oldFormData']);
        $next();
    }
}
