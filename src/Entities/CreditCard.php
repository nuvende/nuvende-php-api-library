<?php

namespace Nuvende\Gateway\Entities;

class CreditCard extends BaseEntity
{
    protected $paymentTransactionType;
    protected $paymentAmount;
    protected $paymentCurrencyCode;
    protected $paymentProductType;
    protected $paymentInstallments;
    protected $paymentCaptureType;
    protected $paymentRecurrent;
    protected $cardvaultId;
    protected $cardNumberToken;
    protected $cardCardHolderName;
    protected $cardSecurityCode;
    protected $cardBrand;
    protected $cardExpirationMonth;
    protected $cardExpirationYear;
    protected $sellerInfoCodeAntiFraud;
    protected $sellerInfoCode3Ds;
    protected $sellerInfoUrlSite3Ds;
    protected $sellerInfoOrderNumber;
    protected $sellerInfoSoftDescriptor;
    protected $deviceInfoHttpAcceptBrowserValue;
    protected $deviceInfoHttpAcceptContent;
    protected $deviceInfoHttpBrowserLanguage;
    protected $deviceInfoHttpBrowserJavaEnabled;
    protected $deviceInfoHttpBrowserJavaScriptEnabled;
    protected $deviceInfoHttpBrowserColorDepth;
    protected $deviceInfoHttpBrowserScreenHeight;
    protected $deviceInfoHttpBrowserScreenWidth;
    protected $deviceInfoHttpBrowserTimeDifference;
    protected $deviceInfoUserAgentBrowserValue;
    protected $customerDocumentType;
    protected $customerDocumentNumber;
    protected $customerFirstName;
    protected $customerLastName;
    protected $customerEmail;
    protected $customerPhoneNumber;
    protected $customerMobilePhoneNumber;
    protected $customerIpAddress;
    protected $customerAddressName;
    protected $customerAddressZipCode;
    protected $customerAddressCountry;
    protected $customerAddressState;
    protected $customerAddressCity;
    protected $customerAddressComplement;
    protected $shipToFirstName;
    protected $shipToLastName;
    protected $shipToPhoneNumber;
    protected $shipToAddressName;
    protected $shipToAddressZipCode;
    protected $shipToAddressCountry;
    protected $shipToAddressState;
    protected $shipToAddressCity;
    protected $shipToAddressComplement;

    /**
     * @return mixed
     */
    public function getPaymentTransactionType()
    {
        return $this->paymentTransactionType;
    }

    /**
     * @param mixed $paymentTransactionType
     */
    public function setPaymentTransactionType($paymentTransactionType): void
    {
        $this->paymentTransactionType = $paymentTransactionType;
    }

    /**
     * @return mixed
     */
    public function getPaymentAmount()
    {
        return $this->paymentAmount;
    }

    /**
     * @param mixed $paymentAmount
     */
    public function setPaymentAmount($paymentAmount): void
    {
        $this->paymentAmount = $paymentAmount;
    }

    /**
     * @return mixed
     */
    public function getPaymentCurrencyCode()
    {
        return $this->paymentCurrencyCode;
    }

    /**
     * @param mixed $paymentCurrencyCode
     */
    public function setPaymentCurrencyCode($paymentCurrencyCode): void
    {
        $this->paymentCurrencyCode = $paymentCurrencyCode;
    }

    /**
     * @return mixed
     */
    public function getPaymentProductType()
    {
        return $this->paymentProductType;
    }

    /**
     * @param mixed $paymentProductType
     */
    public function setPaymentProductType($paymentProductType): void
    {
        $this->paymentProductType = $paymentProductType;
    }

    /**
     * @return mixed
     */
    public function getPaymentInstallments()
    {
        return $this->paymentInstallments;
    }

    /**
     * @param mixed $paymentInstallments
     */
    public function setPaymentInstallments($paymentInstallments): void
    {
        $this->paymentInstallments = $paymentInstallments;
    }

    /**
     * @return mixed
     */
    public function getPaymentCaptureType()
    {
        return $this->paymentCaptureType;
    }

    /**
     * @param mixed $paymentCaptureType
     */
    public function setPaymentCaptureType($paymentCaptureType): void
    {
        $this->paymentCaptureType = $paymentCaptureType;
    }

    /**
     * @return mixed
     */
    public function getPaymentRecurrent()
    {
        return $this->paymentRecurrent;
    }

    /**
     * @param mixed $paymentRecurrent
     */
    public function setPaymentRecurrent($paymentRecurrent): void
    {
        $this->paymentRecurrent = $paymentRecurrent;
    }

    /**
     * @return mixed
     */
    public function getCardNumberToken()
    {
        return $this->cardNumberToken;
    }

    /**
     * @param mixed $cardNumberToken
     */
    public function setCardNumberToken($cardNumberToken): void
    {
        $this->cardNumberToken = $cardNumberToken;
    }

    /**
     * @return mixed
     */
    public function getCardVaultId()
    {
        return $this->cardVaultId;
    }

    /**
     * @param mixed $cardVaultId
     */
    public function setCardVaultId($cardVaultId): void
    {
        $this->cardVaultId = $cardVaultId;
    }

    /**
     * @return mixed
     */
    public function getCardCardHolderName()
    {
        return $this->cardCardHolderName;
    }

    /**
     * @param mixed $cardCardHolderName
     */
    public function setCardCardHolderName($cardCardHolderName): void
    {
        $this->cardCardHolderName = $cardCardHolderName;
    }

    /**
     * @return mixed
     */
    public function getCardSecurityCode()
    {
        return $this->cardSecurityCode;
    }

    /**
     * @param mixed $cardSecurityCode
     */
    public function setCardSecurityCode($cardSecurityCode): void
    {
        $this->cardSecurityCode = $cardSecurityCode;
    }

    /**
     * @return mixed
     */
    public function getCardBrand()
    {
        return $this->cardBrand;
    }

    /**
     * @param mixed $cardBrand
     */
    public function setCardBrand($cardBrand): void
    {
        $this->cardBrand = $cardBrand;
    }

    /**
     * @return mixed
     */
    public function getCardExpirationMonth()
    {
        return $this->cardExpirationMonth;
    }

    /**
     * @param mixed $cardExpirationMonth
     */
    public function setCardExpirationMonth($cardExpirationMonth): void
    {
        $this->cardExpirationMonth = $cardExpirationMonth;
    }

    /**
     * @return mixed
     */
    public function getCardExpirationYear()
    {
        return $this->cardExpirationYear;
    }

    /**
     * @param mixed $cardExpirationYear
     */
    public function setCardExpirationYear($cardExpirationYear): void
    {
        $this->cardExpirationYear = $cardExpirationYear;
    }

    /**
     * @return mixed
     */
    public function getSellerInfoCodeAntiFraud()
    {
        return $this->sellerInfoCodeAntiFraud;
    }

    /**
     * @param mixed $sellerInfoCodeAntiFraud
     */
    public function setSellerInfoCodeAntiFraud($sellerInfoCodeAntiFraud): void
    {
        $this->sellerInfoCodeAntiFraud = $sellerInfoCodeAntiFraud;
    }

    /**
     * @return mixed
     */
    public function getSellerInfoCode3Ds()
    {
        return $this->sellerInfoCode3Ds;
    }

    /**
     * @param mixed $sellerInfoCode3Ds
     */
    public function setSellerInfoCode3Ds($sellerInfoCode3Ds): void
    {
        $this->sellerInfoCode3Ds = $sellerInfoCode3Ds;
    }

    /**
     * @return mixed
     */
    public function getSellerInfoUrlSite3Ds()
    {
        return $this->sellerInfoUrlSite3Ds;
    }

    /**
     * @param mixed $sellerInfoUrlSite3Ds
     */
    public function setSellerInfoUrlSite3Ds($sellerInfoUrlSite3Ds): void
    {
        $this->sellerInfoUrlSite3Ds = $sellerInfoUrlSite3Ds;
    }

    /**
     * @return mixed
     */
    public function getSellerInfoOrderNumber()
    {
        return $this->sellerInfoOrderNumber;
    }

    /**
     * @param mixed $sellerInfoOrderNumber
     */
    public function setSellerInfoOrderNumber($sellerInfoOrderNumber): void
    {
        $this->sellerInfoOrderNumber = $sellerInfoOrderNumber;
    }

    /**
     * @return mixed
     */
    public function getSellerInfoSoftDescriptor()
    {
        return $this->sellerInfoSoftDescriptor;
    }

    /**
     * @param mixed $sellerInfoSoftDescriptor
     */
    public function setSellerInfoSoftDescriptor($sellerInfoSoftDescriptor): void
    {
        $this->sellerInfoSoftDescriptor = $sellerInfoSoftDescriptor;
    }

    /**
     * @return mixed
     */
    public function getDeviceInfoHttpAcceptBrowserValue()
    {
        return $this->deviceInfoHttpAcceptBrowserValue;
    }

    /**
     * @param mixed $deviceInfoHttpAcceptBrowserValue
     */
    public function setDeviceInfoHttpAcceptBrowserValue($deviceInfoHttpAcceptBrowserValue): void
    {
        $this->deviceInfoHttpAcceptBrowserValue = $deviceInfoHttpAcceptBrowserValue;
    }

    /**
     * @return mixed
     */
    public function getDeviceInfoHttpAcceptContent()
    {
        return $this->deviceInfoHttpAcceptContent;
    }

    /**
     * @param mixed $deviceInfoHttpAcceptContent
     */
    public function setDeviceInfoHttpAcceptContent($deviceInfoHttpAcceptContent): void
    {
        $this->deviceInfoHttpAcceptContent = $deviceInfoHttpAcceptContent;
    }

    /**
     * @return mixed
     */
    public function getDeviceInfoHttpBrowserLanguage()
    {
        return $this->deviceInfoHttpBrowserLanguage;
    }

    /**
     * @param mixed $deviceInfoHttpBrowserLanguage
     */
    public function setDeviceInfoHttpBrowserLanguage($deviceInfoHttpBrowserLanguage): void
    {
        $this->deviceInfoHttpBrowserLanguage = $deviceInfoHttpBrowserLanguage;
    }

    /**
     * @return mixed
     */
    public function getDeviceInfoHttpBrowserJavaEnabled()
    {
        return $this->deviceInfoHttpBrowserJavaEnabled;
    }

    /**
     * @param mixed $deviceInfoHttpBrowserJavaEnabled
     */
    public function setDeviceInfoHttpBrowserJavaEnabled($deviceInfoHttpBrowserJavaEnabled): void
    {
        $this->deviceInfoHttpBrowserJavaEnabled = $deviceInfoHttpBrowserJavaEnabled;
    }

    /**
     * @return mixed
     */
    public function getDeviceInfoHttpBrowserJavaScriptEnabled()
    {
        return $this->deviceInfoHttpBrowserJavaScriptEnabled;
    }

    /**
     * @param mixed $deviceInfoHttpBrowserJavaScriptEnabled
     */
    public function setDeviceInfoHttpBrowserJavaScriptEnabled($deviceInfoHttpBrowserJavaScriptEnabled): void
    {
        $this->deviceInfoHttpBrowserJavaScriptEnabled = $deviceInfoHttpBrowserJavaScriptEnabled;
    }

    /**
     * @return mixed
     */
    public function getDeviceInfoHttpBrowserColorDepth()
    {
        return $this->deviceInfoHttpBrowserColorDepth;
    }

    /**
     * @param mixed $deviceInfoHttpBrowserColorDepth
     */
    public function setDeviceInfoHttpBrowserColorDepth($deviceInfoHttpBrowserColorDepth): void
    {
        $this->deviceInfoHttpBrowserColorDepth = $deviceInfoHttpBrowserColorDepth;
    }

    /**
     * @return mixed
     */
    public function getDeviceInfoHttpBrowserScreenHeight()
    {
        return $this->deviceInfoHttpBrowserScreenHeight;
    }

    /**
     * @param mixed $deviceInfoHttpBrowserScreenHeight
     */
    public function setDeviceInfoHttpBrowserScreenHeight($deviceInfoHttpBrowserScreenHeight): void
    {
        $this->deviceInfoHttpBrowserScreenHeight = $deviceInfoHttpBrowserScreenHeight;
    }

    /**
     * @return mixed
     */
    public function getDeviceInfoHttpBrowserScreenWidth()
    {
        return $this->deviceInfoHttpBrowserScreenWidth;
    }

    /**
     * @param mixed $deviceInfoHttpBrowserScreenWidth
     */
    public function setDeviceInfoHttpBrowserScreenWidth($deviceInfoHttpBrowserScreenWidth): void
    {
        $this->deviceInfoHttpBrowserScreenWidth = $deviceInfoHttpBrowserScreenWidth;
    }

    /**
     * @return mixed
     */
    public function getDeviceInfoHttpBrowserTimeDifference()
    {
        return $this->deviceInfoHttpBrowserTimeDifference;
    }

    /**
     * @param mixed $deviceInfoHttpBrowserTimeDifference
     */
    public function setDeviceInfoHttpBrowserTimeDifference($deviceInfoHttpBrowserTimeDifference): void
    {
        $this->deviceInfoHttpBrowserTimeDifference = $deviceInfoHttpBrowserTimeDifference;
    }

    /**
     * @return mixed
     */
    public function getDeviceInfoUserAgentBrowserValue()
    {
        return $this->deviceInfoUserAgentBrowserValue;
    }

    /**
     * @param mixed $deviceInfoUserAgentBrowserValue
     */
    public function setDeviceInfoUserAgentBrowserValue($deviceInfoUserAgentBrowserValue): void
    {
        $this->deviceInfoUserAgentBrowserValue = $deviceInfoUserAgentBrowserValue;
    }

    /**
     * @return mixed
     */
    public function getCustomerDocumentType()
    {
        return $this->customerDocumentType;
    }

    /**
     * @param mixed $customerDocumentType
     */
    public function setCustomerDocumentType($customerDocumentType): void
    {
        $this->customerDocumentType = $customerDocumentType;
    }

    /**
     * @return mixed
     */
    public function getCustomerDocumentNumber()
    {
        return $this->customerDocumentNumber;
    }

    /**
     * @param mixed $customerDocumentNumber
     */
    public function setCustomerDocumentNumber($customerDocumentNumber): void
    {
        $this->customerDocumentNumber = $customerDocumentNumber;
    }

    /**
     * @return mixed
     */
    public function getCustomerFirstName()
    {
        return $this->customerFirstName;
    }

    /**
     * @param mixed $customerFirstName
     */
    public function setCustomerFirstName($customerFirstName): void
    {
        $this->customerFirstName = $customerFirstName;
    }

    /**
     * @return mixed
     */
    public function getCustomerLastName()
    {
        return $this->customerLastName;
    }

    /**
     * @param mixed $customerLastName
     */
    public function setCustomerLastName($customerLastName): void
    {
        $this->customerLastName = $customerLastName;
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
    public function getCustomerPhoneNumber()
    {
        return $this->customerPhoneNumber;
    }

    /**
     * @param mixed $customerPhoneNumber
     */
    public function setCustomerPhoneNumber($customerPhoneNumber): void
    {
        $this->customerPhoneNumber = $customerPhoneNumber;
    }

    /**
     * @return mixed
     */
    public function getCustomerMobilePhoneNumber()
    {
        return $this->customerMobilePhoneNumber;
    }

    /**
     * @param mixed $customerMobilePhoneNumber
     */
    public function setCustomerMobilePhoneNumber($customerMobilePhoneNumber): void
    {
        $this->customerMobilePhoneNumber = $customerMobilePhoneNumber;
    }

    /**
     * @return mixed
     */
    public function getCustomerIpAddress()
    {
        return $this->customerIpAddress;
    }

    /**
     * @param mixed $customerIpAddress
     */
    public function setCustomerIpAddress($customerIpAddress): void
    {
        $this->customerIpAddress = $customerIpAddress;
    }

    /**
     * @return mixed
     */
    public function getCustomerAddressName()
    {
        return $this->customerAddressName;
    }

    /**
     * @param mixed $customerAddressName
     */
    public function setCustomerAddressName($customerAddressName): void
    {
        $this->customerAddressName = $customerAddressName;
    }

    /**
     * @return mixed
     */
    public function getCustomerAddressZipCode()
    {
        return $this->customerAddressZipCode;
    }

    /**
     * @param mixed $customerAddressZipCode
     */
    public function setCustomerAddressZipCode($customerAddressZipCode): void
    {
        $this->customerAddressZipCode = $customerAddressZipCode;
    }

    /**
     * @return mixed
     */
    public function getCustomerAddressCountry()
    {
        return $this->customerAddressCountry;
    }

    /**
     * @param mixed $customerAddressCountry
     */
    public function setCustomerAddressCountry($customerAddressCountry): void
    {
        $this->customerAddressCountry = $customerAddressCountry;
    }

    /**
     * @return mixed
     */
    public function getCustomerAddressState()
    {
        return $this->customerAddressState;
    }

    /**
     * @param mixed $customerAddressState
     */
    public function setCustomerAddressState($customerAddressState): void
    {
        $this->customerAddressState = $customerAddressState;
    }

    /**
     * @return mixed
     */
    public function getCustomerAddressCity()
    {
        return $this->customerAddressCity;
    }

    /**
     * @param mixed $customerAddressCity
     */
    public function setCustomerAddressCity($customerAddressCity): void
    {
        $this->customerAddressCity = $customerAddressCity;
    }

    /**
     * @return mixed
     */
    public function getCustomerAddressComplement()
    {
        return $this->customerAddressComplement;
    }

    /**
     * @param mixed $customerAddressComplement
     */
    public function setCustomerAddressComplement($customerAddressComplement): void
    {
        $this->customerAddressComplement = $customerAddressComplement;
    }

    /**
     * @return mixed
     */
    public function getShipToFirstName()
    {
        return $this->shipToFirstName;
    }

    /**
     * @param mixed $shipToFirstName
     */
    public function setShipToFirstName($shipToFirstName): void
    {
        $this->shipToFirstName = $shipToFirstName;
    }

    /**
     * @return mixed
     */
    public function getShipToLastName()
    {
        return $this->shipToLastName;
    }

    /**
     * @param mixed $shipToLastName
     */
    public function setShipToLastName($shipToLastName): void
    {
        $this->shipToLastName = $shipToLastName;
    }

    /**
     * @return mixed
     */
    public function getShipToPhoneNumber()
    {
        return $this->shipToPhoneNumber;
    }

    /**
     * @param mixed $shipToPhoneNumber
     */
    public function setShipToPhoneNumber($shipToPhoneNumber): void
    {
        $this->shipToPhoneNumber = $shipToPhoneNumber;
    }

    /**
     * @return mixed
     */
    public function getShipToAddressName()
    {
        return $this->shipToAddressName;
    }

    /**
     * @param mixed $shipToAddressName
     */
    public function setShipToAddressName($shipToAddressName): void
    {
        $this->shipToAddressName = $shipToAddressName;
    }

    /**
     * @return mixed
     */
    public function getShipToAddressZipCode()
    {
        return $this->shipToAddressZipCode;
    }

    /**
     * @param mixed $shipToAddressZipCode
     */
    public function setShipToAddressZipCode($shipToAddressZipCode): void
    {
        $this->shipToAddressZipCode = $shipToAddressZipCode;
    }

    /**
     * @return mixed
     */
    public function getShipToAddressCountry()
    {
        return $this->shipToAddressCountry;
    }

    /**
     * @param mixed $shipToAddressCountry
     */
    public function setShipToAddressCountry($shipToAddressCountry): void
    {
        $this->shipToAddressCountry = $shipToAddressCountry;
    }

    /**
     * @return mixed
     */
    public function getShipToAddressState()
    {
        return $this->shipToAddressState;
    }

    /**
     * @param mixed $shipToAddressState
     */
    public function setShipToAddressState($shipToAddressState): void
    {
        $this->shipToAddressState = $shipToAddressState;
    }

    /**
     * @return mixed
     */
    public function getShipToAddressCity()
    {
        return $this->shipToAddressCity;
    }

    /**
     * @param mixed $shipToAddressCity
     */
    public function setShipToAddressCity($shipToAddressCity): void
    {
        $this->shipToAddressCity = $shipToAddressCity;
    }

    /**
     * @return mixed
     */
    public function getShipToAddressComplement()
    {
        return $this->shipToAddressComplement;
    }

    /**
     * @param mixed $shipToAddressComplement
     */
    public function setShipToAddressComplement($shipToAddressComplement): void
    {
        $this->shipToAddressComplement = $shipToAddressComplement;
    }

    public function toArray(): array
    {
        $parameters = [
            "payment" => [
                "transaction_type" => $this->getPaymentTransactionType(),
                "amount" => $this->getPaymentAmount(),
                "currency_code" => $this->getPaymentCurrencyCode(),
                "product_type" => $this->getPaymentProductType(),
                "installments" => $this->getPaymentInstallments(),
                "capture_type" => $this->getPaymentCaptureType(),
                "recurrent" => $this->getPaymentRecurrent(),
            ],
            "card" => [
                "vault_id" => $this->getCardVaultId(),
                "number_token" => $this->getCardNumberToken(),
                "card_holder_name" => $this->getCardCardHolderName(),
                "security_code" => $this->getCardSecurityCode(),
                "brand" => $this->getCardBrand(),
                "expiration_month" => $this->getCardExpirationMonth(),
                "expiration_year" => $this->getCardExpirationYear(),
            ],
            "seller_info" => [
                "code_anti_fraud" => $this->getSellerInfoCodeAntiFraud(),
                "code_3ds" => $this->getSellerInfoCode3Ds(),
                "url_site_3ds" => $this->getSellerInfoUrlSite3Ds(),
                "order_number" => $this->getSellerInfoOrderNumber(),
                "soft_descriptor" => $this->getSellerInfoSoftDescriptor(),
            ],
            "device_info" => [
                "http_accept_browser_value" => $this->getDeviceInfoHttpAcceptBrowserValue(),
                "http_accept_content" => $this->getDeviceInfoHttpAcceptContent(),
                "http_browser_language" => $this->getDeviceInfoHttpBrowserLanguage(),
                "http_browser_java_enabled" => $this->getDeviceInfoHttpBrowserJavaEnabled(),
                "http_browser_java_script_enabled" => $this->getDeviceInfoHttpBrowserJavaScriptEnabled(),
                "http_browser_color_depth" => $this->getDeviceInfoHttpBrowserColorDepth(),
                "http_browser_screen_height" => $this->getDeviceInfoHttpBrowserScreenHeight(),
                "http_browser_screen_width" => $this->getDeviceInfoHttpBrowserScreenWidth(),
                "http_browser_time_difference" => $this->getDeviceInfoHttpBrowserTimeDifference(),
                "user_agent_browser_value" => $this->getDeviceInfoUserAgentBrowserValue(),
            ],
            "customer" => [
                "document_type" => $this->getCustomerDocumentType(),
                "document_number" => $this->getCustomerDocumentNumber(),
                "first_name" => $this->getCustomerFirstName(),
                "last_name" => $this->getCustomerLastName(),
                "email" => $this->getCustomerEmail(),
                "phone_number" => $this->getCustomerPhoneNumber(),
                "mobile_phone_number" => $this->getCustomerMobilePhoneNumber(),
                "ip_address" => $this->getCustomerIpAddress(),
                "address" => [
                    "name" => $this->getCustomerAddressName(),
                    "zip_code" => $this->getCustomerAddressZipCode(),
                    "country" => $this->getCustomerAddressCountry(),
                    "state" => $this->getCustomerAddressState(),
                    "city" => $this->getCustomerAddressCity(),
                    "complement" =>$this->getCustomerAddressComplement(),
                ]
            ],
            "ship_to" => [
                "first_name" => $this->getShipToFirstName(),
                "last_name" => $this->getShipToLastName(),
                "phone_number" => $this->getShipToPhoneNumber(),
                "address" => [
                    "name" => $this->getShipToAddressName(),
                    "zip_code" => $this->getShipToAddressZipCode(),
                    "country" => $this->getShipToAddressCountry(),
                    "state" => $this->getShipToAddressState(),
                    "city" => $this->getShipToAddressCity(),
                    "complement" => $this->getShipToAddressComplement(),
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
        $this->setPaymentTransactionType($input['payment']['transaction_type'] ?? null);
        $this->setPaymentAmount($input['payment']['amount'] ?? null);
        $this->setPaymentCurrencyCode($input['payment']['currency_code'] ?? null);
        $this->setPaymentProductType($input['payment']['product_type'] ?? null);
        $this->setPaymentInstallments($input['payment']['installments'] ?? null);
        $this->setPaymentCaptureType($input['payment']['capture_type'] ?? null);
        $this->setPaymentRecurrent($input['payment']['recurrent'] ?? null);
        $this->setCardVaultId($input['card']['vault_id'] ?? null);
        $this->setCardNumberToken($input['card']['number_token'] ?? null);
        $this->setCardCardHolderName($input['card']['card_holder_name'] ?? null);
        $this->setCardSecurityCode($input['card']['security_code'] ?? null);
        $this->setCardBrand($input['card']['brand'] ?? null);
        $this->setCardExpirationMonth($input['card']['expiration_month'] ?? null);
        $this->setCardExpirationYear($input['card']['expiration_year'] ?? null);
        $this->setSellerInfoCodeAntiFraud($input['seller_info']['code_anti_fraud'] ?? null);
        $this->setSellerInfoCode3Ds($input['seller_info']['code_3ds'] ?? null);
        $this->setSellerInfoUrlSite3Ds($input['seller_info']['url_site_3ds'] ?? null);
        $this->setSellerInfoOrderNumber($input['seller_info']['order_number'] ?? null);
        $this->setSellerInfoSoftDescriptor($input['seller_info']['soft_descriptor'] ?? null);
        $this->setDeviceInfoHttpAcceptBrowserValue($input['device_info']['http_accept_browser_value'] ?? null);
        $this->setDeviceInfoHttpAcceptContent($input['device_info']['http_accept_content'] ?? null);
        $this->setDeviceInfoHttpBrowserLanguage($input['device_info']['http_browser_language'] ?? null);
        $this->setDeviceInfoHttpBrowserJavaEnabled($input['device_info']['http_browser_java_enabled'] ?? null);
        $this->setDeviceInfoHttpBrowserJavaScriptEnabled($input['device_info']['http_browser_java_script_enabled'] ?? null);
        $this->setDeviceInfoHttpBrowserColorDepth($input['device_info']['http_browser_color_depth'] ?? null);
        $this->setDeviceInfoHttpBrowserScreenHeight($input['device_info']['http_browser_screen_height'] ?? null);
        $this->setDeviceInfoHttpBrowserScreenWidth($input['device_info']['http_browser_screen_width'] ?? null);
        $this->setDeviceInfoHttpBrowserTimeDifference($input['device_info']['http_browser_time_difference'] ?? null);
        $this->setDeviceInfoUserAgentBrowserValue($input['device_info']['user_agent_browser_value'] ?? null);
        $this->setCustomerDocumentType($input['customer']['document_type'] ?? null);
        $this->setCustomerDocumentNumber($input['customer']['document_number'] ?? null);
        $this->setCustomerFirstName($input['customer']['first_name'] ?? null);
        $this->setCustomerLastName($input['customer']['last_name'] ?? null);
        $this->setCustomerEmail($input['customer']['email'] ?? null);
        $this->setCustomerPhoneNumber($input['customer']['phone_number'] ?? null);
        $this->setCustomerMobilePhoneNumber($input['customer']['mobile_phone_number'] ?? null);
        $this->setCustomerIpAddress($input['customer']['ip_address'] ?? null);
        $this->setCustomerAddressName($input['customer']['address']['name'] ?? null);
        $this->setCustomerAddressZipCode($input['customer']['address']['zip_code'] ?? null);
        $this->setCustomerAddressCountry($input['customer']['address']['country'] ?? null);
        $this->setCustomerAddressState($input['customer']['address']['state'] ?? null);
        $this->setCustomerAddressCity($input['customer']['address']['city'] ?? null);
        $this->setCustomerAddressComplement($input['customer']['address']['complement'] ?? null);
        $this->setShipToFirstName($input['ship_to']['first_name'] ?? null);
        $this->setShipToLastName($input['ship_to']['last_name'] ?? null);
        $this->setShipToPhoneNumber($input['ship_to']['phone_number'] ?? null);
        $this->setShipToAddressName($input['ship_to']['address']['name'] ?? null);
        $this->setShipToAddressZipCode($input['ship_to']['address']['zip_code'] ?? null);
        $this->setShipToAddressCountry($input['ship_to']['address']['country'] ?? null);
        $this->setShipToAddressState($input['ship_to']['address']['state'] ?? null);
        $this->setShipToAddressCity($input['ship_to']['address']['city'] ?? null);
        $this->setShipToAddressComplement($input['ship_to']['address']['complement'] ?? null);
    }
}
