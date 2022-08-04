<?php

use Laminas\Diactoros\ResponseFactory;
use Laminas\Diactoros\ServerRequestFactory;
use Laminas\HttpHandlerRunner\Emitter\SapiEmitter;
use Laminas\HttpHandlerRunner\RequestHandlerRunner;
use Laminas\Stratigility\MiddlewarePipe;
use POC\Middleware\Authentication;
use POC\Middleware\ErrorHandler;

require __DIR__ . '/../config/bootstrap.php';

$app = new MiddlewarePipe();
$app->pipe(new ErrorHandler());
$app->pipe(new Authentication());
$app->pipe($router);

$server = new RequestHandlerRunner(
    $app,
    new SapiEmitter(),
    static function () {
        return ServerRequestFactory::fromGlobals();
    },
    static function (\Throwable $e) {
        $response = (new ResponseFactory())->createResponse(500);
        $response->getBody()->write(sprintf(
            'An error occurred: %s',
            $e->getMessage
        ));
        return $response;
    }
);

$server->run();
