<?php

namespace App\Models;

use App\Traits\BelongsToTeam;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use Illuminate\Support\Carbon;
use DB;

class Blog extends Model implements Viewable
{
    use HasFactory, BelongsToTeam, InteractsWithViews;

    protected $guarded = [];

    /**
     * Record the view to the blog
     *
     * @return void
     */
    public function RecordView()
    {
        views($this)->record();
    }


    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    /**
     * Calculation for graph viewsPerMonthDays
     *
     * @return void
     */
    public function viewsPerMonthDays()
    {
        return $this->views()->where('viewed_at', '>=', Carbon::now()->subMonth())
            ->groupBy('date')
            ->orderBy('date', 'ASC')
            ->get(array(
                DB::raw('Date(viewed_at) as date'),
                DB::raw('COUNT(*) as "views"')
            ));
    }

    /**
     * Calculation for graph uniqueVisitorsPerMonthDays
     *
     * @return void
     */
    public function uniqueVisitorsPerMonthDays()
    {
        return $this->views()->where('viewed_at', '>=', Carbon::now()->subMonth())
            ->groupBy('date')
            ->orderBy('date', 'DESC')
            ->get(array(
                DB::raw('Date(viewed_at) as date'),
                DB::raw('COUNT(DISTINCT(visitor)) as "visits"')
            ));
    }
}
