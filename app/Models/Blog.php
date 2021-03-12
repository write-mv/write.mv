<?php

namespace App\Models;

use App\Traits\BelongsToTeam;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory, BelongsToTeam;

    protected $guarded = [];

    /**
     * Tracking visits
     *
     * @return void
     */
    public function vzt()
    {
        return visits($this);
    }
    
    /**
     * Tracking visits
     *
     * @return void
     */
    public function visits()
    {
        return visits($this)->relation();
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
