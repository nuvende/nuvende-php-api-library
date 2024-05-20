<?php

namespace Nuvende\Gateway\Entities\Responses;

use Nuvende\Gateway\Entities\BaseEntity;

class Webhook extends BaseEntity
{

    protected $creditCardWebhook;
    protected $pixWebhook;
    /**
     * @return string Rota que o webhook de cartão de crédito vai comunicar as transações quando pagas
     */
    public function getCreditCardWebhook(): string
    {
        return $this->creditCardWebhook;
    }

    public function setCreditCardWebhook($creditCardWebhook): void
    {
        $this->creditCardWebhook = $creditCardWebhook;
    }

    /**
     * @return string Rota que o webhook de cartão de crédito vai comunicar as transações quando pagas
     */
    public function getPixWebhook(): string
    {
        return $this->pixWebhook;
    }

    public function setPixWebhook($pixWebhook): void
    {
        $this->pixWebhook = $pixWebhook;
    }

    public function toArray(): array
    {
        return [
            'credit_card_webhook' => $this->getCreditCardWebhook(),
            'pix_webhook' => $this->getPixWebhook()
        ];
    }

    public function fill(array $input)
    {
        $this->setCreditCardWebhook($input['credit_card_webhook'] ?? null);
        $this->setPixWebhook($input['pix_webhook'] ?? null);
    }
}
