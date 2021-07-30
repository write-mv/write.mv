<?php

namespace App\Models;

use App\Jobs\GenerateBlogOgImage;
use App\Traits\BelongsToTeam;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Spatie\Activitylog\LogOptions;

class Blog extends WriteMvBaseModel implements Viewable
{
    use HasFactory, BelongsToTeam, InteractsWithViews;

    protected $guarded = [];

    protected $casts = [
        "meta" => "array"
    ];

    public static function boot()
    {

        parent::boot();

        static::created(function ($blog) {
            //Firing the blog og image generation
            GenerateBlogOgImage::dispatch($blog);
        });
    }

    /**
     * Record the view to the blog
     *
     * @return void
     */
    public function RecordView()
    {
        views($this)->record();
    }


    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    public function pages(): HasMany
    {
        return $this->hasMany(Page::class);
    }

    public function theme(): BelongsTo
    {
        return $this->belongsTo(Theme::class);
    }

    /**
     * Calculation for graph viewsPerMonthDays
     *
     * @return void
     */
    public function viewsPerMonthDays()
    {
        $chartData = [];

        $this->views()->where('viewed_at', '>=', Carbon::now()->subMonth())
            ->groupBy('date')
            ->orderBy('date', 'ASC')
            ->get(array(
                DB::raw('DATE(viewed_at) as date'),
                DB::raw('COUNT(*) as "views"')
            ))->each(function ($item, $key) use (&$chartData) {

                $chartData[] = ["date" => date("M jS", strtotime($item->date)), "views" => $item->views];
            });

        return collect($chartData);
    }

    /**
     * Calculation for graph uniqueVisitorsPerMonthDays
     *
     * @return void
     */
    public function uniqueVisitorsPerMonthDays()
    {
        $chartData = [];

        $this->views()->where('viewed_at', '>=', Carbon::now()->subMonth())
            ->groupBy('date')
            ->orderBy('date', 'ASC')
            ->get(array(
                DB::raw('DATE(viewed_at) as date'),
                DB::raw('COUNT(DISTINCT(visitor)) as "visits"')
            ))->each(function ($item) use (&$chartData) {

                $chartData[] = ["date" => date("M jS", strtotime($item->date)), "visits" => $item->visits];
            });

        return collect($chartData);
    }

    public function generateBlogAvatar()
    {
        return "https://robohash.org/".$this->name;
    }
}
