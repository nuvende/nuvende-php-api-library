<?php

namespace Nuvende\Gateway;

use Nuvende\Gateway\Services\AuthService;
use Nuvende\Gateway\Services\BankSlipService;
use Nuvende\Gateway\Services\CreditCardService;
use Nuvende\Gateway\Services\PixService;

class Service
{
    public $auth;
    public $bankSlip;
    public $creditCard;
    public $pix;

    /**
     * BankingService constructor.
     */
    public function __construct($token, $contractCode, $url = 'https://gatewayhml.nuvende.com.br/v2')
    {
        $this->auth = new AuthService($token, $contractCode, $url);
        $this->bankSlip = new BankSlipService($token, $contractCode, $url);
        $this->creditCard = new CreditCardService($token, $contractCode, $url);
        $this->pix = new PixService($token, $contractCode, $url);
    }
}
