<?php

namespace Nuvende\Gateway\Tests;

use Nuvende\Gateway\Entities\Responses\CreditCard as CreditCardResponse;
use Nuvende\Gateway\Entities\CreditCard;
use Nuvende\Gateway\Entities\Responses\CreditCardUpdate;
use Nuvende\Gateway\Entities\Responses\Card as CardResponse;
use Nuvende\Gateway\Entities\Card;
use Nuvende\Gateway\Service;
use PHPUnit\Framework\TestCase;

class CreditCardServiceTest extends TestCase
{
    protected $service;
    protected $numberToken;
    protected $vaultId;
    protected $paymentId;
    public function setUp():void
    {
        $this->service = new Service(
            "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9nYXRld2F5Lm51dmVuZGUuY29tLmJyXC92MlwvbG9naW4iLCJpYXQiOjE3MDgyMDIwMDYsImV4cCI6NjE3MDgyMDE5NDYsIm5iZiI6MTcwODIwMjAwNiwianRpIjoidHk1bnlySGlJbExnR3dnRiIsInN1YiI6ImNvbnRyYWN0X2lkIiwicHJ2IjoiNDFlZmI3YmFkN2Y2ZjYzMmUyNDA1YmQzYTc5M2I4YTZiZGVjNjc3NyIsImljYyI6IlpYbEtjR1JwU1RaSmJsWjJXbTFrVjFJeU1VMU9XSEExV1dwc01tTXpSVEJpTTBwYVdqQkZPVkJUU1hOSmJscG9Za2hXYkVscWIybGlXRXBSWkROU2NWbHNUakJYYWtaRFpGZGFVRlZHU205U1IyeHZXbm93T1VscGQybGlWMFpxU1dwdmFVOVVSVEpOYWs1cVQwZEZORnBxVVRST01rVTBUVEpSZWxsWFJURk9hbGwzV1dwQk1rMXFVWHBaYWtac1RWUlZkMDVxUm1sT01sa3lXVlJDYlUxWFVUSmFSRTVvV1hwV2FrNXFhelJaVkUxNldtMUpORnBEU2prPSJ9.7fE_ay5JOI0M-3ZjZnZ1n8Hd7SshvFqCTTUChSFMKm8",
            "1070",
            'https://gateway.nuvende.com.br/v2'
        );
    }

    public function testCardTokenization()
    {
        $response = $this->service->creditCard->cardTokenization('5226987219390353');
        self::assertInstanceOf(CardResponse::class, $response);
        $this->numberToken = $response->getNumberToken();
        self::assertNotNull($this->numberToken);
    }

    /**
     * @depends testCardTokenization
     */
    public function testStoreCardVault()
    {
        $creditCard = new Card([
                'number_token' => $this->numberToken,
                'brand' => 'mastercard',
                'card_holder_name' => 'João Silva',
                'expiration_month' => '02',
                'expiration_year' => '25',
                'security_code' => '602'
            ]);

        $response = $this->service->creditCard->storeCardVault($creditCard);

        self::assertInstanceOf(CardResponse::class, $response);
        $this->vaultId = $response->getVaultId();
        self::assertNotNull($this->vaultId);
    }
    /**
     * @depends testStoreCardVault
     */
    public function testCaptureSale()
    {
        $creditCard = new CreditCard([
            "payment" => [
                "transaction_type" => "credit",
                "amount" => 19999,
                "currency_code" => "BRL",
                "product_type" => "avista",
                "installments" => 1,
                "capture_type" => "pa",
                "recurrent" => false
            ],
            "card" => [
                "vault_id" => $this->vaultId
            ],
            "seller_info" => [
                "code_anti_fraud" => "ac7cd574-853b-4e24-ba40-904b5ac1812e",
                "code_3ds" => "ac7cd574-853b-4e24-ba40-904b5ac1812e",
                "url_site_3ds" => "www.site.com.br",
                "order_number" => "1",
                "soft_descriptor" => "Nuvende*JoaoDaSilva"
            ],
            "device_info" => [
                "http_accept_browser_value" => "text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng;q=0.8",
                "http_accept_content" => "text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng;q=0.8",
                "http_browser_language" => "pt-BR",
                "http_browser_java_enabled" => "N",
                "http_browser_java_script_enabled" => "Y",
                "http_browser_color_depth" => "24",
                "http_browser_screen_height" => "937",
                "http_browser_screen_width" => "1920",
                "http_browser_time_difference" => "180",
                "user_agent_browser_value" => "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36"
            ],
            "customer" => [
                "document_type" => 1,
                "document_number" => "01234567899",
                "first_name" => "JOAO",
                "last_name" => "SILVA",
                "email" => "joao.silva@exemple.com",
                "phone_number" => "48999999999",
                "mobile_phone_number" => "48999999999",
                "ip_address" => "000000000000",
                "address" => [
                    "name" => "Rua Luiz Vieira, 134",
                    "zip_code" => "09876098",
                    "country" => "BR",
                    "state" => "SP",
                    "city" => "São Paulo",
                    "complement" => "apto. 34 - Vila Guarani"
                ]
            ],
            "ship_to" => [
                "first_name" => "JOAO",
                "last_name" => "SILVA",
                "phone_number" => "48999999999",
                "address" => [
                    "name" => "Rua Luiz Vieira, 134",
                    "zip_code" => "09876098",
                    "country" => "BR",
                    "state" => "SP",
                    "city" => "São Paulo",
                    "complement" => "apto. 34 - Vila Guarani"
                ]
            ]
        ]);

        $response = $this->service->creditCard->createSale($creditCard);

        self::assertInstanceOf(CreditCardResponse::class, $response);
        $this->paymentId = $response->getPaymentId();
        self::assertNotNull($this->paymentId);

        $response = $this->service->creditCard->captureSale($this->paymentId, 19999);
        self::assertInstanceOf(CreditCardUpdate::class, $response);
        self::assertNotNull($response->getAuthorization());
    }

    /**
     * @depends testCaptureSale
     */
    public function testSearchSale()
    {
        $response = $this->service->creditCard->searchSale($this->paymentId);
        self::assertInstanceOf(CreditCardUpdate::class, $response);
        self::assertNotNull($response->getStatus());
    }

    /**
     * @depends testSearchSale
     */
    public function testCancelSale()
    {
        $creditCard = new CreditCard([
            "payment" => [
                "transaction_type" => "credit",
                "amount" => 19999,
                "currency_code" => "BRL",
                "product_type" => "avista",
                "installments" => 1,
                "capture_type" => "pa",
                "recurrent" => false
            ],
            "card" => [
                "vault_id" => $this->vaultId
            ],
            "seller_info" => [
                "code_anti_fraud" => "ac7cd574-853b-4e24-ba40-904b5ac1812e",
                "code_3ds" => "ac7cd574-853b-4e24-ba40-904b5ac1812e",
                "url_site_3ds" => "www.site.com.br",
                "order_number" => "1",
                "soft_descriptor" => "Nuvende*JoaoDaSilva"
            ],
            "device_info" => [
                "http_accept_browser_value" => "text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng;q=0.8",
                "http_accept_content" => "text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng;q=0.8",
                "http_browser_language" => "pt-BR",
                "http_browser_java_enabled" => "N",
                "http_browser_java_script_enabled" => "Y",
                "http_browser_color_depth" => "24",
                "http_browser_screen_height" => "937",
                "http_browser_screen_width" => "1920",
                "http_browser_time_difference" => "180",
                "user_agent_browser_value" => "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36"
            ],
            "customer" => [
                "document_type" => 1,
                "document_number" => "01234567899",
                "first_name" => "JOAO",
                "last_name" => "SILVA",
                "email" => "joao.silva@exemple.com",
                "phone_number" => "48999999999",
                "mobile_phone_number" => "48999999999",
                "ip_address" => "000000000000",
                "address" => [
                    "name" => "Rua Luiz Vieira, 134",
                    "zip_code" => "09876098",
                    "country" => "BR",
                    "state" => "SP",
                    "city" => "São Paulo",
                    "complement" => "apto. 34 - Vila Guarani"
                ]
            ],
            "ship_to" => [
                "first_name" => "JOAO",
                "last_name" => "SILVA",
                "phone_number" => "48999999999",
                "address" => [
                    "name" => "Rua Luiz Vieira, 134",
                    "zip_code" => "09876098",
                    "country" => "BR",
                    "state" => "SP",
                    "city" => "São Paulo",
                    "complement" => "apto. 34 - Vila Guarani"
                ]
            ]
        ]);

        $response = $this->service->creditCard->createSale($creditCard);

        self::assertInstanceOf(CreditCardResponse::class, $response);
        $this->paymentId = $response->getPaymentId();
        self::assertNotNull($this->paymentId);

        $response = $this->service->creditCard->cancelSale($this->paymentId, 19999);
        self::assertInstanceOf(CreditCardUpdate::class, $response);
        self::assertNotNull($response->getAuthorization());
    }

}
