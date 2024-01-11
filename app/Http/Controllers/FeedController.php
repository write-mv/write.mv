<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($name)
    {
        $blog = Blog::withoutGlobalScopes()->where('name', $name)->first();

        if (! $blog) {
            abort(404);
        }

        $posts = $blog->posts()->live()->get();
        $content = view('posts.feed', [
            'posts' => $posts,
            'blog' => $blog,
        ]);

        return response($content, 200)
            ->header('Content-Type', 'text/xml');
    }
}
