<?php

declare(strict_types=1);

namespace Framework\Contracts;

interface MiddlewareInterface
{
    # each middleware has the responsibility to call the next middleware
    public function process(callable $next);
}
