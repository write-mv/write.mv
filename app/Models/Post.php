<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Builder;
use Illuminate\Support\HtmlString;
use App\Traits\BelongsToTeam;
use nadar\quill\Lexer;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class Post extends Model implements Viewable
{
    use HasFactory, BelongsToTeam, InteractsWithViews;

    protected $guarded = [];

    //protected $removeViewsOnDelete = true;

    protected $filters = [
        "all" => null,
        "published" => "live",
        "draft" => "draft",
        "scheduled" => "scheduled"
    ];

    protected $casts = [
        "published_date" => "datetime",
        "meta" => "array",
        "content" => "array"
    ];

    /**
     * Set the user's slug
     *
     * @param  string  $value
     * @return void
     */
    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value);
    }

    /**
     * Record the view to a post
     *
     * @return void
     */
    public function RecordView()
    {
        views($this)->record();
    }

    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }


    public function scopeSearch($query, $search)
    {
        return empty($search) ? $query
            : $query->where('title', 'like', '%' . $search . '%')
            ->orwhere('slug', 'like', '%' . $search . '%');
    }

    public function scopePostTabFilter($query, $filter)
    {
        if (is_null($this->filters[$filter])) {
            return;
        }

        return call_user_func(array(self::class, $this->filters[$filter]));
    }

    public function getRenderedHtmlContent()
    {
        $lexer = new Lexer($this->content);
        return $lexer->render();
    }

    /*

    public function getContentAttribute($content)
    {
        $lexer = new Lexer($content);
        return new HtmlString($lexer->render());
    }
*/
    /**
     * Scope a query to only include published posts.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePublished($query)
    {
        return $query->where('published', true);
    }

    /**
     * Scope a query to only include drafts (unpublished posts).
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeDraft($query)
    {
        return $query->where('published', false);
    }

    /**
     * Scope a query to only include posts whose published_date is in the past (or now).
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeLive($query)
    {
        return $query->published()->where('published_date', '<=', now());
    }

    /**
     * Scope a query to only include posts whose published_date is in the future.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeScheduled($query)
    {
        return $query->where('published_date', '>', now());
    }

    /**
     * Scope a query to only include posts whose published_date is before a given date.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $date
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeBeforePublishDate($query, $date)
    {
        return $query->where('published_date', '<=', $date);
    }

    /**
     * Scope a query to only include posts whose publish date is after a given date.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $date
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeAfterPublishDate($query, $date)
    {
        return $query->where('published_date', '>', $date);
    }

     /**
     * Scope a query to only include posts that have a specific tag (by slug).
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $slug
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeTag($query, string $slug)
    {
        return $query->whereHas('tags', function ($query) use ($slug) {
            $query->where('slug', $slug);
        });
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
            ))->each(function ($item, $key) use (&$chartData) {

                $chartData[] = ["date" => date("M jS", strtotime($item->date)), "visits" => $item->visits];
            });

        return collect($chartData);
    }

    public function featuredImageUrl()
    {
        return $this->featured_image
            ? Storage::disk('public')->url($this->featured_image)
            : "";
    }

    public function isScheduled()
    {
        return $this->published_date->greaterThan(now());
    }

    public function isDrafted()
    {
        return $this->published == true ? false : true;
    }

    public function isPublished()
    {
        return $this->published == true && $this->published_date->lessThanOrEqualTo(now()) ? true : false;
    }

    /**
     * Load a threaded set of comments for the post.
     *
     * @return App\Comments\CommentsCollection
     */
    public function getThreadedComments()
    {
        return $this->comments()->with('owner')->Approved()->get()->threaded();
    }
    
    /**
     * add a tag to a post
     *
     * @param  mixed $tag
     * @return void
     */
    public function addTag($tag)
    {
        $this->tags()->attach($tag);
    }
    
    /**
     * Remove a tag from a post
     *
     * @param  mixed $tag
     * @return void
     */
    public function removeTag($tag)
    {
        $this->tags()->detach($tag);
    }
}
