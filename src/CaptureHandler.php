<?php

namespace POC;

use EBANX\API\Capture\CaptureRequestCaller;
use EBANX\API\Capture\CaptureRequestCallerParams;

class CaptureHandler
{
    public function execute(CaptureCommand $capture)
    {
        $captureData = new CaptureRequestCallerParams($capture->getIntegrationKey(), $capture->getPaymentHash(), '');

        return CaptureRequestCaller::executeCapture($captureData);
    }
}
