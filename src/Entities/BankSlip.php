<?php

namespace Nuvende\Gateway\Entities;

class BankSlip extends BaseEntity
{

    protected $value;
    protected $dueDate;
    protected $fineDate;
    protected $fineValue;
    protected $finePercentage;
    protected $customerName;
    protected $customerDocument;
    protected $customerEmail;
    protected $customerAreaCode;
    protected $customerPhone;
    protected $customerBillingAddressStreet;
    protected $customerBillingAddressNumber;
    protected $customerBillingAddressDistrict;
    protected $customerBillingAddressPostalCode;
    protected $customerBillingAddressCity;
    protected $customerBillingAddressState;
    protected $customerBillingAddressCountry;
    protected $customerBillingAddressComplement;

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     */
    public function setValue($value): void
    {
        $this->value = $value;
    }

    /**
     * @return mixed
     */
    public function getDueDate()
    {
        return $this->dueDate;
    }

    /**
     * @param mixed $dueDate
     */
    public function setDueDate($dueDate): void
    {
        $this->dueDate = $dueDate;
    }

    /**
     * @return mixed
     */
    public function getFineDate()
    {
        return $this->fineDate;
    }

    /**
     * @param mixed $fineDate
     */
    public function setFineDate($fineDate): void
    {
        $this->fineDate = $fineDate;
    }

    /**
     * @return mixed
     */
    public function getFineValue()
    {
        return $this->fineValue;
    }

    /**
     * @param mixed $fineValue
     */
    public function setFineValue($fineValue): void
    {
        $this->fineValue = $fineValue;
    }

    /**
     * @return mixed
     */
    public function getFinePercentage()
    {
        return $this->finePercentage;
    }

    /**
     * @param mixed $finePercentage
     */
    public function setFinePercentage($finePercentage): void
    {
        $this->finePercentage = $finePercentage;
    }

    /**
     * @return mixed
     */
    public function getCustomerName()
    {
        return $this->customerName;
    }

    /**
     * @param mixed $customerName
     */
    public function setCustomerName($customerName): void
    {
        $this->customerName = $customerName;
    }

    /**
     * @return mixed
     */
    public function getCustomerDocument()
    {
        return $this->customerDocument;
    }

    /**
     * @param mixed $customerDocument
     */
    public function setCustomerDocument($customerDocument): void
    {
        $this->customerDocument = $customerDocument;
    }

    /**
     * @return mixed
     */
    public function getCustomerEmail()
    {
        return $this->customerEmail;
    }

    /**
     * @param mixed $customerEmail
     */
    public function setCustomerEmail($customerEmail): void
    {
        $this->customerEmail = $customerEmail;
    }

    /**
     * @return mixed
     */
    public function getCustomerAreaCode()
    {
        return $this->customerAreaCode;
    }

    /**
     * @param mixed $customerAreaCode
     */
    public function setCustomerAreaCode($customerAreaCode): void
    {
        $this->customerAreaCode = $customerAreaCode;
    }

    /**
     * @return mixed
     */
    public function getCustomerPhone()
    {
        return $this->customerPhone;
    }

    /**
     * @param mixed $customerPhone
     */
    public function setCustomerPhone($customerPhone): void
    {
        $this->customerPhone = $customerPhone;
    }

    /**
     * @return mixed
     */
    public function getCustomerBillingAddressStreet()
    {
        return $this->customerBillingAddressStreet;
    }

    /**
     * @param mixed $customerBillingAddressStreet
     */
    public function setCustomerBillingAddressStreet($customerBillingAddressStreet): void
    {
        $this->customerBillingAddressStreet = $customerBillingAddressStreet;
    }

    /**
     * @return mixed
     */
    public function getCustomerBillingAddressNumber()
    {
        return $this->customerBillingAddressNumber;
    }

    /**
     * @param mixed $customerBillingAddressNumber
     */
    public function setCustomerBillingAddressNumber($customerBillingAddressNumber): void
    {
        $this->customerBillingAddressNumber = $customerBillingAddressNumber;
    }

    /**
     * @return mixed
     */
    public function getCustomerBillingAddressDistrict()
    {
        return $this->customerBillingAddressDistrict;
    }

    /**
     * @param mixed $customerBillingAddressDistrict
     */
    public function setCustomerBillingAddressDistrict($customerBillingAddressDistrict): void
    {
        $this->customerBillingAddressDistrict = $customerBillingAddressDistrict;
    }

    /**
     * @return mixed
     */
    public function getCustomerBillingAddressPostalCode()
    {
        return $this->customerBillingAddressPostalCode;
    }

    /**
     * @param mixed $customerBillingAddressPostalCode
     */
    public function setCustomerBillingAddressPostalCode($customerBillingAddressPostalCode): void
    {
        $this->customerBillingAddressPostalCode = $customerBillingAddressPostalCode;
    }

    /**
     * @return mixed
     */
    public function getCustomerBillingAddressCity()
    {
        return $this->customerBillingAddressCity;
    }

    /**
     * @param mixed $customerBillingAddressCity
     */
    public function setCustomerBillingAddressCity($customerBillingAddressCity): void
    {
        $this->customerBillingAddressCity = $customerBillingAddressCity;
    }

    /**
     * @return mixed
     */
    public function getCustomerBillingAddressState()
    {
        return $this->customerBillingAddressState;
    }

    /**
     * @param mixed $customerBillingAddressState
     */
    public function setCustomerBillingAddressState($customerBillingAddressState): void
    {
        $this->customerBillingAddressState = $customerBillingAddressState;
    }

    /**
     * @return mixed
     */
    public function getCustomerBillingAddressCountry()
    {
        return $this->customerBillingAddressCountry;
    }

    /**
     * @param mixed $customerBillingAddressCountry
     */
    public function setCustomerBillingAddressCountry($customerBillingAddressCountry): void
    {
        $this->customerBillingAddressCountry = $customerBillingAddressCountry;
    }

    /**
     * @return mixed
     */
    public function getCustomerBillingAddressComplement()
    {
        return $this->customerBillingAddressComplement;
    }

    /**
     * @param mixed $customerBillingAddressComplement
     */
    public function setCustomerBillingAddressComplement($customerBillingAddressComplement): void
    {
        $this->customerBillingAddressComplement = $customerBillingAddressComplement;
    }

    public function toArray(): array
    {

        $parameters = [
            'value' => $this->getValue(),
            'due_date' => $this->getDueDate(),
            'fine_date' => $this->getFineDate(),
            'fine_value' => $this->getFineValue(),
            'fine_percentage' => $this->getFinePercentage(),
            'customer' => [
                'name' => $this->getCustomerName(),
                'document' => $this->getCustomerDocument(),
                'email' => $this->getCustomerEmail(),
                'area_code' => $this->getCustomerAreaCode(),
                'phone' => $this->getCustomerPhone(),
                'billing_address' => [
                    'street' => $this->getCustomerBillingAddressStreet(),
                    'number' => $this->getCustomerBillingAddressNumber(),
                    'district' => $this->getCustomerBillingAddressDistrict(),
                    'postal_code' => $this->getCustomerBillingAddressPostalCode(),
                    'city' => $this->getCustomerBillingAddressCity(),
                    'state' => $this->getCustomerBillingAddressState(),
                    'country' => $this->getCustomerBillingAddressCountry(),
                    'complement' => $this->getCustomerBillingAddressComplement()
                ]
            ]
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
        $this->setValue($input['value'] ?? null);
        $this->setDueDate($input['due_date'] ?? null);
        $this->setFineDate($input['fine_date'] ?? null);
        $this->setFineValue($input['fine_value'] ?? null);
        $this->setFinePercentage($input['fine_percentage'] ?? null);
        $this->setCustomerName($input['customer']['name'] ?? null);
        $this->setCustomerDocument($input['customer']['document'] ?? null);
        $this->setCustomerEmail($input['customer']['email'] ?? null);
        $this->setCustomerAreaCode($input['customer']['area_code'] ?? null);
        $this->setCustomerPhone($input['customer']['phone'] ?? null);
        $this->setCustomerBillingAddressStreet($input['customer']['billing_address']['street'] ?? null);
        $this->setCustomerBillingAddressNumber($input['customer']['billing_address']['number'] ?? null);
        $this->setCustomerBillingAddressDistrict($input['customer']['billing_address']['district'] ?? null);
        $this->setCustomerBillingAddressPostalCode($input['customer']['billing_address']['postal_code'] ?? null);
        $this->setCustomerBillingAddressCity($input['customer']['billing_address']['city'] ?? null);
        $this->setCustomerBillingAddressState($input['customer']['billing_address']['state'] ?? null);
        $this->setCustomerBillingAddressCountry($input['customer']['billing_address']['country'] ?? null);
        $this->setCustomerBillingAddressComplement($input['customer']['billing_address']['complement'] ?? null);
    }
}
