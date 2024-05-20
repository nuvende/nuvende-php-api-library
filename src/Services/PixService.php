<?php

namespace Nuvende\Gateway\Services;

use Nuvende\Gateway\Entities\Responses\QrCodeDynamic;
use Nuvende\Gateway\Entities\Pix;
use Nuvende\Gateway\Traits\RequestTrait;

class PixService
{
    use RequestTrait;
    public function generate(Pix $pix): QrCodeDynamic
    {
        return new QrCodeDynamic(json_decode($this->post("/payments/qrcode/pix", $pix->toArray()), true));
    }

    public function findByTxId($txId): QrCodeDynamic
    {
        return new QrCodeDynamic(json_decode($this->get("/payments/qrcode/pix/" . $txId), true));
    }

    public function findMultiple(array $txIds): array
    {
        $pix = json_decode($this->post("payments/qrcode/pix/search", compact('txIds')), true);

        return array_map(function($pix) {
            return new QrCodeDynamic($pix);
        }, $pix);
    }
}
