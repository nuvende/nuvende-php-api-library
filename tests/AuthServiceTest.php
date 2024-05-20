<?php

namespace Nuvende\Gateway\Tests;

use Nuvende\Gateway\Entities\Responses\Webhook;
use Nuvende\Gateway\Service;
use PHPUnit\Framework\TestCase;

class AuthServiceTest extends TestCase
{
    protected $service;
    public function setUp():void
    {
        $this->service = new Service(
            "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9nYXRld2F5Lm51dmVuZGUuY29tLmJyXC92MlwvbG9naW4iLCJpYXQiOjE3MDgyMDIwMDYsImV4cCI6NjE3MDgyMDE5NDYsIm5iZiI6MTcwODIwMjAwNiwianRpIjoidHk1bnlySGlJbExnR3dnRiIsInN1YiI6ImNvbnRyYWN0X2lkIiwicHJ2IjoiNDFlZmI3YmFkN2Y2ZjYzMmUyNDA1YmQzYTc5M2I4YTZiZGVjNjc3NyIsImljYyI6IlpYbEtjR1JwU1RaSmJsWjJXbTFrVjFJeU1VMU9XSEExV1dwc01tTXpSVEJpTTBwYVdqQkZPVkJUU1hOSmJscG9Za2hXYkVscWIybGlXRXBSWkROU2NWbHNUakJYYWtaRFpGZGFVRlZHU205U1IyeHZXbm93T1VscGQybGlWMFpxU1dwdmFVOVVSVEpOYWs1cVQwZEZORnBxVVRST01rVTBUVEpSZWxsWFJURk9hbGwzV1dwQk1rMXFVWHBaYWtac1RWUlZkMDVxUm1sT01sa3lXVlJDYlUxWFVUSmFSRTVvV1hwV2FrNXFhelJaVkUxNldtMUpORnBEU2prPSJ9.7fE_ay5JOI0M-3ZjZnZ1n8Hd7SshvFqCTTUChSFMKm8",
            "1070",
            'https://gateway.nuvende.com.br/v2'
        );
    }

    public function testValidateToken()
    {
        $response = $this->service->auth->validateToken();
        self::assertTrue($response);
    }

    public function testUpdateWebhook()
    {
        $response = $this->service->auth->updateWebhook('http://192.168.0.117:8000/credit', 'http://192.168.0.117:8000/pix');
        self::assertInstanceOf(Webhook::class, $response);
        self::assertEquals('http://192.168.0.117:8000/credit', $response->getCreditCardWebhook());
        self::assertEquals('http://192.168.0.117:8000/pix', $response->getPixWebhook());
    }
}
