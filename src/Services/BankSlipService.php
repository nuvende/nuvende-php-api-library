<?php

namespace Nuvende\Gateway\Services;

use Nuvende\Gateway\Entities\Responses\BankSlip as BankSlipReturn;
use Nuvende\Gateway\Entities\BankSlip;
use Nuvende\Gateway\Traits\RequestTrait;

class BankSlipService
{
    use RequestTrait;
    public function create(BankSlip $bankSlip): BankSlipReturn
    {
        return new BankSlipReturn(json_decode($this->post("payments/boleto", $bankSlip->toArray()), true));
    }

    public function search(string $ourNumber): BankSlipReturn
    {
        return new BankSlipReturn(json_decode($this->post("payments/boleto/". $ourNumber), true));
    }

    public function download(string $ourNumber): array
    {
        return json_decode($this->post("payments/boleto/download/". $ourNumber), true);
    }

}
