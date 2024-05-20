<?php

namespace Nuvende\Gateway\Entities\Responses;

use Nuvende\Gateway\Entities\BaseEntity;

class QrCodeDynamic extends BaseEntity
{
    protected $calendarioExpiracao;
    protected $calendarioCriacao;
    protected $txId;
    protected $qrCode;
    protected $devedorCnpj;
    protected $devedorCpf;
    protected $devedorNome;
    protected $valorOriginal;
    protected $valorJuros;
    protected $valorMulta;
    protected $valorDesconto;
    protected $valorFinal;
    protected $valorModalidadeAlteracao;
    protected $chave;
    protected $pix;
    protected $solicitacaoPagador;
    protected $infoAdicionais;

    /**
     * @return string Segundos para a expiração do QRCode
     */
    public function getCalendarioExpiracao(): string
    {
        return $this->calendarioExpiracao;
    }

    public function setCalendarioExpiracao($calendarioExpiracao): void
    {
        $this->calendarioExpiracao = $calendarioExpiracao;
    }

    /**
     * @return string Data de criação do QRCode
     */
    public function getCalendarioCriacao(): string
    {
        return $this->calendarioCriacao;
    }

    public function setCalendarioCriacao($calendarioCriacao): void
    {
        $this->calendarioCriacao = $calendarioCriacao;
    }

    /**
     * @return string Identificador da Transação
     */
    public function getTxId(): string
    {
        return $this->txId;
    }

    public function setTxId($txId): void
    {
        $this->txId = $txId;
    }

    /**
     * @return string QRCode da Transação
     */
    public function getQrCode(): string
    {
        return $this->qrCode;
    }

    public function setQrCode($qrCode): void
    {
        $this->qrCode = $qrCode;
    }

    /**
     * @return string CNPJ do devedor da transação
     */
    public function getDevedorCnpj(): string
    {
        return $this->devedorCnpj;
    }

    public function setDevedorCnpj($devedorCnpj): void
    {
        $this->devedorCnpj = $devedorCnpj;
    }

    /**
     * @return string CPF do devedor da transação
     */
    public function getDevedorCpf(): string
    {
        return $this->devedorCpf;
    }

    public function setDevedorCpf($devedorCpf): void
    {
        $this->devedorCpf = $devedorCpf;
    }

    /**
     * @return string Nome do devedor da transação
     */
    public function getDevedorNome(): string
    {
        return $this->devedorNome;
    }

    public function setDevedorNome($devedorNome): void
    {
        $this->devedorNome = $devedorNome;
    }

    /**
     * @return float Valor original do Qrcode. Formato: 1.9
     */
    public function getValorOriginal(): float
    {
        return $this->valorOriginal;
    }

    public function setValorOriginal($valorOriginal): void
    {
        $this->valorOriginal = $valorOriginal;
    }

    /**
     * @return float Valor de juros do Qrcode. Formato: 1.9
     */
    public function getValorJuros(): float
    {
        return $this->valorJuros;
    }

    public function setValorJuros($valorJuros): void
    {
        $this->valorJuros = $valorJuros;
    }

    /**
     * @return float Valor de multa do Qrcode. Formato: 1.9
     */
    public function getValorMulta(): float
    {
        return $this->valorMulta;
    }

    public function setValorMulta($valorMulta): void
    {
        $this->valorMulta = $valorMulta;
    }

    /**
     * @return float Valor de desconto do Qrcode. Formato: 1.9
     */
    public function getValorDesconto(): float
    {
        return $this->valorDesconto;
    }

    public function setValorDesconto($valorDesconto): void
    {
        $this->valorDesconto = $valorDesconto;
    }

    /**
     * @return float Valor final do Qrcode. Formato: 1.9
     */
    public function getValorFinal(): float
    {
        return $this->valorFinal;
    }

    public function setValorFinal($valorFinal): void
    {
        $this->valorFinal = $valorFinal;
    }

    /**
     * @return integer Modalidade de alteração * Alterar quando tiver os dados *
     */
    public function getValorModalidadeAlteracao(): int
    {
        return $this->valorModalidadeAlteracao;
    }

    public function setValorModalidadeAlteracao($valorModalidadeAlteracao): void
    {
        $this->valorModalidadeAlteracao = $valorModalidadeAlteracao;
    }

    /**
     * @return string Chave de recebimento do Pix
     */
    public function getChave(): string
    {
        return $this->chave;
    }

    public function setChave($chave): void
    {
        $this->chave = $chave;
    }

    /**
     * @return array Array com informações do pagamento do pix, Presente apenas quando o pix foi pago
     */
    public function getPix(): array
    {
        return $this->pix;
    }

    public function setPix($pix): void
    {
        $this->pix = $pix;
    }

    /**
     * @return array * Alterar quando tiver os dados *
     */
    public function getSolicitacaoPagador(): array
    {
        return $this->solicitacaoPagador;
    }

    public function setSolicitacaoPagador($solicitacaoPagador): void
    {
        $this->solicitacaoPagador = $solicitacaoPagador;
    }

    /**
     * @return array * Alterar quando tiver os dados *
     */
    public function getInfoAdicionais(): array
    {
        return $this->infoAdicionais;
    }

    public function setInfoAdicionais($infoAdicionais): void
    {
        $this->infoAdicionais = $infoAdicionais;
    }

    public function toArray(): array
    {
        return [
            'txId' => $this->getTxId(),
            'cobranca' => [
                'calendario' => [
                    'expiracao' => $this->getCalendarioExpiracao(),
                    'criacao' => $this->getCalendarioCriacao()
                ],
                'devedor' => [
                    'cnpj' => $this->getDevedorCnpj(),
                    'cpf' => $this->getDevedorCpf(),
                    'nome' => $this->getDevedorNome()
                ],
                'valor' => [
                    'original' => $this->getValorOriginal(),
                    'multa' => $this->getValorMulta(),
                    'juros' => $this->getValorJuros(),
                    'desconto' => $this->getValorDesconto(),
                    'final' => $this->getValorFinal(),
                    'modalidadeAlteracao' => $this->getValorModalidadeAlteracao()
                ],
                'qrCode' => $this->getQrCode(),
                'chave' => $this->getChave(),
                'pix' => $this->getPix(),
                'solicitacaoPagador' => $this->getSolicitacaoPagador(),
                'informacoesAdicionais' => $this->getInfoAdicionais()
            ],
        ];
    }


    public function fill(array $input)
    {
        $this->setTxId($input['txId'] ?? null);
        $this->setCalendarioCriacao($input['cobranca']['calendario']['criacao'] ?? null);
        $this->setCalendarioExpiracao($input['cobranca']['calendario']['expiracao'] ?? null);
        $this->setDevedorCpf($input['cobranca']['devedor']['cpf'] ?? null);
        $this->setDevedorNome($input['cobranca']['devedor']['nome'] ?? null);
        $this->setDevedorCnpj($input['cobranca']['devedor']['cnpj'] ?? null);
        $this->setValorOriginal($input['cobranca']['valor']['original'] ?? null);
        $this->setValorMulta($input['cobranca']['valor']['multa'] ?? null);
        $this->setValorJuros($input['cobranca']['valor']['juros'] ?? null);
        $this->setValorDesconto($input['cobranca']['valor']['desconto'] ?? null);
        $this->setValorFinal($input['cobranca']['valor']['final'] ?? null);
        $this->setValorModalidadeAlteracao($input['cobranca']['valor']['modalidadeAlteracao'] ?? null);
        $this->setQrCode($input['cobranca']['qrCode'] ?? null);
        $this->setChave($input['cobranca']['chave'] ?? null);
        $this->setPix($input['cobranca']['pix'] ?? null);
        $this->setSolicitacaoPagador($input['cobranca']['solicitacaoPagador'] ?? null);
        $this->setInfoAdicionais($input['cobranca']['informacoesAdicionais'] ?? null);
    }

}
