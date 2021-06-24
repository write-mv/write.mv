<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Scopes\TeamScope;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ExploreController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function __invoke(Request $request) : View
    {
        $posts = Post::withoutGlobalScopes()->live()->with([
            'blog' => function ($query) {
              return $query->withoutGlobalScope(TeamScope::class);
            }
          ])->latest('published_date')->simplePaginate(16);

        return view('pages.explore', [
            "posts" => $posts
        ]);
    }
}
