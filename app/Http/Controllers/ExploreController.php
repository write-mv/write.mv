<?php

namespace App\Http\Controllers;

use App\Models\Blog;
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
  public function __invoke(Request $request): View
  {
    $posts = Post::withoutGlobalScopes()->live()->with([
      'blog' => function ($query) {
        return $query->withoutGlobalScope(TeamScope::class);
      }
    ])->latest('published_date')->paginate(16);


    return view('pages.explore.overview', [
      "posts" => $posts,
      "blogs" => Blog::orderByViews()->withCount('posts')->get()
    ]);
  }
}
