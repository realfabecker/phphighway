<?php

require '../vendor/autoload.php';

use HighWay\Classes\SlimApp\SlimHighWay;
use Solis\Breaker\TException;

try {

    $routes = json_decode(
        file_get_contents('src/Routes/Assinatura.json'),
        true
    );

    $middleware = require_once 'src/Api/middleware.php';

    $app = SlimHighWay::make($routes, $middleware);

    $app->run();

} catch (TException $exception) {
    echo $exception->toJson();
}