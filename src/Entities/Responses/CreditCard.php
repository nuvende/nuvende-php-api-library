<?php

namespace Nuvende\Gateway\Entities\Responses;

use Nuvende\Gateway\Entities\BaseEntity;

class CreditCard extends BaseEntity
{
    protected $message;
    protected $authorization;
    protected $description;
    protected $expireAt;
    protected $treeDsStatus;
    protected $treeDsVersion;
    protected $treeDsUrl;
    protected $treeDsToken;
    protected $treeDsAuthenticationId;
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
     * @return string Valores retornado nas constantes dessa classe: src/StaticModels/TreeDsStatus.php
     */
    public function getTreeDsStatus(): string
    {
        return $this->treeDsStatus;
    }

    public function setTreeDsStatus($treeDsStatus): void
    {
        $this->treeDsStatus = $treeDsStatus;
    }

    /**
     * @return string É retornado quando for Challenge, Versão de 3ds que autentificou a transação
     */
    public function getTreeDsVersion(): string
    {
        return $this->treeDsVersion;
    }

    public function setTreeDsVersion($treeDsVersion): void
    {
        $this->treeDsVersion = $treeDsVersion;
    }

    /**
     * @return string É retornado quando for Challenge, deve informá-lo no Adiq3ds.InitChallenge(treeDsUrl, treeDsToken, treeDsAuthenticationId).
     */
    public function getTreeDsUrl(): string
    {
        return $this->treeDsUrl;
    }

    public function setTreeDsUrl($treeDsUrl): void
    {
        $this->treeDsUrl = $treeDsUrl;
    }

    /**
     * @return string É retornado quando for Challenge, deve informá-lo no Adiq3ds.InitChallenge(treeDsUrl, treeDsToken, treeDsAuthenticationId).
     */
    public function getTreeDsToken(): string
    {
        return $this->treeDsToken;
    }

    public function setTreeDsToken($treeDsToken): void
    {
        $this->treeDsToken = $treeDsToken;
    }

    /**
     * @return string É retornado quando for Challenge, deve informá-lo no Adiq3ds.InitChallenge(treeDsUrl, treeDsToken, treeDsAuthenticationId).
     */
    public function getTreeDsAuthenticationId(): string
    {
        return $this->treeDsAuthenticationId;
    }

    public function setTreeDsAuthenticationId($treeDsAuthenticationId): void
    {
        $this->treeDsAuthenticationId = $treeDsAuthenticationId;
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
        return [
            "message" => $this->getMessage(),
            "authorization" => $this->getAuthorization(),
            "description" => $this->getDescription(),
            "expire_at" => $this->getExpireAt(),
            "treeDs" => [
                "status" => $this->getTreeDsStatus(),
                "version" => $this->getTreeDsVersion(),
                "url" => $this->getTreeDsUrl(),
                "token" => $this->getTreeDsToken(),
                "authentication_id" => $this->getTreeDsAuthenticationId()
            ],
            "payment_id" => $this->getPaymentId()
        ];
    }


    public function fill(array $input)
    {
        $this->setMessage($input['message'] ?? null);
        $this->setAuthorization($input['authorization'] ?? null);
        $this->setDescription($input['description'] ?? null);
        $this->setExpireAt($input['expire_at'] ?? null);
        $this->setTreeDsStatus($input['treeDs']['status'] ?? null);
        $this->setTreeDsVersion($input['treeDs']['version'] ?? null);
        $this->setTreeDsUrl($input['treeDs']['url'] ?? null);
        $this->setTreeDsToken($input['treeDs']['token'] ?? null);
        $this->setTreeDsAuthenticationId($input['treeDs']['authentication_id'] ?? null);
        $this->setPaymentId($input['payment_id'] ?? null);
    }
}
