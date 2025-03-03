<?php

declare(strict_types=1);

use Framework\App;
use App\Config\Paths;

use function App\Config\registerRoutes;

require __DIR__ . "/../../vendor/autoload.php";




$app = new App(Paths::SOURCE . "app/container-definitions.php");

registerRoutes($app);

return $app;
