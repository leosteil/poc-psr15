<?php

namespace POC\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class Authentication implements MiddlewareInterface
{
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        if ("user autenticado" == false) {
            var_dump("usário autenticado");
            $handler->handle($request);
        } else {
            throw new \Exception("Usuário não autenticado");
        }
    }
}
