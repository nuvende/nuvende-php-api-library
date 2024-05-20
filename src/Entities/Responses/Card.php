<?php

namespace Nuvende\Gateway\Entities\Responses;

use Nuvende\Gateway\Entities\BaseEntity;

class Card extends BaseEntity
{

    public $numberToken;
    public $vaultId;

    /**
     * @return string Numero do cartão tokenizado
     */
    public function getNumberToken(): string
    {
        return $this->numberToken;
    }

    public function setNumberToken($numberToken): void
    {
        $this->numberToken = $numberToken;
    }

    /**
     * @return string Identificador do cartão no vault
     */
    public function getVaultId(): string
    {
        return $this->vaultId;
    }

    public function setVaultId($vaultId): void
    {
        $this->vaultId = $vaultId;
    }

    public function toArray(): array
    {
        $vaultId = $this->getVaultId();
        if(isset($vaultId)) {
            return ['vault_id' => $vaultId];
        }
        return ['number_token' => $this->getNumberToken()];
    }

    public function fill(array $input)
    {
        $this->setNumberToken(['number_token'] ?? null);
        $this->setVaultId(['vault_id'] ?? null);
    }
}
