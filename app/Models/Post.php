<?php

namespace App\Models;

use App\Traits\BelongsToTeam;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use nadar\quill\Lexer;

class Post extends WriteMvBaseModel implements Viewable
{
    use BelongsToTeam, HasFactory, InteractsWithViews;

    protected $guarded = [];

    protected $removeViewsOnDelete = true;

    protected $filters = [
        'all' => null,
        'published' => 'live',
        'draft' => 'draft',
        'scheduled' => 'scheduled',
        'notion' => 'notion',
    ];

    protected $casts = [
        'published_date' => 'datetime',
        'meta' => 'array',
        'content' => 'array',
        'likes' => 'integer',
    ];

    protected $appends = [
        'published_date_timezone',
    ];

    public function getRenderedHtmlContent()
    {
        $lexer = new Lexer($this->content);

        return $lexer->render();
    }

    /**
     * Get the published date to the current timezone
     *
     * @param $value $value
     */
    public function getPublishedDateTimeZoneAttribute($value)
    {
        try {
            return Carbon::parse($value)->setTimezone(Blog::withoutGlobalScopes()->findOrFail($this->blog_id)->timezone);
        } catch (\Throwable) {
            //throw $th;
        }
    }

    /*

    public function getContentAttribute($content)
    {
        $lexer = new Lexer($content);
        return new HtmlString($lexer->render());
    }
*/

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

    public function blog(): BelongsTo
    {
        return $this->belongsTo(Blog::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function postLikes(): HasMany
    {
        return $this->hasMany(PostLike::class);
    }

    public function scopeSearch($query, $search)
    {
        return empty($search) ? $query
            : $query->where('title', 'like', '%'.$search.'%')
                ->orwhere('slug', 'like', '%'.$search.'%');
    }

    public function scopePostTabFilter($query, $filter)
    {
        if (is_null($this->filters[$filter])) {
            return;
        }

        return call_user_func([self::class, $this->filters[$filter]]);
    }

    /**
     * Scope a query to only include published posts.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePublished($query)
    {
        return $query->where('published', true);
    }

    /**
     * Scope a query to only include drafts (unpublished posts).
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeDraft($query)
    {
        return $query->where('published', false);
    }

    /**
     * Scope a query to only include posts whose published_date is in the past (or now).
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeLive($query)
    {
        return $query->published()->where('published_date', '<=', now());
    }

    /**
     * Scope a query to only include posts whose published_date is in the future.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeScheduled($query)
    {
        return $query->where('published_date', '>', now());
    }

    /**
     * Scope a query to only include posts whose published_date is before a given date.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  string  $date
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeBeforePublishDate($query, $date)
    {
        return $query->where('published_date', '<=', $date);
    }

    /**
     * Scope a query to only include posts whose publish date is after a given date.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  string  $date
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeAfterPublishDate($query, $date)
    {
        return $query->where('published_date', '>', $date);
    }

    /**
     * Scope a query to only include posts that have a specific tag (by slug).
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
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
            ->get([
                DB::raw('DATE(viewed_at) as date'),
                DB::raw('COUNT(*) as "views"'),
            ])->each(function ($item, $key) use (&$chartData) {

                $chartData[] = ['date' => date('M jS', strtotime((string) $item->date)), 'views' => $item->views];
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
            ->get([
                DB::raw('DATE(viewed_at) as date'),
                DB::raw('COUNT(DISTINCT(visitor)) as "visits"'),
            ])->each(function ($item, $key) use (&$chartData) {

                $chartData[] = ['date' => date('M jS', strtotime((string) $item->date)), 'visits' => $item->visits];
            });

        return collect($chartData);
    }

    public function featuredImageUrl()
    {
        return $this->featured_image
            ? Storage::disk('public')->url($this->featured_image)
            : '';
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

    public function isLikedBy(?string $likerUuid): bool
    {
        if ($likerUuid === null) {
            return false;
        }

        return PostLike::query()
            ->where('liker_uuid', $likerUuid)
            ->where('post_id', $this->id)
            ->exists();
    }

    public function addLikeBy(string $likerUuid): self
    {
        PostLike::create([
            'post_id' => $this->id,
            'liker_uuid' => $likerUuid,
        ]);

        $this->likes += 1;

        $this->save();

        return $this;
    }

    public function removeLikeBy(string $likerUuid): void
    {
        PostLike::where([
            'liker_uuid' => $likerUuid,
            'post_id' => $this->id,
        ])->delete();

        $this->likes -= 1;

        $this->save();
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
     * Method addTags
     *
     * @param    $tags []
     * @return void
     */
    public function addTags($tags)
    {
        $this->tags()->sync($tags);
    }

    /**
     * add a tag to a post
     *
     * @return void
     */
    public function addTag(mixed $tag)
    {
        $this->tags()->attach($tag);
    }

    /**
     * Remove a tag from a post
     *
     * @return void
     */
    public function removeTag(mixed $tag)
    {
        $this->tags()->detach($tag);
    }

    public function notion()
    {
    }
}
