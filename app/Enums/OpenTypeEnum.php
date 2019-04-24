<?php

namespace App\Enums;

use Konekt\Enum\Enum;

class OpenTypeEnum extends Enum
{
    const __default = self::OPEN;

    const OPEN = 0;

    const CLOSED = 1;

    const OPEN_BY_AGREEMENT = 2;

    protected static $labels = [
        self::OPEN              => 'Avatud',
        self::CLOSED            => 'Suletud',
        self::OPEN_BY_AGREEMENT => 'Avatud kokkuleppel',
    ];
}