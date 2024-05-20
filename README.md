### Nuvende - Biblioteca para API de Gateway de Pagamentos

![Nuvende](https://nuvende.com.br/img/logo-nuvende-green.svg)

## Descrição

Nuvende é uma biblioteca PHP projetada para facilitar a integração com o Gateway de Pagamento da Nuvende. Esta biblioteca fornece uma interface simples e eficiente para interagir com o sistema de pagamento, tornando o processo de integração mais rápido e menos propenso a erros.

Essa biblioteca é uma abstração para as APIs de pagamentos que estão disponíveis [aqui](https://nuvende.com.br/docs).

## Requisitos

- PHP >= 7.1.0
- Extensões PHP:
  - cURL
  - JSON
- Pacotes do Illuminate:
  - illuminate/auth: ^6.0|^7.0|^8.0
  - illuminate/container: ^6.0|^7.0|^8.0
  - illuminate/contracts: ^6.0|^7.0|^8.0
  - illuminate/database: ^6.0|^7.0|^8.0

### Requisitos de Desenvolvimento

- fzaninotto/faker: ~1.8
- phpunit/phpunit: 8.*
- mockery/mockery: 1.*
- symfony/var-dumper: ^5.4

## Instalação

Você pode instalar a biblioteca Nuvende usando o Composer. Execute o seguinte comando no terminal:

```bash
composer require nuvende/gateway
```

## Uso

Iniciar a SDK com dados de autentificação fornecido pela nuvende:

```php
    $nuvendeService = new \Nuvende\Gateway\Service(
        'eyJ...', # Token de acesso fonecido pela nuvende
        '123', # Codigo de contrato da conta que ira receber o pagamento
        null # link da aplicação do gateway, Em testes e desenvolvimento não enviar
    );
```
<hr>

## Pix
### Configuração do webhook de notificação de pagamento
```php
    $nuvendeService->auth->updateWebhook(
        'https://', # Url do que recebera as transações de cartão de crédito, 
        'https://' # Url do que recebera as transações de pix
    );
```

### Gerar QrCode de pagamento Pix
```php
    $response = $nuvendeService->pix->generate(new \Nuvende\Gateway\Entities\Pix([
        'cobranca' => [
            'calendario' => [
                'expiracao' => 3600 # Tempo de expiração do QRCode em segundos
            ],
            'devedor' => [
                'name' => 'joao da silva' # Nome de quem pagara a cobrança
            ],
            'valor' => [
                'original' => 199.99 # Valor da cobrança em float
            ]
        ],
        'observacao' => 'Cobrança dos serviços prestados.' # Observação da cobrança
    ]));

    $txId = $response->getTxId() # O txId que sera ultilizado para consulta do pagamento
```

### Consulta do pagamento Pix
```php
    $response = $nuvendeService->pix->findByTxId($txId); # O txId é retornado na geração do QrCode
```

### Consulta em lote do pagamento Pix
```php
    $response = $nuvendeService->pix->findMultiple($txIds); # O txId é retornado na geração do QrCode
```
<hr>

## Boleto

### Gerar Boleto da Cobrança
```php
    $response = $nuvendeService->bankSlip->create(new BankSlip([
        'value' => 10.00, # Valor da cobrança em float
        'due_date' => '2024-12-30' # Data de vencimento formato (yyyy-mm-dd)
        'fine_date' => '2024-12-30' # Data da multa formato (yyyy-mm-dd)
        'fine_value' => 1, # Valor da multa em float (Menor que 20)
        'fine_percentage' => 1, # Porcentagem da multa em float (Menor que 20)
        'customer' => [ # Informações do cliente
            'name' => 'João Silva', # Nome
            'document' => '71239517009', # CPF ou CNPJ (Minimo 11 e Máximo de 14 caracteres)
            'email' => 'joao@exemplo.com', # Email (email valido)
            'area_code' => '48', # DDD do telefone
            'phone' => '4899999999', # Telefone
            'billing_address' => [ # Endereço de cobrança
                'street' => 'Rua Januário Alvez Garcia', # Rua
                'number' => '20', # Numero
                'district' => 'Centro', # Bairro
                'postal_code' => '88702311', # CEP
                'city' => 'Tubarão', # Cidade
                'state' => 'SC', # Estado
                'country' => 'BRA', # País
                'complement' => 'apt. 42' # Complemento
            ]
        ]
    ]));
    $ourNumber = $response->getOurNumber(); # O our_number que sera ultilizado para consulta do pagamento
```

### Busca Boleto da Cobrança
```php
    $response = $nuvendeService->bankSlip->search($ourNumber);
```

### Download Boleto da Cobrança
```php
    $response = $nuvendeService->bankSlip->download($this->ourNumber);
```

<hr>

## Cartão de Crédito

### Informações importantes

Geração de transações de cartão de crédito diferente das anterios é fragmentada em várias etapas
sendo algumas obrigatorias e outras situacionais dependendo do tipo de transação e do que foi retornado em seguida um resumo(ou guia) do fluxo de transação de cartão de crédito.

| Função           | Etapa       | Descrição                                                                                                                                                                 |
|------------------|-------------|---------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| cardTokenization | Obrigatoria | Primiera etapa                                                                                                                                                            |
| storeCardVault   | Opcional    | Recomendado a ultilização caso va ultilizar o mesmo cartão varias vezes                                                                                                   |
| createSale       | Obrigatoria | Segunda etapa e começo da geração da transação, As posteriores são dependente do retorno dessa                                                                            |
| validate3ds      | Situacional | Etapa para validação do 3ds necessaria quando a função `getTreeDsStatus()` possui o valor `Challange`                                                                     |
| captureSale      | Situacional | Etapa para captura da transação, necessaria quando o campo `["payment"]["capture_type"]` enviado na criação é igual a `pa` e chamada apos o `validate3ds` caso necessario |
| cancelSale       | Opcional    | Etapa para cancelamento da transação so é possivel cancelar antes da captura                                                                                              |
| unlockSale       | Opcional    | Etapa para desbloqueio da transação casso ela não tenha passado pelo autentificador ou pelo 3ds mas mesmo assim deseja efetivar a transação                               |
| searchSale       | Opcional    | Etapa para atualização de status                                                                                                                                          |

- Campos com opção predefinidas

| Campo            | Opções                                    |
|------------------|-------------------------------------------|
| transaction_type | credit, debit                             |
| currency_code    | brl                                       |
| product_type     | avista, lojista, debito                   |
| recurrent        | true - Recorrente, false - Não recorrente |
| brand            | visa, mastercard, amex, elo, hipercard    |
| document_type    | 1 - cpf, 2 - cnpj                         |
| capture_type     | pa - Pré-autoriza ac - Autoriza e captura |

Campos com maiores detalhes

| Campo            | Descrição                                                                                                                                                                                                                                                                                                                                                                     |
|------------------|-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| code_anti_fraud  | Codigo é um uuid gerado por pela sua aplicação e sera passado no script do autentificador                                                                                                                                                                                                                                                                                     |
| code_3ds         | Codigo que é vc recebera no front pela função `adiq3ds.getThreeDsCode();`                                                                                                                                                                                                                                                                                                     |
| soft_descriptor  | Campo deve seguir as segintes regras: <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Não deve conter caracteres especiais, exceto '*' <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Não deve iniciar com * <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Deve conter apenas um '*' <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Tamanho máximo de 22 caracteres <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Ex.: PAG*LOJAXPTO |

- Tokenização do número do cartão
```php
    $response = $nuvendeService->creditCard->cardTokenization('4111111111111111'); # numero do cartão formato (16 digitos)
    $numberToken = $response->getNumberToken(); # O numberToken que sera ultilizado para geração da venda ou para armazenar o cartão
```

- Armazenamento do cartão no vault
```php
    $response = $nuvendeService->creditCard->storeCardVault(new Card([
        'number_token' => $numberToken, # retornado na tokenização do cartão
        'brand' => 'mastercard', # bandeira do cartão (visa, mastercard, amex, elo, hipercard)
        'card_holder_name' => 'João Silva', # Nome do titular do cartão
        'expiration_month' => '12', # Mês de expiração do cartão
        'expiration_year' => '30', # Ano de expiração do cartão
        'security_code' => '123' # Código de segurança do cartão
    ]));
    $vaultId = $response->getVaultId(); # identificador do cartão no vault que sera ultilizado para geração da venda
```

- Gerar transação de cartão de crédito

```php
    $response = $nuvendeService->creditCard->createSale(new CreditCard([
        "payment" => [
            "transaction_type" => "credit", # tipo de transação (credit, debit)
            "amount" => 19999, # valor da transação em centavos
            "currency_code" => "BRL", # moeda da transação (BRL)
            "product_type" => "avista", # tipo de produto (avista, lojista, debito)
            "installments" => 1, # quantidade de parcelas
            "capture_type" => "pa", # tipo de captura (pa - Pré-autoriza, ac - Autoriza e captura)
            "recurrent" => false # transação recorrente (true - Recorrente, false - Não recorrente)
        ],
        "card" => [
            "number_token": "ac7cd574-853b-4e24-ba40-904b5ac1812e", # retornado na tokenização do cartão
            "card_holder_name": "JOAO SILVA", # Nome do titular do cartão
            "security_code": "123", # Código de segurança do cartão
            "brand": "mastercard", # bandeira do cartão (visa, mastercard, amex, elo, hipercard)
            "expiration_month": "12", # Mês de expiração do cartão
            "expiration_year": "30" # Ano de expiração do cartão
            # quando armazenado no vault enviar apenas o "vault_id" e não enviar os outros campos desse array
            "vault_id" => $this->vaultId # identificador do cartão no vault retornado no armazenamento do cartão
        ],
        "seller_info" => [
            "code_anti_fraud" => "ac7cd574-853b-4e24-ba40-904b5ac1812e", # codigo de anti fraude  
            "code_3ds" => "ac7cd574-853b-4e24-ba40-904b5ac1812e", # codigo do 3ds  
            "url_site_3ds" => "www.site.com.br", # url do seu site pode ser coletada no browser (location.href)
            "order_number" => "1", # numero do pedido (pode ser enviado qualquer valor de até 13 digitos mas não pode repetir no mesmo dia )
            "soft_descriptor" => "Nuvende*JoaoDaSilva" # Nome que aparecera na fatura do cartão
        ],
        "device_info" => [
            "http_accept_browser_value" => "text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng;q=0.8", # valores coletados na requisição do navegador na hora da compra
            "http_accept_content" => "text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng;q=0.8", # valores coletados na requisição do navegador na hora da compra
            "http_browser_language" => "pt-BR", # valor coletado no navegar na hora da compra (navigator.language ?? 'pt-BR')
            "http_browser_java_enabled" => "N", # java habilitado (Y - Sim, N - Não)
            "http_browser_java_script_enabled" => "Y", # javascript habilitado (Y - Sim, N - Não)
            "http_browser_color_depth" => "24", # valor coletado no navegar na hora da compra (screen.colorDepth);
            "http_browser_screen_height" => "937", # valor coletado no navegar na hora da compra (window.innerHeight)
            "http_browser_screen_width" => "1920", # valor coletado no navegar na hora da compra (window.innerWidth)
            "http_browser_time_difference" => "180", # valor coletado no navegar na hora da compra (new Date().getTimezoneOffset())
            "user_agent_browser_value" => "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36" # valor coletado no navegar na hora da compra (navigator.userAgent)
        ],
        "customer" => [ # Informações do pagador da transação
            "document_type" => 1, # tipo de documento (1 - cpf, 2 - cnpj)
            "document_number" => "01234567899", # CPF ou CNPJ (Minimo 11 e Máximo de 14 caracteres)
            "first_name" => "JOAO", # Nome do pagador
            "last_name" => "SILVA", # Sobrenome do pagador
            "email" => "joao.silva@exemple.com", # Email do pagador
            "phone_number" => "48999999999", # Telefone do pagador
            "mobile_phone_number" => "48999999999", # Celular do pagador
            "ip_address" => "000000000000", # IP do pagador
            "address" => [# Endereço do pagador
                "name" => "Rua Luiz Vieira, 134", # Rua
                "zip_code" => "09876098", # CEP
                "country" => "BR", # País
                "state" => "SP", # Estado
                "city" => "São Paulo", # Cidade
                "complement" => "apto. 34 - Vila Guarani" # Complemento
            ]
        ],
        "ship_to" => [ # Informações de entrega
            "first_name" => "JOAO", # Nome do destinatário
            "last_name" => "SILVA", # Sobrenome do destinatário
            "phone_number" => "48999999999", # Telefone do destinatário
            "address" => [ # Endereço do destinatário
                "name" => "Rua Luiz Vieira, 134", # Rua
                "zip_code" => "09876098", # CEP
                "country" => "BR", # País
                "state" => "SP", # Estado
                "city" => "São Paulo", # Cidade
                "complement" => "apto. 34 - Vila Guarani" # Complemento
            ]
        ]
    ]));
    # Validar se é necessario a validação do 3ds
    if($response->getTreeDsStatus() == 'Challange'){
        # Coleta dados para validar o 3ds
        $treeDsUrl =  $response->getTreeDsUrl();
        $treeDsToken = $response->getTreeDsToken();
        $treeDsAuthenticationId = $response->getTreeDsAuthenticationId();
        # Encaminhar para a validação do js apos a validação vai receber um token guarde ele pois sera usado na validate3ds()
        $codeTreeDs = '';  # Mesmo codigo que foi enviado no ['seller_info']['code_3ds']
        $treeDsToken = ''; # Primiero parametro recebido na função validateChallengeCallback()
    }


    # Dados para as proximas etapas
    $paymentId = $response->getPaymentId();
    $paymentAmount = 19999;
```

- Validação do 3ds da transação do cartão de crédito
```php
    $response = $nuvendeService->creditCard->validate3ds($codeTreeDs, $treeDsToken); # parametros explicados na função de criação
```

- Captura da transação do cartão de crédito
```php
    $response = $nuvendeService->creditCard->captureSale($paymentId, $paymentAmount); # parametros explicados na função de criação
```

- Cancelamento da transação do cartão de crédito
```php
    $response = $nuvendeService->creditCard->cancelSale($paymentId, $paymentAmount); # parametros explicados na função de criação
```

- Consulta da transação do cartão de crédito
```php
    $response = $nuvendeService->creditCard->searchSale($paymentId); # parametros explicados na função de criação
```
<hr>

## Testes

Para executar os testes, use o PHPUnit. Primeiro, instale as dependências de desenvolvimento:

```bash
composer install --dev
```

Em seguida, execute os testes:

```bash
vendor/bin/phpunit
```

## Sugestões

Este pacote sugere o uso das seguintes extensões para funcionalidade adicional:

- `ext-simplexml`: Suporte a SimpleXML
- `ext-mbstring`: Suporte a Mbstring

## Autores

- Roger Florzino - [roger.florzino@doutbox.com.br](mailto:roger.florzino@doutbox.com.br)
- João Floriano - [joao.floriano@doutbox.com.br](mailto:joao.floriano@doutbox.com.br)

## Licença

Este projeto está licenciado sob a [MIT License](LICENSE).

## Contribuição

1. Faça um fork do projeto.
2. Crie um branch para sua feature (`git checkout -b feature/nova-feature`).
3. Commit suas mudanças (`git commit -am 'Adiciona nova feature'`).
4. Envie para o branch (`git push origin feature/nova-feature`).
5. Crie um novo Pull Request.

Para questões e sugestões, por favor, abra uma [issue](https://github.com/nuvende/gateway/issues).

## Suporte

E-mail: suporte@nuvende.com.br


---

Aproveite a Nuvende para simplificar suas integrações de pagamento!