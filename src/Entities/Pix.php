<?php

namespace Nuvende\Gateway\Entities;

class Pix extends BaseEntity
{
    protected $calendarioExpiracao;
    protected $devedorName;
    protected $valorOriginal;
    protected $observacao;

    /**
     * @return mixed
     */
    public function getCalendarioExpiracao()
    {
        return $this->calendarioExpiracao;
    }

    /**
     * @param mixed $calendarioExpiracao
     */
    public function setCalendarioExpiracao($calendarioExpiracao): void
    {
        $this->calendarioExpiracao = $calendarioExpiracao;
    }

    /**
     * @return mixed
     */
    public function getDevedorName()
    {
        return $this->devedorCnpj;
    }

    /**
     * @param mixed $devedorName
     */
    public function setDevedorName($devedorName): void
    {
        $this->devedorName = $devedorName;
    }

    /**
     * @return mixed
     */
    public function getValorOriginal()
    {
        return $this->valorOriginal;
    }

    /**
     * @param mixed $valorOriginal
     */
    public function setValorOriginal($valorOriginal): void
    {
        $this->valorOriginal = $valorOriginal;
    }

    /**
     * @return mixed
     */
    public function getObservacao()
    {
        return $this->observacao;
    }

    /**
     * @param mixed $observacao
     */
    public function setObservacao($observacao): void
    {
        $this->observacao = $observacao;
    }

    public function toArray(): array
    {
        return [
            'cobranca' => [
                'calendario' => [
                    'expiracao' => $this->getCalendarioExpiracao()
                ],
                'devedor' => [
                    'name' => $this->getDevedorName()
                ],
                'valor' => [
                    'original' => $this->getValorOriginal()
                ]
            ],
            'observacao' => $this->getObservacao()
        ];
    }

    public function fill(array $input)
    {
        $this->setCalendarioExpiracao($input['cobranca']['calendario']['expiracao']);
        $this->setDevedorName($input['cobranca']['devedor']['name']);
        $this->setValorOriginal($input['cobranca']['valor']['original']);
        $this->setObservacao($input['observacao']);
    }
}
