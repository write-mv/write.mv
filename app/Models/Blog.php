<?php

namespace App\Models;

use App\Events\BlogNameUpdated;
use App\Jobs\GenerateBlogOgImage;
use App\Traits\BelongsToTeam;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Kleemans\AttributeEvents;

class Blog extends WriteMvBaseModel implements Viewable
{
    use AttributeEvents, BelongsToTeam, HasFactory, InteractsWithViews;

    protected $dispatchesEvents = [
        'name:*' => BlogNameUpdated::class,
    ];

    protected $fillable = [
        'name',
        'site_title',
        'description',
        'url',
        'rss_feed_link',
        'team_id',
        'social_links',
        'notification_channels',
    ];

    protected $casts = [
        'meta' => 'array',
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
     */
    public function RecordView(): void
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

    public function tags(): HasMany
    {
        return $this->hasMany(Tag::class);
    }

    /**
     * Calculation for graph viewsPerMonthDays
     *
     * @return void
     */
    public function viewsPerMonthDays(): Collection
    {
        $chartData = [];

        $this->views()->where('viewed_at', '>=', Carbon::now()->subMonth())
            ->groupBy('date')
            ->orderBy('date', 'ASC')
            ->get([
                DB::raw('DATE(viewed_at) as date'),
                DB::raw('COUNT(*) as "views"'),
            ])->each(function ($item, $key) use (&$chartData) {

                $chartData[] = ['date' => date('M jS', strtotime($item->date)), 'views' => $item->views];
            });

        return collect($chartData);
    }

    /**
     * Calculation for graph uniqueVisitorsPerMonthDays
     *
     * @return void
     */
    public function uniqueVisitorsPerMonthDays(): Collection
    {
        $chartData = [];

        $this->views()->where('viewed_at', '>=', Carbon::now()->subMonth())
            ->groupBy('date')
            ->orderBy('date', 'ASC')
            ->get([
                DB::raw('DATE(viewed_at) as date'),
                DB::raw('COUNT(DISTINCT(visitor)) as "visits"'),
            ])->each(function ($item) use (&$chartData) {

                $chartData[] = ['date' => date('M jS', strtotime($item->date)), 'visits' => $item->visits];
            });

        return collect($chartData);
    }

    public function generateBlogAvatar(): string
    {
        return 'https://robohash.org/'.$this->name;
    }

    public function getNotionApiKey(): ?string
    {
        return $this->notion_api_key;
    }

    public function isNotionEnabled(): bool
    {
        return empty($this->getNotionApiKey()) ? false : true;
    }
}
