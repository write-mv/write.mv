<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Scopes\TeamScope;
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
        $posts = Post::withoutGlobalScopes()->live()->with([
            'blog' => function ($query) {
              return $query->withoutGlobalScope(TeamScope::class);
            }
          ])->latest('published_date')->paginate(10);

        return view('pages.explore', [
            "posts" => $posts
        ]);
    }
}
