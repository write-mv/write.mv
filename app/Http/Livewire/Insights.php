<?php

namespace App\Http\Livewire;

use App\Traits\DatePeriodGenerator;
use CyrildeWit\EloquentViewable\Support\Period;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use LarapexChart;
use Livewire\Component;

class Insights extends Component
{
    use DatePeriodGenerator;

    public function render()
    {
        $blog = Auth::user()->team->blogs()->first();

        $stats = Cache::remember('blog_'.$blog->id.'_insight', 300, function () use ($blog) {
            $views_this_month = views($blog)->period(Period::pastMonths(1))->count();
            $views_last_month = views($blog)->period(Period::pastMonths(2))->count();

            $visitors_this_month = views($blog)->unique()->period(Period::pastMonths(1))->count();
            $visitors_last_month = views($blog)->unique()->period(Period::pastMonths(2))->count();

            //Increased in views compared to last month
            $views_increased = (($views_this_month - $views_last_month) / max($views_last_month, 1) * 100);
            //Increased in visitors compared to last month
            $visitors_increased = (($visitors_this_month - $visitors_last_month) / max($visitors_last_month, 1) * 100);

            return [
                'views_this_month' => $views_this_month,
                'views_last_month' => $views_last_month,
                'visitors_this_month' => $visitors_this_month,
                'visitors_last_month' => $visitors_last_month,
                'views_increased' => $views_increased,
                'visitors_increased' => $visitors_increased,
            ];
        });

        $viewsPerMonthDays = $blog->viewsPerMonthDays();
        $chart = LarapexChart::areaChart()
            ->addData('views', $viewsPerMonthDays->pluck('views')->toArray())
            ->addData('unique visitors', $blog->uniqueVisitorsPerMonthDays()->pluck('visits')->toArray())
            ->setXAxis($viewsPerMonthDays->pluck('date')->toArray())
            ->setGrid();

        return view('livewire.insights', [
            'life_time_views' => views($blog)->count(),
            'life_time_visitors' => views($blog)->unique()->count(),
            'monthly_views' => $stats['views_this_month'],
            'monthly_visitors' => $stats['visitors_this_month'],
            'views_increased' => $stats['views_increased'],
            'visitors_increased' => $stats['visitors_increased'],
            'top_10_posts' => $blog->posts()->live()->withCount('views')->with('blog')->orderByViews('desc')->limit(10)->get(),
            'chart' => $chart,
        ]);
    }
}
