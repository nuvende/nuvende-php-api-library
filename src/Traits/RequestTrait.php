<?php

namespace Nuvende\Gateway\Traits;

use Nuvende\Gateway\Exceptions\InvalidTokenException;
use Nuvende\Gateway\Exceptions\RequestException;

trait RequestTrait
{
    protected $authorization;
    protected $contractCode;
    protected $url;

    public function __construct($token, $contractCode, $url)
    {
        $this->authorization = $token;
        $this->contractCode = $contractCode;
        $this->url = $url;
        if(!$this->validateToken()){
            throw new InvalidTokenException();
        }
    }

    /**
     * @return bool
     * Validação de existência e validade do Token de acesso
     */
    public function validateToken(): bool
    {
        $response = json_decode($this->post('auth/check-token'), true);
        return isset($response['data']['contract_id']);
    }

    public function get($endpoint)
    {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => $this->url . $endpoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "Authorization: Bearer " . $this->authorization
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            throw new RequestException($err);
        }

        return $response;
    }

    public function post($endpoint, array $body = [])
    {
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => $this->url .'/'. $endpoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($body),
            CURLOPT_HTTPHEADER => [
                "Authorization: Bearer " . $this->authorization,
                "Content-Type: application/json"
            ],
        ]);

        $response = curl_exec($curl);
        $httpCode = curl_getinfo($curl)['http_code'];

        curl_close($curl);

        if ($httpCode == 200) {
            return $response;
        }

        return json_encode(['error' => json_decode($response, true)]);
    }
}
