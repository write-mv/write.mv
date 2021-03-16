<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class ExploreController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $posts = Post::withoutGlobalScopes()->live()->with('blog')->latest('published_date')->get();

        return view('pages.explore', [
            "posts" => $posts
        ]);
    }
}
