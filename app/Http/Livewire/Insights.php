<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Carbon;
use CyrildeWit\EloquentViewable\Support\Period;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\Cache;
use App\Traits\DatePeriodGenerator;
use LarapexChart;
use DB;

class Insights extends Component
{
    use DatePeriodGenerator;

    public function render()
    {
        $blog = Auth::user()->team->blogs()->first();

        $stats = Cache::remember("blog_" . $blog->id . "_insight", 300, function () use ($blog) {
            $views_this_month = views($blog)->period(Period::pastMonths(1))->count();
            $views_last_month = views($blog)->period(Period::pastMonths(2))->count();

            $visitors_this_month = views($blog)->unique()->period(Period::pastMonths(1))->count();
            $visitors_last_month = views($blog)->unique()->period(Period::pastMonths(2))->count();

            //Increased in views compared to last month
            $views_increased = (($views_this_month - $views_last_month) / max($views_last_month,1) * 100);
            //Increased in visitors compared to last month
            $visitors_increased = (($visitors_this_month - $visitors_last_month) / max($visitors_last_month,1) * 100);

            return [
                "views_this_month" => $views_this_month,
                "views_last_month" => $views_last_month,
                "visitors_this_month" => $visitors_this_month,
                "visitors_last_month" => $visitors_last_month,
                "views_increased" => $views_increased,
                "visitors_increased" => $visitors_increased
            ];
        });


        $chart = LarapexChart::areaChart()
            ->addData('views', $blog->viewsPerMonthDays()->pluck("views")->toArray())
            ->addData('unique visitors', $blog->uniqueVisitorsPerMonthDays()->pluck("visits")->toArray())
            ->setXAxis($this->generateDateFor(Carbon::now()->subMonth()))
            ->setGrid();


        return view('livewire.insights', [
            "life_time_views" => views($blog)->count(),
            "life_time_visitors" => views($blog)->unique()->count(),
            "monthly_views" => $stats["views_this_month"],
            "monthly_visitors" => $stats["visitors_this_month"],
            "views_increased" => $stats["views_increased"],
            "visitors_increased" => $stats["visitors_increased"],
            "top_10_posts" => $blog->posts()->live()->withCount('views')->orderByViews('desc')->limit(10)->get(),
            'chart' => $chart
        ]);
    }
}
