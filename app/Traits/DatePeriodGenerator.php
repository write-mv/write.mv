<?php

namespace App\Traits;

use Carbon\CarbonPeriod;
use Illuminate\Support\Carbon;

trait DatePeriodGenerator
{
    public function generateDateFor($date)
    {
        $dateRange = CarbonPeriod::create($date, Carbon::now());

        $newDateArray = [];
        foreach ($dateRange as $date) {
            $newDateArray[] = $date->format('M jS');
        }

        return $newDateArray;

    }
}
