<?php

use Carbon\Carbon;

if (! function_exists('selected')) {
    function selected(bool $boolean)
    {
        return $boolean ? "selected" : "";
    }
}

if (! function_exists('generateDateRange')) {
    function generateDateRange(Carbon $start_date, Carbon $end_date, $slot_duration = 30)
    {
        $dates = [];
        $slots = $start_date->diffInMinutes($end_date) / $slot_duration;

        $dates[] = $start_date->format('H:i');

        for ($s = 1; $s <= $slots; $s++) {

            $dates[] = $start_date->addMinute($slot_duration)->format('H:i');
        }

        return $dates;
    }
}
