<?php

namespace App\Models;

use App\Traits\BelongsToTeam;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

class Tag extends WriteMvBaseModel
{
    use HasFactory, BelongsToTeam;

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($item) {
            $item->posts()->detach();
        });
    }

    public function setSlugAttribute($value): void
    {
        $this->attributes['slug'] = Str::slug($value);
    }

    public function scopeSearch($query, $search)
    {
        return empty($search) ? $query
            : $query->where('name', 'like', '%' . $search . '%')
            ->orwhere('slug', 'like', '%' . $search . '%');
    }

    public function blog() : BelongsTo
    {
        return $this->belongsTo(Blog::class);
    }

    public function posts() : BelongsToMany
    {
        return $this->belongsToMany(Post::class)->withTimestamps();
    }
}
