<?php

namespace POC\Http;

use POC\Input;

class CaptureGetInput implements Input
{
    public function getData(): array
    {
        return [
            'integration_key' => '123456',
            'hash' => '145632',
            'amount' => 38,
        ];
    }
}
