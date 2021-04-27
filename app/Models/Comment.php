<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Collections\CommentCollection;

class Comment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function post()
    {
       return $this->belongsTo(Post::class);
    }

    public function owner()
    {
       return $this->belongsTo(User::class, 'user_id')->withoutGlobalScopes();
    }

      /**
     * Use a custom collection for all comments.
     *
     * @param  array  $models
     * @return CustomCollection
     */
    public function newCollection(array $models = [])
    {
        return new CommentCollection($models);
    }
}
