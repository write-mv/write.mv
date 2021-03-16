<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
use App\Traits\DatePeriodGenerator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Carbon;
use CyrildeWit\EloquentViewable\Support\Period;
use LarapexChart;

class ViewStats extends Component
{
    use DatePeriodGenerator;

    public $post;

    public function mount(Post $post)
    {
        $this->post = $post;
    }

    public function render()
    {
        $stats = Cache::remember("post_" . $this->post->id . "_insight", 300, function (){
            $views_this_month = views($this->post)->period(Period::pastMonths(1))->count();
            $views_last_month = views($this->post)->period(Period::pastMonths(2))->count();

            $visitors_this_month = views($this->post)->unique()->period(Period::pastMonths(1))->count();
            $visitors_last_month = views($this->post)->unique()->period(Period::pastMonths(2))->count();

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
                "visitors_increased" => $visitors_increased,
                "life_time_views" => views($this->post)->count(),
                "life_time_visitors" => views($this->post)->unique()->count()
            ];
        });

       
        $viewsPerMonthDays = $this->post->viewsPerMonthDays();
        $chart = LarapexChart::areaChart()
            ->addData('views', $viewsPerMonthDays->pluck("views")->toArray())
            ->addData('unique visitors', $this->post->uniqueVisitorsPerMonthDays()->pluck("visits")->toArray())
            ->setXAxis( $viewsPerMonthDays->pluck("date")->toArray())
            ->setGrid();


        


        return view('livewire.view-stats',[
            "life_time_views" => $stats["life_time_views"],
            "life_time_visitors" =>  $stats["life_time_visitors"],
            "monthly_views" => $stats["views_this_month"],
            "monthly_visitors" => $stats["visitors_this_month"],
            "views_increased" => $stats["views_increased"],
            "visitors_increased" => $stats["visitors_increased"],
            'chart' => $chart
        ]);
    }
}
