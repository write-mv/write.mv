<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class CommentsController extends Controller
{
    public function store($post,Request $request)
    {
       $post = Post::withoutGlobalScopes()->findOrFail($post);

       $post->comments()->create([
            "user_id" => Auth::id(),
            "body" => $request->body,
            'parent_id' => request('parent_id', null)
        ]);

        return back();
    }
}
