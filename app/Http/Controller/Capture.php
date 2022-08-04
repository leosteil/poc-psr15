<?php

namespace App\Http\Controller;

use POC\CaptureCommand;
use POC\CaptureHandler;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class Capture implements RequestHandlerInterface
{
    private CaptureHandler $commandHandler;

    public function __construct(CaptureHandler $commandHandler)
    {
        $this->commandHandler = $commandHandler;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        var_dump("4 -- controller" . PHP_EOL);
        $command = $request->getAttribute(CaptureCommand::class);

        return $this->commandHandler->execute($command);
    }
}
