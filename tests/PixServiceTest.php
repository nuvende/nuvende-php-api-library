<?php

namespace Nuvende\Gateway\Tests;

use Nuvende\Gateway\Entities\Pix;
use Nuvende\Gateway\Entities\Responses\QrCodeDynamic;
use Nuvende\Gateway\Service;
use PHPUnit\Framework\TestCase;

class PixServiceTest extends TestCase
{
    protected $service;
    protected $txId;
    public function setUp():void
    {
        $this->service = new Service(
            "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9nYXRld2F5Lm51dmVuZGUuY29tLmJyXC92MlwvbG9naW4iLCJpYXQiOjE3MDgyMDIwMDYsImV4cCI6NjE3MDgyMDE5NDYsIm5iZiI6MTcwODIwMjAwNiwianRpIjoidHk1bnlySGlJbExnR3dnRiIsInN1YiI6ImNvbnRyYWN0X2lkIiwicHJ2IjoiNDFlZmI3YmFkN2Y2ZjYzMmUyNDA1YmQzYTc5M2I4YTZiZGVjNjc3NyIsImljYyI6IlpYbEtjR1JwU1RaSmJsWjJXbTFrVjFJeU1VMU9XSEExV1dwc01tTXpSVEJpTTBwYVdqQkZPVkJUU1hOSmJscG9Za2hXYkVscWIybGlXRXBSWkROU2NWbHNUakJYYWtaRFpGZGFVRlZHU205U1IyeHZXbm93T1VscGQybGlWMFpxU1dwdmFVOVVSVEpOYWs1cVQwZEZORnBxVVRST01rVTBUVEpSZWxsWFJURk9hbGwzV1dwQk1rMXFVWHBaYWtac1RWUlZkMDVxUm1sT01sa3lXVlJDYlUxWFVUSmFSRTVvV1hwV2FrNXFhelJaVkUxNldtMUpORnBEU2prPSJ9.7fE_ay5JOI0M-3ZjZnZ1n8Hd7SshvFqCTTUChSFMKm8",
            "1070",
            'https://gateway.nuvende.com.br/v2'
        );
    }

    public function testGenerate()
    {
        $pix = new Pix([
            'cobranca' => [
                'calendario' => [
                    'expiracao' => 3600
                ],
                'devedor' => [
                    'name' => 'joao da silva'
                ],
                'valor' => [
                    'original' => 199.99
                ]
            ],
            'observacao' => 'Cobrança dos serviços prestados.'
        ]);

        $response = $this->service->pix->generate($pix);

        self::assertInstanceOf(QrCodeDynamic::class, $response);
        $this->txId = $response->getTxId();
        self::assertNotNull($this->txId);
        self::assertNotNull($response->getQrCode());
    }

    /**
     * @depends testCreate
     */
    public function testFindByTxId()
    {
        $response = $this->service->pix->findByTxId($this->txId);
        self::assertInstanceOf(QrCodeDynamic::class, $response);
        self::assertNotNull($response->getQrCode());
    }
    /**
     * @depends testCreate
     */
    public function testFindMultiple()
    {
        $response = $this->service->pix->findMultiple([$this->txId]);
        self::assertInstanceOf(QrCodeDynamic::class, $response[0]);
        self::assertNotNull($response[0]->getQrCode());
    }
}
