<?php

namespace App\Enums;

use Konekt\Enum\Enum;

class DayOfWeekEnum extends Enum
{

    const MONDAY = 1;

    const TUESDAY = 2;

    const WEDNESDAY = 3;

    const THURSDAY = 4;

    const FRIDAY = 5;

    const SATURDAY = 6;

    const SUNDAY = 7;

    protected static $labels = [
        self::MONDAY    => 'Esmaspäev',
        self::TUESDAY   => 'Teisipäev',
        self::WEDNESDAY => 'Kolmapäev',
        self::THURSDAY  => 'Neljapäev',
        self::FRIDAY    => 'Reede',
        self::SATURDAY  => 'Laupäev',
        self::SUNDAY    => 'Pühapäev',
    ];
}