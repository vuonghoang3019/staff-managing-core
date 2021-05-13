<?php

namespace Modules\Admin\Services;

use Carbon\Carbon;

class TimeService
{
    public function generateTimeRange($from, $to)
    {
        $time = Carbon::parse($from);
        $timeRange = [];
        do {
            array_push($timeRange, [
                'start' => $time->format("H:i"),
                'end'   => $time->addMinute(30)->format("H:i")
            ]);
        } while ($time->format("H:i") !== $to);
        return $timeRange;
    }
}
