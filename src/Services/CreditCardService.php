<?php

namespace Nuvende\Gateway\Services;

use Nuvende\Gateway\Entities\Card;
use Nuvende\Gateway\Entities\Responses\Card as CardResponse;
use Nuvende\Gateway\Entities\CreditCard;
use Nuvende\Gateway\Entities\Responses\CreditCard as CreditCardResponse;
use Nuvende\Gateway\Entities\Responses\CreditCardUpdate;
use Nuvende\Gateway\Traits\RequestTrait;

class CreditCardService
{
    use RequestTrait;
    public function cardTokenization(string $cardNumber): CardResponse
    {
        return new CardResponse(json_decode($this->post("payments/card/tokenization", [
            'card_number' => $cardNumber
        ]), true));
    }

    public function storeCardVault(Card $card): CardResponse
    {
        return new CardResponse(json_decode($this->post("payments/card/store", $card->toArray()), true));
    }

    public function createSale(CreditCard $cardTramsaction): CreditCardResponse
    {
        return new CreditCardResponse(json_decode($this->post("payments/credit", $cardTramsaction->toArray()), true));
    }

    public function searchSale(string $paymentId = null, string $orderNumber = null, string $transactionDate = null): CreditCardUpdate
    {
        return new CreditCardUpdate(json_decode($this->post("payments/credit/status", [
            "payment_id" => $paymentId,
            "order_number" => $orderNumber,
            "transaction_date" => $transactionDate
        ]), true));
    }

    public function captureSale(string $paymentId, int $amount, array $sellers = null): CreditCardUpdate
    {
        return new CreditCardUpdate(json_decode($this->post("payments/credit/capture", [
            "payment_id" => $paymentId,
            "amount" => $amount,
            "sellers" => $sellers
        ]), true));
    }

    public function cancelSale(string $paymentId, int $amount, array $sellers = null): CreditCardUpdate
    {
        return new CreditCardUpdate(json_decode($this->post("payments/credit/cancel", [
            "payment_id" => $paymentId,
            "amount" => $amount,
            "sellers" => $sellers
        ]), true));
    }

    public function unlockSale(string $paymentId, int $sellerId, int $amount, array $items = null): CreditCardUpdate
    {
        return new CreditCardUpdate(json_decode($this->post("payments/credit/unlock", [
            "payment_id" => $paymentId,
            "seller_id" => $sellerId,
            "amount" => $amount,
            "items" => $items
        ]), true));
    }

    public function validate3ds(string $code3ds, string $validateToken): CreditCardUpdate
    {
        return new CreditCardUpdate(json_decode($this->post("payments/credit/validate", [
            "code3ds" => $code3ds,
            "validate_token" => $validateToken
        ]), true));
    }
}
