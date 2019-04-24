<?php

namespace App\Enums;

use Konekt\Enum\Enum;

class DayOfWeekEnum extends Enum
{
    const SUNDAY = 1;

    const MONDAY = 2;

    const TUESDAY = 3;

    const WEDNESDAY = 4;

    const THURSDAY = 5;

    const FRIDAY = 6;

    const SATURDAY = 7;

    protected static $labels = [
        self::SUNDAY    => 'Sunday',
        self::MONDAY    => 'Monday',
        self::TUESDAY   => 'Tuesday',
        self::WEDNESDAY => 'Wednesday',
        self::THURSDAY  => 'Thursday',
        self::FRIDAY    => 'Friday',
        self::SATURDAY  => 'Saturday',
    ];
}