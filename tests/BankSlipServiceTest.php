<?php

namespace Nuvende\Gateway\Tests;

use Carbon\Carbon;
use Nuvende\Gateway\Entities\BankSlip;
use Nuvende\Gateway\Entities\Responses\BankSlip as BankSlipResponse;
use Nuvende\Gateway\Service;
use PHPUnit\Framework\TestCase;

class BankSlipServiceTest extends TestCase
{
    protected $service;
    protected $ourNumber;
    public function setUp():void
    {
        $this->service = new Service(
            "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9nYXRld2F5Lm51dmVuZGUuY29tLmJyXC92MlwvbG9naW4iLCJpYXQiOjE3MDgyMDIwMDYsImV4cCI6NjE3MDgyMDE5NDYsIm5iZiI6MTcwODIwMjAwNiwianRpIjoidHk1bnlySGlJbExnR3dnRiIsInN1YiI6ImNvbnRyYWN0X2lkIiwicHJ2IjoiNDFlZmI3YmFkN2Y2ZjYzMmUyNDA1YmQzYTc5M2I4YTZiZGVjNjc3NyIsImljYyI6IlpYbEtjR1JwU1RaSmJsWjJXbTFrVjFJeU1VMU9XSEExV1dwc01tTXpSVEJpTTBwYVdqQkZPVkJUU1hOSmJscG9Za2hXYkVscWIybGlXRXBSWkROU2NWbHNUakJYYWtaRFpGZGFVRlZHU205U1IyeHZXbm93T1VscGQybGlWMFpxU1dwdmFVOVVSVEpOYWs1cVQwZEZORnBxVVRST01rVTBUVEpSZWxsWFJURk9hbGwzV1dwQk1rMXFVWHBaYWtac1RWUlZkMDVxUm1sT01sa3lXVlJDYlUxWFVUSmFSRTVvV1hwV2FrNXFhelJaVkUxNldtMUpORnBEU2prPSJ9.7fE_ay5JOI0M-3ZjZnZ1n8Hd7SshvFqCTTUChSFMKm8",
            "1070",
            'https://gateway.nuvende.com.br/v2'
        );
    }

    public function testCreate()
    {
        $bankslip = new BankSlip([
            'value' => 10,
            'due_date' => Carbon::now()->addDays(15)->format('Y-m-d'),
            'fine_date' => Carbon::now()->addDays(15)->format('Y-m-d'),
            'fine_value' => 1,
            'fine_percentage' => 1,
            'customer' => [
                'name' => 'João Silva',
                'document' => '71239517009',
                'email' => 'joao@exemplo.com',
                'area_code' => '48',
                'phone' => '4899999999',
                'billing_address' => [
                    'street' => 'Rua Januário Alvez Garcia',
                    'number' => '20',
                    'district' => 'Centro',
                    'postal_code' => '88702311',
                    'city' => 'Tubarão',
                    'state' => 'SC',
                    'country' => 'BRA',
                    'complement' => 'apt. 42'
                ]
            ]
        ]);

        $response = $this->service->bankSlip->create($bankslip);

        self::assertInstanceOf(BankSlipResponse::class, $response);
        self::assertNotNull($response->getDataBarcode());
        self::assertNotNull($response->getDataDigitableLine());
        $this->ourNumber = $response->getDataOurNumber();
    }

    /**
     * @depends testCreate
     */
    public function testSearch()
    {
        $response = $this->service->bankSlip->search($this->ourNumber);
        self::assertInstanceOf(BankSlipResponse::class, $response);
        self::assertNotNull($response->getDataStatus());
    }
    /**
     * @depends testCreate
     */
    public function testDownload()
    {
        $response = $this->service->bankSlip->download($this->ourNumber);
        self::assertNotNull($response['message']);
    }
}
