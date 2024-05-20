<?php

namespace Nuvende\Gateway\Services;

use Nuvende\Gateway\Entities\Responses\Webhook;
use Nuvende\Gateway\Traits\RequestTrait;

class AuthService
{
    use RequestTrait;

    public function updateWebhook($creditCardWebhook, $pixWebhook): Webhook
    {
        return new Webhook(json_decode($this->post(
            "/auth/update-return-url", [
            "credit_card_webhook" => $creditCardWebhook,
            "pix_webhook" => $pixWebhook
        ]), true));
    }
}
