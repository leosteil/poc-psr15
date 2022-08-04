<?php

use App\Http\Controller\Capture;
use Laminas\Stratigility\MiddlewarePipe;
use POC\CaptureHandler;
use POC\Http\CaptureGetInput;
use POC\Middleware\CaptureBuildData;
use POC\Router\Router;

$router = new Router();

$captureMiddlewarePipe = new MiddlewarePipe();

$captureMiddlewarePipe->pipe(new CaptureBuildData(new CaptureGetInput()));
$commandHandler = new CaptureHandler();

$router->attach('capture', new Capture($commandHandler), $captureMiddlewarePipe);
