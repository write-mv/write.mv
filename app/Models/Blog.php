<?php

namespace App\Models;

use App\Traits\BelongsToTeam;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use CyrildeWit\EloquentViewable\InteractsWithViews;

class Blog extends Model implements Viewable
{
    use HasFactory, BelongsToTeam,InteractsWithViews;

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
}
