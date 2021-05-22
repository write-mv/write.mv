<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

class Theme extends Model
{
    use HasFactory;

    public function blog()
    {
        return $this->hasMany(Blog::class);
    }

    /**
     * Order's the selected theme first
     *
     * @param Builder $query [explicite description]
     *
     * @return Builder
     */
    public function scopeOrderBySelectedThemeFirst($query, Blog $blog)
    {
        return $query->orderByRaw("id = ? DESC", ['id' => $blog->theme_id]);
    }
}
