<?php

namespace POC\Router;

use Laminas\Stratigility\Middleware\RequestHandlerMiddleware;
use Laminas\Stratigility\MiddlewarePipeInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class Router implements MiddlewareInterface
{
    private array $pathList = [];

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $path = $this->getUriPath($request);

        if (isset($this->pathList[$path])) {
            return $this->pathList[$path]->handle($request);
        }

        var_dump(404);
    }

    private function getUriPath($request): string
    {
        return trim($request->getUri()->getPath(), '/');
    }

    public function attach(string $path, RequestHandlerInterface $handler, MiddlewarePipeInterface $middlewarePipe)
    {
        $requestHandlerMiddleware = new RequestHandlerMiddleware($handler);
        $middlewarePipe->pipe($requestHandlerMiddleware);

        $this->pathList[$path] = $middlewarePipe;
    }
}
