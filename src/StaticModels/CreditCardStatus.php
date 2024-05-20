<?php

namespace Nuvende\Gateway\StaticModels;

class CreditCardStatus
{
    const UNSYCHRONIZED = 1; // Não sincronizado

    const SYNCHRONIZED = 2; // Sincronizado

    const ERROR = 3; // Erro

    const DENIED = 4; // Cancelado

    const AUTHORIZED_AVAILABLE_FOR_CAPTURE = 5; // Autorizada e disponível para captura

    const CAPTURED = 6; // Capturada

    const CANCELED = 7; // Cancelada
}
