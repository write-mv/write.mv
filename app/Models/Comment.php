<?php

namespace App\Models;

use App\Collections\CommentCollection;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;

class Comment extends WriteMvBaseModel
{
    use HasFactory;

    /* status vars */
    final public const APPROVED = 'approved';

    final public const PENDING = 'pending';

    final public const SPAM = 'spam';

    protected $fillable = [
        'user_id',
        'body',
        'parent_id',
        'status',
    ];

    protected $filters = [
        'all' => null,
        'approved' => 'approved',
        'pending' => 'pending',
        'spam' => 'spam',
    ];

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id')->withoutGlobalScopes();
    }

    public function scopeSearch($query, $search)
    {
        return empty($search) ? $query
            : $query->where('body', 'like', '%'.$search.'%');
    }

    public function scopeCommentTabFilter($query, $filter)
    {
        if (is_null($this->filters[$filter])) {
            return;
        }

        return call_user_func([self::class, $this->filters[$filter]]);
    }

    public function scopeApproved(Builder $query): Builder
    {
        return $query->AllBlogCommentsForTheUser()->where('status', $this::APPROVED);
    }

    public function scopePending(Builder $query): Builder
    {
        return $query->AllBlogCommentsForTheUser()->where('status', $this::PENDING);
    }

    public function scopeAllBlogCommentsForTheUser(Builder $query, ?User $user = null): Builder
    {
        // If user is not passed in default to auth user.
        if (! $user) {
            $user = Auth::user();
        }

        return $query->whereIn(
            'post_id',
            $user->team->blogs()
                ->first()
                ->posts->pluck('id')
        );
    }

    public function scopePendingComments(Builder $query, ?User $user = null): Builder
    {
        return $query->AllBlogCommentsForTheUser()->where('status', $this::PENDING);
    }

    /**
     * Use a custom collection for all comments.
     *
     * @return CustomCollection
     */
    #[\Override]
    public function newCollection(array $models = [])
    {
        return new CommentCollection($models);
    }
}
