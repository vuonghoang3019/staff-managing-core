<?php

namespace admin\Services;

use Carbon\Carbon;

class TimeService
{
    public function generateTimeRange($from, $to)
    {
        $time = Carbon::parse($from);
        $timeRange = [];
        do {
            array_push($timeRange, [
                'start' => $time->format("H:i:s"),
                'end'   => $time->addMinute(30)->format("H:i:s")
            ]);
        } while ($time->format("H:i") !== $to);
        return $timeRange;
    }
}
