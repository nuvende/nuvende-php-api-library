<?php

namespace Nuvende\Gateway\Entities;

class Card extends BaseEntity
{
    protected $numberToken;
    protected $brand;
    protected $cardHolderName;
    protected $expirationMonth;
    protected $expirationYear;
    protected $securityCode;

    /**
     * @return mixed
     */
    public function getNumberToken()
    {
        return $this->numberToken;
    }

    /**
     * @param mixed $numberToken
     */
    public function setNumberToken($numberToken): void
    {
        $this->numberToken = $numberToken;
    }


    /**
     * @return mixed
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * @param mixed $brand
     */
    public function setBrand($brand): void
    {
        $this->brand = $brand;
    }

    /**
     * @return mixed
     */
    public function getCardHolderName()
    {
        return $this->cardHolderName;
    }

    /**
     * @param mixed $cardHolderName
     */
    public function setCardHolderName($cardHolderName): void
    {
        $this->cardHolderName = $cardHolderName;
    }

    /**
     * @return mixed
     */
    public function getExpirationMonth()
    {
        return $this->expirationMonth;
    }

    /**
     * @param mixed $expirationMonth
     */
    public function setExpirationMonth($expirationMonth): void
    {
        $this->expirationMonth = $expirationMonth;
    }

    /**
     * @return mixed
     */
    public function getExpirationYear()
    {
        return $this->expirationYear;
    }

    /**
     * @param mixed $expirationYear
     */
    public function setExpirationYear($expirationYear): void
    {
        $this->expirationYear = $expirationYear;
    }

    /**
     * @return mixed
     */
    public function getSecurityCode()
    {
        return $this->securityCode;
    }

    /**
     * @param mixed $securityCode
     */
    public function setSecurityCode($securityCode): void
    {
        $this->securityCode = $securityCode;
    }


    public function toArray(): array
    {
        return [
            'number_token' => $this->getNumberToken(),
            'brand' => $this->getBrand(),
            'card_holder_name' => $this->getCardHolderName(),
            'expiration_month' => $this->getExpirationMonth(),
            'expiration_year' => $this->getExpirationYear(),
            'security_code' => $this->getSecurityCode()
        ];
    }

    public function fill(array $input)
    {
        $this->setNumberToken($input['number_token'] ?? null);
        $this->setBrand($input['brand'] ?? null);
        $this->setCardHolderName($input['card_holder_name'] ?? null);
        $this->setExpirationMonth($input['expiration_month'] ?? null);
        $this->setExpirationYear($input['expiration_year'] ?? null);
        $this->setSecurityCode($input['security_code'] ?? null);
    }
}
