<?php

namespace App\Models;

use App\Traits\BelongsToTeam;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory, BelongsToTeam;

    protected $guarded = [];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
