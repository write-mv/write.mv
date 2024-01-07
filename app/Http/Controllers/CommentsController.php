<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentStoreRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function store($post, CommentStoreRequest $request)
    {
        $post = Post::withoutGlobalScopes()->findOrFail($post);

        $post->comments()->create([
            'user_id' => Auth::id(),
            'body' => $request->body,
            'parent_id' => request('parent_id', null),
        ]);

        return back();
    }
}
