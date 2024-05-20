<?php

namespace Nuvende\Gateway\Entities\Responses;

use Nuvende\Gateway\Entities\BaseEntity;

class BankSlip extends BaseEntity
{
    protected $message;
    protected $dataId;
    protected $dataStatus;
    protected $dataValue;
    protected $dataOurNumber;
    protected $dataBarcode;
    protected $dataDigitableLine;
    protected $dataPaidAt;
    protected $dataPaidValue;
    protected $dataCreditedAt;

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
     * @return integer Identificador da Transação
     */
    public function getDataId(): int
    {
        return $this->dataId;
    }

    public function setDataId($dataId): void
    {
        $this->dataId = $dataId;
    }

    /**
     * @return string Status do boleto * Alterar quando tiver os dados *
     */
    public function getDataStatus(): string
    {
        return $this->dataStatus;
    }

    public function setDataStatus($dataStatus): void
    {
        $this->dataStatus = $dataStatus;
    }

    /**
     * @return integer Valor do boleto
     */
    public function getDataValue(): int
    {
        return $this->dataValue;
    }

    public function setDataValue($dataValue): void
    {
        $this->dataValue = $dataValue;
    }

    /**
     * @return integer O Seu Identificador da transação do boleto enviado na solicitação
     */
    public function getDataOurNumber(): int
    {
        return $this->dataOurNumber;
    }

    public function setDataOurNumber($dataOurNumber): void
    {
        $this->dataOurNumber = $dataOurNumber;
    }

    /**
     * @return string Codigo de barras do boleto
     */
    public function getDataBarcode(): string
    {
        return $this->dataBarcode;
    }

    public function setDataBarcode($dataBarcode): void
    {
        $this->dataBarcode = $dataBarcode;
    }

    /**
     * @return string Linha digitavel do codigo de barra do boleto
     */
    public function getDataDigitableLine(): string
    {
        return $this->dataDigitableLine;
    }

    public function setDataDigitableLine($dataDigitableLine): void
    {
        $this->dataDigitableLine = $dataDigitableLine;
    }

    /**
     * @return string Data de pagamento do boleto, Nullo quando não pago
     */
    public function getDataPaidAt(): string
    {
        return $this->dataPaidAt;
    }

    public function setDataPaidAt($dataPaidAt): void
    {
        $this->dataPaidAt = $dataPaidAt;
    }

    /**
     * @return integer Valor pago do boleto, Nullo quando não pago
     */
    public function getDataPaidValue(): int
    {
        return $this->dataPaidValue;
    }

    public function setDataPaidValue($dataPaidValue): void
    {
        $this->dataPaidValue = $dataPaidValue;
    }

    /**
     * @return string Data de quando foi creditado o valor pago do boleto, Nullo quando não pago
     */
    public function getDataCreditedAt(): string
    {
        return $this->dataCreditedAt;
    }

    public function setDataCreditedAt($dataCreditedAt): void
    {
        $this->dataCreditedAt = $dataCreditedAt;
    }

    public function toArray(): array
    {
        return [
            "message" => $this->getMessage(),
            "data" => [
                "id" => $this->getDataId(),
                "status" => $this->getDataStatus(),
                "value" => $this->getDataValue(),
                "our_number" => $this->getDataOurNumber(),
                "barcode" => $this->getDataBarcode(),
                "digitable_line" => $this->getDataDigitableLine(),
                "paid_at" => $this->getDataPaidAt(),
                "paid_value" => $this->getDataPaidValue(),
                "credited_at" => $this->getDataCreditedAt()
            ]
        ];
    }

    public function fill(array $input)
    {
        $this->setMessage($input['message'] ?? null);
        $this->setDataId($input['data']['id'] ?? null);
        $this->setDataStatus($input['data']['status'] ?? null);
        $this->setDataValue($input['data']['value'] ?? null);
        $this->setDataOurNumber($input['data']['ourNumber'] ?? null);
        $this->setDataBarcode($input['data']['barcode'] ?? null);
        $this->setDataDigitableLine($input['data']['digitableLine'] ?? null);
        $this->setDataPaidAt($input['data']['paidAt'] ?? null);
        $this->setDataPaidValue($input['data']['paidValue'] ?? null);
        $this->setDataCreditedAt($input['data']['creditedAt'] ?? null);
    }
}
