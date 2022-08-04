<?php

namespace POC\Middleware;

use POC\CaptureCommand;
use POC\Input;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class CaptureBuildData implements MiddlewareInterface
{
    private array $data;

    public function __construct(Input $input)
    {
        $this->data = $input->getData();
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        if (!$this->validateData()) {
            throw new \Exception("Dados inválidos");
        }

        $requestWithCommand = $request->withAttribute(CaptureCommand::class, new CaptureCommand($this->data['integration_key'], $this->data['hash'], $this->data['amount']));

        return $handler->handle($requestWithCommand);
    }

    private function validateData(): bool
    {
        return true;
    }
}
