<?php

namespace Nuvende\Gateway\Exceptions;

use InvalidArgumentException;

class InvalidTokenException extends InvalidArgumentException
{
    public static function create(): self
    {
        return new static("Token Invalido configurar ou atualizar token no arquivo de configuração.");
    }
}
