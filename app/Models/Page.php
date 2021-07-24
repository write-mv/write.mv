<?php

namespace App\Models;

use App\Traits\BelongsToTeam;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Str;

class Page extends Model
{
    use HasFactory, BelongsToTeam;

    protected $guarded = [];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'published_date' => 'datetime',
        'meta' => 'array',
        'content' => 'array'
    ];

    protected $filters = [
        'all' => null,
        'published' => 'live',
        'draft' => 'draft',
        'scheduled' => 'scheduled'
    ];

    public function blog(): BelongsTo
    {
        return $this->belongsTo(Blog::class);
    }

    /**
     * Set the tags's slug.
     *
     * @param  string  $value
     * @return void
     */
    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value);
    }

    public function scopeSearch($query, $search)
    {
        return empty($search) ? $query
            : $query->where('title', 'like', '%' . $search . '%')
            ->orwhere('slug', 'like', '%' . $search . '%');
    }

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

    public function scopePageTabFilter($query, $filter)
    {
        if (is_null($this->filters[$filter])) {
            return;
        }

        return call_user_func(array(self::class, $this->filters[$filter]));
    }
}
