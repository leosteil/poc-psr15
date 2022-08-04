<?php

namespace POC;

class CaptureCommand
{
    private string $integrationKey;
    private string $paymentHash;
    private ?float $amount;

    public function __construct(string $integrationKey, string $paymentHash, ?float $amount)
    {
        $this->integrationKey = $integrationKey;
        $this->paymentHash = $paymentHash;
        $this->amount = $amount;
    }

    public function getIntegrationKey(): string
    {
        return $this->integrationKey;
    }

    public function setIntegrationKey(string $integrationKey): self
    {
        $this->integrationKey = $integrationKey;
        return $this;
    }

    public function getPaymentHash(): string
    {
        return $this->paymentHash;
    }

    public function setPaymentHash(string $paymentHash): self
    {
        $this->paymentHash = $paymentHash;
        return $this;
    }

    public function getAmount(): float
    {
        return $this->amount;
    }

    public function setAmount(float $amount): self
    {
        $this->amount = $amount;
        return $this;
    }
}
