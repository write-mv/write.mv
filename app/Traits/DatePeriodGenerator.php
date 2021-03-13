<?php
namespace App\Traits;

use Illuminate\Support\Carbon;
use Carbon\CarbonPeriod;

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