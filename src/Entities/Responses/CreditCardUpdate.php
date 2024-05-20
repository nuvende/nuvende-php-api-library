<?php

namespace Nuvende\Gateway\Entities\Responses;

use Nuvende\Gateway\Entities\BaseEntity;

class CreditCardUpdate extends BaseEntity
{
    protected $message;
    protected $authorization;
    protected $status;
    protected $description;
    protected $expireAt;
    protected $orderNumber;
    protected $transactionDate;
    protected $amount;
    protected $paymentId;

    /**
     * @return string Mensagem de retorno da transação
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    public function setMessage($message): void
    {
        $this->message = $message;
    }

    /**
     * @return string Autorização da transação
     */
    public function getAuthorization(): string
    {
        return $this->authorization;
    }

    public function setAuthorization($authorization): void
    {
        $this->authorization = $authorization;
    }

    /**
     * @return string Descrição do retorno da transação.
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription($description): void
    {
        $this->description = $description;
    }

    /**
     * @return string Data e hora de expiração quando se tratar de pré-autorização.
     */
    public function getExpireAt(): string
    {
        return $this->expireAt;
    }

    public function setExpireAt($expireAt): void
    {
        $this->expireAt = $expireAt;
    }

    /**
     * @return string Status da transação. possiveis valores no arquivo /StaticModels/CreditCardStatus.php
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus($status): void
    {
        $this->status = $status;
    }

    /**
     * @return string O Seu Identificador da transação enviado na solicitação
     */
    public function getOrderNumber(): string
    {
        return $this->orderNumber;
    }

    public function setOrderNumber($orderNumber): void
    {
        $this->orderNumber = $orderNumber;
    }

    /**
     * @return string Data de efetivação da transação
     */
    public function getTransactionDate(): string
    {
        return $this->transactionDate;
    }

    public function setTransactionDate($transactionDate): void
    {
        $this->transactionDate = $transactionDate;
    }

    /**
     * @return integer Valor da Transação
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    public function setAmount($amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @return string Identificador da transação
     */
    public function getPaymentId(): string
    {
        return $this->paymentId;
    }

    public function setPaymentId($paymentId): void
    {
        $this->paymentId = $paymentId;
    }

    public function toArray(): array
    {
        $parameters = [
            "message" => $this->getMessage(),
            "payment_id" => $this->getPaymentId(),
            "authorization" => $this->getAuthorization(),
            "order_number" => $this->getOrderNumber(),
            "transaction_date" => $this->getTransactionDate(),
            "amount" => $this->getAmount(),
            "description" => $this->getDescription(),
            "expire_at" => $this->getExpireAt(),
        ];

        return $this->unsetNullValues($parameters);
    }

    public function unsetNullValues($parameters)
    {
        foreach ($parameters as $key => $parameter) {
            if ($parameter == null) {
                unset($parameters[$key]);
            }

            if (is_array($parameter)) {
                $parameters[$key] = $this->unsetNullValues($parameters[$key]);
            }
        }
        return $parameters;
    }


    public function fill(array $input)
    {
        $this->setMessage($input['message'] ?? null);
        $this->setPaymentId($input['payment_id'] ?? null);
        $this->setAuthorization($input['authorization'] ?? null);
        $this->setOrderNumber($input['order_number'] ?? null);
        $this->setTransactionDate($input['transaction_date'] ?? null);
        $this->setAmount($input['amount'] ?? null);
        $this->setDescription($input['description'] ?? null);
        $this->setExpireAt($input['expire_at'] ?? null);
    }

}
