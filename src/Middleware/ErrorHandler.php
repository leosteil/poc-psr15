<?php

namespace POC\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class ErrorHandler implements MiddlewareInterface
{
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        try {
            var_dump("passing through error handler" . PHP_EOL);
            $handler->handle($request);
        } catch (\Exception $exception) {
            echo $exception->getMessage();
        }
    }
}
