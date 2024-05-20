<?php

namespace Nuvende\Gateway\StaticModels;

class TreeDsStatus
{
    public const ATTEMPT = 'Attempt'; // Status significa que tentou passar pelo 3ds, mas não conseguiu
    public const CHALLENGE = 'Challenge'; // Desafio
    public const SILENT = 'Silent'; // Status significa que passou pelo 3ds sem atrito
    public const FAIL = 'Fail'; // Falha na operação
}
